<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lepeferry') }} จองตั๋วเรือเฟอร์รี่ สปีดโบ้ท | รถตู้รับส่งสนามบิน เรือไปเกาะหลีเป๊ะ</title>

    {{-- SEO --}}
    <meta name="Description" content="บริษัทเดินเรือขนส่งนักท่องเที่ยวเกาะหลีเป๊ะ รถตู้รับส่งสนามบินหาดใหญ่ จองตั๋วราคาพิเศษ ชำระผ่านบัตรเครดิต เคาน์เตอร์เซอวิส โอนเงิน ออนไลน์ 24 ชั่วโมง"/>
    <meta name="KeyWords" content="หลีเป๊ะเดินทาง, เรือไปหลีเป๊ะ, หาดใหญ่หลีเป๊ะ, เฟอร์รี่หลีเป๊ะ, หลีเป๊ะเครื่องบิน, เหมาสปีดโบ้ทหลีเป๊ะ, ราคาเรือไปหลีเป๊ะ, รถตู้สนามบินหาดใหญ่, ท่าเรือปากบาราหลีเป๊ะ">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Theme -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wickedpicker.min.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">


    <style>
        body, .booking-form .form-control , .heading, h2{
            font-family: 'Kanit', sans-serif !important;
        }
        .dropdown-item{
            font-family: 'Kanit', sans-serif !important;
            font-size: 14px !important;
        }
    </style>
    @yield('head')

</head>
<body>
    <div id="app">
        @include('layouts.navtop')

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    {{-- theme --}}
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/wickedpicker.min.js') }}"></script>
    @yield('script')

</body>
</html>
