<?php

//auth routes for normal user

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['verify' => false, 'register' => false, 'reset' => false]);

//admin auth routes
Route::prefix('web_admin')->namespace('Auth')->group(function () {
    Route::get('/login', 'AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login.submit');
});

Route::prefix('web_admin')->namespace('Administrator')->middleware('auth:admin')->name('admin.')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');
    
    //admin profile routes
    Route::controller(ProfileController::class)->prefix('profile')->name('profiles.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/update-profile', 'updateProfile')->name('update');
    });
    // //user role permissions
    // Route::prefix('user-role-permissions')->name('role_permissions.')->group(function(){
    //     Route::get('/add','UserRolePermissionController@add')->name('add');
    //     Route::post('/store','UserRolePermissionController@store')->name('store');
    //     Route::get('/','UserRolePermissionController@index')->name('index');
    //     Route::get('/edit/{id}','UserRolePermissionController@edit')->name('edit');
    // });
    

    // //Permission Type routes
    // Route::get('/permission-types', 'PermissionTypeController@index')->name('permission_types');
    // Route::post('/permission-types/save', 'PermissionTypeController@save')->name('permission_types.save');
    // Route::get('/permission-types/delete/{type_id}', 'PermissionTypeController@delete')->name('permission_types.delete');

    //vendor routes
    Route::controller(VendorController::class)->prefix('vendor')->name('vendors.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'add')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'updateStatus')->name('update_status');
    });

    //software servies routes
    Route::controller(SoftwareServiceController::class)->prefix('software_services')->name('software_services.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'add')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/update-status/{id}/{status}/{column_name?}', 'updateStatus')->name('update_status');
    });

    //package types routes
    Route::controller(PackageTypeController::class)->prefix('package_types')->name('package_types.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'updateStatus')->name('update_status');
    });

    //vendor packages routes
    Route::controller(VendorPackageController::class)->prefix('vendor_packages')->name('vendor_packages.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('show-description/{id}', 'showDescription')->name('show_description');
        Route::get('/update-status/{id}/{status}/{column_name?}', 'updateStatus')->name('update_status');
    });

    //faqs rotues
    Route::controller(FaqController::class)->prefix('faqs')->name('faqs.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'add')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'updateStatus')->name('update_status');
    });

    //admin review route
    Route::controller(AdminReviewController::class)->prefix('review')->name('reviews.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'add')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });
    
    //booking routes
    Route::controller(TravelTourBookingController::class)->prefix('travel-tour-bookings')->name('tour_bookings.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/detail/{id}', 'bookingDetails')->name('details');
        Route::get('/update-status/{id}/{status}', 'updateStatus')->name('update_status');
    });

    //affiliate partnership routes
    Route::controller(AffiliatePartnershipController::class)->prefix('affiliate-partnership')->name('affiliate_partnerships.')->group(function(){
        Route::get('/', 'index')->name('index');
    });

    //contact us routes
    Route::controller(ContactUsController::class)->prefix('contact-us')->name('contact_us.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('show-message/{id}', 'showMessage')->name('show_message');
    });
    
    //offer routes
    Route::controller(OfferController::class)->prefix('offers')->name('offers.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/update-status/{id}/{status}', 'updateStatus')->name('update_status');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    //newsletters
    Route::controller(NewsletterController::class)->prefix('newsletters')->name('newsletters.')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    //user routes
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/update-status/{id}/{status}', 'updateStatus')->name('update_status');
    });
    //agent request routes
    Route::controller(AgentRequestController::class)->prefix('agent-requests')->name('agent_requests.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('show-message/{id}', 'showMessage')->name('show_message');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });
    //site setting routes
    Route::get('/site-settings', 'SettingController@siteSettingsForm')->name('site_settings_form');
    Route::post('/site-settings', 'SettingController@siteSetting')->name('site_setting');
    Route::get('/privacy-policy', 'SettingController@privacyPolicyForm')->name('privacy_policy_form');
    Route::post('/privacy-policy', 'SettingController@privacyPolicy')->name('privacy_policy');
    Route::get('/terms-of-use', 'SettingController@termsOfUseForm')->name('terms_of_use_form');
    Route::post('/terms-of-use', 'SettingController@termsOfUse')->name('terms_of_use');

    //properties routes
    Route::controller(PropertyController::class)->prefix('properties')->name('properties.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/documents/{property_id?}', 'getDocuments')->name('get_documents');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

});

