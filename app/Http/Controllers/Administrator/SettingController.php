<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function siteSettingsForm(){
        $data = array(
            'title'        => 'Site settings',
            'site_setting' => Setting::where('type', 'site_settings')->first(),
        );
        
        return view('admin.site_setting.index')->with($data);
    }

    public function siteSetting(SiteSettingRequest $req){
        
        $validated = $req->validated();

        $data_arr  = array(
            'site_name'         => $validated['site_name'],
            'short_desc'        => $validated['short_desc'],
            'contact_no'        => $validated['contact_no'],
            'email'             => $validated['email'],
            'facebook_link'     => $validated['facebook_link'],
            'instagram_link'    => $validated['instagram_link'],
            'twitter_link'      => $validated['twitter_link'],
            'youtube_link'      => $validated['youtube_link'],
            'header_logo'       => $validated['old_header_logo'],
            'footer_logo'       => $validated['old_footer_logo'],
            'favicon'           => $validated['old_favicon'],
        );

        if(!empty($validated['header_logo'])){
            $data_arr['header_logo']  = CommonHelpers::uploadSingleFile($validated['header_logo'], 'admin_uploads/site_settings/', 'png,jpg,jpeg', 1080);
        }

        if(!empty($validated['footer_logo'])){
            $data_arr['footer_logo']  = CommonHelpers::uploadSingleFile($validated['footer_logo'], 'admin_uploads/site_settings/', 'png,jpg,jpeg', 1080);
        }

        if(!empty($validated['favicon'])){
            $data_arr['favicon']  = CommonHelpers::uploadSingleFile($validated['favicon'], 'admin_uploads/site_settings/', 'png,jpg,jpeg', 1080);
        }

        $setting = Setting::firstOrNew(['type'=>'site_settings']);
        $setting->type = 'site_settings';
        $setting->data = $data_arr;
        $setting->save();
        
        Cache::forever('site_settings', $data_arr);//store site setting in cache

        return response()->json([
            'success'   => 'Site setting updated successfully',
            'reload'    => true
        ]);
    }

    public function privacyPolicyForm(){
        $data = array(
            'tilte'                 => 'Privacy Policy',
            'edit_privacy_policy'   => Setting::where('type', 'privacy_policy')->first(),
        );
        return view('admin.privacy_policy.index')->with($data);
    }

    public function privacyPolicy(Request $req){
        
        $req->validate([
            'privacy_policy'    => ['required', 'max:65000'],
        ]);

        $privacy = Setting::firstOrNew(['type'=>'privacy_policy']);
        $privacy->data = $req->privacy_policy;
        $privacy->save();

        return response()->json([
            'success'   => 'Privacy policy updated successfully',
            'reload'    => true
        ]);
    }

    public function termsOfUseForm(){
        $data = array(
            'title'                 => 'Terms of user',
            'edit_term_of_use'      => Setting::where('type', 'term_of_use')->first(),
        );
        return view('admin.term_of_use.index')->with($data);
    }

    public function termsOfUse(Request $req){
        
        $req->validate([
            'term_of_use'    => ['required', 'max:65000'],
        ]);

        $term = Setting::firstOrNew(['type'=>'term_of_use']);
        $term->data = $req->term_of_use;
        $term->save();

        return response()->json([
            'success'   => 'Term of use updated successfully',
            'reload'    => true
        ]);
    }
}
