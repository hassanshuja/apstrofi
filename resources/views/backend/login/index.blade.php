@extends('backend.layout.login')

@section('content')
@php
 // Test database connection
try {
    DB::connection()->getPdo();
} catch (\Exception $e) {
    dd("Could not connect to the database.  Please check your configuration. error:" . $e );
}   
@endphp
<div class="kt-login__container">
    <div class="kt-login__logo">
        <a href="{!! ADMIN !!}">
            <img src="{!! asset('backend/images/logo-big-white.png')!!}">
        </a>
    </div>
    <div class="kt-login__signin">
        <div class="kt-login__head">
            <h3 class="kt-login__title">Sign In To Admin</h3>
        </div>
        <form class="kt-form" action="{{ route('admin.login') }}">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
            </div>
            <div class="input-group">
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="row kt-login__extra">
                <div class="col">
                    <label class="kt-checkbox">
                        <input type="checkbox" name="remember"> Remember me
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="kt-login__actions">
                <button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign In</button>
            </div>
        </form>
    </div>
</div>
@endsection
@include('backend.login.js')