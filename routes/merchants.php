<?php 


Route::group(['middleware'=>'merchant'], function ($merchant) {
    $merchant->get('/', 'LoginController@showLoginForm');
    $merchant->post('login', 'LoginController@login')->name('merchant.login');
    $merchant->get('register', 'RegisterController@showRegistrationForm')->name('merchant.register');
    $merchant->post('register', 'RegisterController@register');

// Password Reset Routes...
$merchant->get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
$merchant->post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
$merchant->get('password/reset/{token}', 'ResetPasswordController@showResetForm');
$merchant->post('password/reset', 'ResetPasswordController@reset');
});



 Route::get('/home', 'HomeController@index')->name('home');
