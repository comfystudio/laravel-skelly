<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>@if(isset($meta['title'])){{($meta['title'])}}@endif</title>

        <meta name="description" content="@if(isset($meta['description'])){{$meta['description']}}@endif" />
        <meta name="author" content="ComfyStudio"/>

        <!-- Open Graph Meta -->
        {{--<meta property="og:title" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework">--}}
        {{--<meta property="og:site_name" content="Dashmix">--}}
        {{--<meta property="og:description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">--}}
        {{--<meta property="og:type" content="website">--}}
        {{--<meta property="og:url" content="">--}}
        {{--<meta property="og:image" content="">--}}

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link href="/images/fav/favicon.ico" rel="shortcut icon" />
        <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="/js/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
        <link rel="stylesheet" href="/js/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" href="/js/admin/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/js/admin/plugins/ion-rangeslider/css/ion.rangeSlider.css">
        <link rel="stylesheet" href="/js/admin/plugins/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css">
        <link rel="stylesheet" href="/js/admin/plugins/dropzone/dist/min/dropzone.min.css">
        <link rel="stylesheet" href="/js/admin/plugins/cropperjs/cropper.min.css">
        <link rel="stylesheet" href="/js/admin/plugins/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="/js/admin/plugins/simplemde/simplemde.min.css">


        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="/css/admin/dashmix.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <link rel="stylesheet" id="css-theme" href="/css/admin/themes/xsmooth.css">
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header


        Footer

            ''                                          Static Footer if no class is added
            'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-dark'                          Dark themed Header
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed page-header-dark main-content-narrow">
            @include('partials/admin/sidebar')

            @include('partials/admin/header')
                @yield('content')
            @include('partials/admin/footer')
        </div>
        <!-- END Page Container -->

        <!--
            Dashmix JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="/js/admin/dashmix.core.min.js"></script>

        <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="/js/admin/dashmix.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="/js/admin/plugins/easy-pie-chart/jquery.easypiechart.min.js"></script>
        <script src="/js/admin/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="/js/admin/plugins/chart.js/Chart.bundle.min.js"></script>
        <script src="/js/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="/js/admin/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="/js/admin/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="/js/admin/plugins/select2/js/select2.full.min.js"></script>
        <script src="/js/admin/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
        <script src="/js/admin/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
        <script src="/js/admin/plugins/dropzone/dropzone.min.js"></script>
        <script src="/js/admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/js/admin/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/js/admin/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
        <script src="/js/admin/plugins/datatables/buttons/buttons.print.min.js"></script>
        <script src="/js/admin/plugins/datatables/buttons/buttons.html5.min.js"></script>
        <script src="/js/admin/plugins/datatables/buttons/buttons.flash.min.js"></script>
        <script src="/js/admin/plugins/datatables/buttons/buttons.colVis.min.js"></script>
        <script src="/js/admin/plugins/cropperjs/cropper.min.js"></script>
        <script src="/js/admin/plugins/ckeditor/ckeditor.js"></script>

        <!-- Page JS Code -->
        <script src="/js/admin/pages/be_comp_charts.min.js"></script>
        {{--<script src="/js/admin/pages/be_comp_image_cropper.min.js"></script>--}}
        {{--<script src="/js/admin/pages/be_tables_datatables.min.js"></script>--}}

        <script src="/js/admin/general.js"></script>

        <!-- Page JS Helpers (Easy Pie Chart + jQuery Sparkline Plugins) -->
        <script>jQuery(function(){ Dashmix.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'rangeslider', 'masked-inputs', 'easy-pie-chart', 'sparkline', 'ckeditor']); });</script>
    </body>
</html>
