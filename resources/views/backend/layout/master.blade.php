<!DOCTYPE html>

<!--
Author: Shrenik
Contact: shrenik9992@gmail.com
-->
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Apstrofi</title>
    <meta name="description" content="Page with empty content">
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



    <!--begin:: Global Mandatory Vendors -->
    <link href="{!! asset('backend/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') !!}" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="{!! asset('backend/assets/vendors/general/socicon/css/socicon.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/vendors/custom/vendors/flaticon/flaticon.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/vendors/custom/vendors/flaticon2/flaticon.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/vendors/custom/vendors/fontawesome5/css/all.min.css') !!}" rel="stylesheet" type="text/css" />

    <!--end:: Global Optional Vendors -->
    @yield('page_css')
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{!! asset('backend/assets/demo/default/base/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/css/custom.css') !!}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{!! asset('backend/assets/demo/default/skins/header/base/light.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/demo/default/skins/header/menu/light.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/demo/default/skins/brand/dark.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('backend/assets/demo/default/skins/aside/dark.css') !!}" rel="stylesheet" type="text/css" />

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="{!! asset('backend/assets/media/logos/favicon.ico') !!}" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="javascript:void(0)">
            <img alt="Logo" src="{!! asset('backend/images/logo-big-white.png') !!}" />
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
            @include('backend.elements.sidebar')
        <!-- end:: Aside -->
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

            <!-- begin:: Header -->
                @include('backend.elements.header')

            <!-- end:: Header -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Content -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                    @yield('content')
                </div>

                <!-- end:: Content -->
            </div>

            <!-- begin:: Footer -->
            @include('backend.elements.footer')

            <!-- end:: Footer -->
        </div>
    </div>
</div>

<!-- end:: Page -->



<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->



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
<script src="{!! asset('backend/assets/vendors/general/jquery/dist/jquery.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/popper.js/dist/umd/popper.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/js-cookie/src/js.cookie.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/moment/min/moment.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/sticky-js/dist/sticky.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/wnumb/wNumb.js') !!}" type="text/javascript"></script>

<!--end:: Global Mandatory Vendors -->
<script src="{!! asset('backend/assets/vendors/general/jquery-validation/dist/jquery.validate.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/general/jquery-validation/dist/additional-methods.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/vendors/custom/components/vendors/jquery-validation/init.js') !!}" type="text/javascript"></script>
<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{!! asset('backend/assets/vendors/general/jquery-form/dist/jquery.form.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('backend/assets/demo/default/base/scripts.bundle.js') !!}" type="text/javascript"></script>
<script type="text/javascript">
    $.ajaxPrefilter(function(options, originalOptions, xhr) {
        var token = $('meta[name="csrf_token"]').attr('content');

        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        }
    });
</script>
<!--end::Global Theme Bundle -->
@yield('page_js')
</body>

<!-- end::Body -->
</html>