//vendor login routes
Route::prefix('vendors')->namespace('Auth')->group(function () {
    Route::get('/login', 'VendorLoginController@showLoginForm')->name('vendors.login');
    Route::post('/logout', 'VendorLoginController@logout')->name('vendors.logout');
    Route::post('/login', 'VendorLoginController@login')->name('vendors.login.submit');
});
//vendor routes
Route::prefix('vendors')->namespace('Vendor')->name('vendors.')->middleware('auth:vendor')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    //packages routes
    // Route::controller(PackageController::class)->prefix('packages')->name('packages.')->group(function(){
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/add', 'add')->name('add');
    //     Route::post('/store', 'store')->name('store');
    //     Route::get('/edit/{id}', 'edit')->name('edit');
    //     Route::get('/delete/{id}', 'delete')->name('delete');
    //     Route::get('/update-status/{id}/{status}', 'updateStatus')->name('update_status');
    //     Route::get('show-description/{id}', 'showDescription')->name('show_description');
    //     Route::get('/delete-image/{id}', 'deletePackageImage')->name('delete_image');
    // });
    //booking routes
    // Route::controller(TravelTourBookingController::class)->prefix('travel-tours-bookings')->name('tour_bookings.')->group(function(){
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/detail/{id}', 'bookingDetails')->name('details');
    // });
    //profile controller
    Route::controller(ProfileController::class)->prefix('profile')->name('profiles.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::post('/update-profile', 'updateProfile')->name('update');
    });
    //property routes
    Route::controller(PropertyController::class)->prefix('property')->name('properties.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/add', 'add')->name('add');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::post('/documents/{property_id}', 'getDocuments')->name('get_documents');

    });
});
Route::get('/errors/{method}', 'ErrorController@index');


Route::namespace('Frontend')->name('fronts.')->group(function(){
    Route::controller(HomeController::class)->group(function(){
        Route::get('/', 'index')->name('home');
        Route::get('/it-solutions', 'itSolution')->name('it_solutions');
        Route::get('/travel-tourisam', 'travelTourisam')->name('travel_tourisam');
        Route::get('/travel-tourisam-details/{id}', 'travelTourisamDetail')->name('travel_tourisam_details');
        Route::get('/it-solutions-deatils/{id}', 'itSolutionDetail')->name('it_solution_details');
        Route::get('/affiliate-partnership', 'affiliatePartnershipForm')->name('affiliate_partnership');
        Route::post('/affiliate-partnership', 'affiliatePartnership')->name('affiliate_partnership_submit');
        Route::post('/travel-tour-booking', 'travelTourBooking')->name('travel_tour_booking');
        Route::get('/contact-us', 'contactUsForm')->name('contact_us_form');
        Route::post('/contact-us', 'contactUs')->name('contact_us');
        Route::post('/newsletter', 'newsletter')->name('newsletter');
        Route::get('/privacy-policy', 'privacyPolicy')->name('privacy_policy');
        Route::get('/terms-of-use', 'termOfUse')->name('term_of_use');
        Route::get('/support', 'support')->name('support');
        Route::get('/vendor-signup', 'vendorSignupForm')->name('vendor_signup_form');
        Route::post('/vendor-signup', 'vendorSignup')->name('vendor_signup');
        Route::post('/agent-request', 'agentRequest')->name('agent_request');
        Route::get('/properties', 'allProperties')->name('all_properties');
        Route::get('/property/{id}', 'property')->name('property');
    });
});

Route::namespace('User')->prefix('user')->name('users.')->group(function(){
    Route::controller(UserLoginController::class)->group(function(){
        Route::get('/login', 'loginForm')->name('login_form');
        Route::get('/registration', 'registrationForm')->name('registration_form');
        Route::post('/login', 'login')->name('login');
        Route::post('/registration', 'registration')->name('registration');
        Route::get('/email-verificaion', 'emailVerification')->name('email_verification')->middleware('signed');
        Route::get('/forget-password', 'forgetPassword')->name('forget_password');
        Route::post('/reset-password-link', 'resetPasswordLink')->name('reset_password_link');
        Route::get('/reset-password-form', 'resetPasswordForm')->name('reset_password_form')->middleware('signed');
        Route::post('/reset-password/{user_id}', 'resetPassword')->name('reset_password');
        Route::get('/logout', 'logout')->name('logout');
        Route::post('/update-details', 'updateDetails')->name('update_detail');
    });
    //user protected routes
    Route::controller(UserController::class)->middleware('auth:web')->group(function(){
        Route::get('/add-wishlist/{package_id}', 'addWishList')->name('add_wishlist');
        Route::get('/remove-wishlist/{id}', 'removeWishlist')->name('remove_wishlist');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
});
