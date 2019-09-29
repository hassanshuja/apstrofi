<!DOCTYPE html>

<!--
Author: Shrenik Shah
Contact: shrenik9992@gmail.com
-->
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Apstrofi</title>
    <meta name="description" content="Login page">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" id="csrf_token" content="{!! csrf_token() !!}">
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{!! asset('backend/assets/app/custom/login/login-v4.default.css')!!}" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{!! asset('backend/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')!!}" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->


    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{!! asset('backend/assets/demo/default/base/style.bundle.css')!!}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{!! asset('backend/assets/demo/default/skins/header/base/light.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/demo/default/skins/header/menu/light.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/demo/default/skins/brand/dark.css')!!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/demo/default/skins/aside/dark.css')!!}" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{!! asset('backend/assets/media/logos/favicon.ico')!!}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({!! asset('backend/assets/media/bg/bg-2.jpg') !!});">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin:: Global Mandatory Vendors -->
<script src="{!! asset('backend/assets/vendors/general/jquery/dist/jquery.js')!!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/popper.js/dist/umd/popper.js')!!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/js-cookie/src/js.cookie.js')!!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/moment/min/moment.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')!!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/sticky-js/dist/sticky.min.js')!!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/wnumb/wNumb.js')!!}" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->

<script src="{!! asset('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/jquery-validation/dist/additional-methods.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/custom/components/vendors/jquery-validation/init.js') !!}" type="text/javascript"></script>

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{!! asset('backend/assets/vendors/general/jquery-form/dist/jquery.form.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/demo/default/base/scripts.bundle.js')!!}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
@yield('page_js')

<!--end::Page Scripts -->

</body>

<!-- end::Body -->
</html>