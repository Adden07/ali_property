<?php

namespace App\Providers;

use App\Channels\ZendeskNotificationChannel;
;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use App\Models\Customize;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
        if (config('app.force_https') == 'ON') {
            $this->app['url']->forceScheme('https');
        }

        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            $this->where(function (Builder $query) use ($attributes, $searchTerm) {
                foreach (\Arr::wrap($attributes) as $attribute) {
                    $query->when(
                        str_contains($attribute, '.'),
                        function (Builder $query) use ($attribute, $searchTerm) {
                            [$relationName, $relationAttribute] = explode('.', $attribute);

                            $query->orWhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
                                $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
                            });
                        },
                        function (Builder $query) use ($attribute, $searchTerm) {
                            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
                        }
                    );
                }
            });
            return $this;
        });

        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $this->sendVerifyEmail();

        view()->composer(['front.*', 'layouts.*'], function($view){
            $view->with('site_settings', Cache::get('site_settings'));
        });
    }


    private function sendVerifyEmail(){
        VerifyEmail::toMailUsing(function ($notifiable) {
            $verify_url = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(config('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );

            $data = [
                'user_id' => $notifiable->id,
                'user_type' => 'user',
                'subject' => 'ACCOUNT VERIFICATION REQUIRED',
                'type' => 'verify',
                'email_data' => ['verify_url' => $verify_url, 'name' => $notifiable->complete_name]
            ];

            return (new MailMessage())
                ->from(config('mail.from.address'), config('mail.from.name'))
                ->subject('Verify your email address')
                ->markdown('emails.verify', $data);
        });
    }
}
