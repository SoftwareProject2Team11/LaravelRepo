<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- FontAwesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css"
>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body onload='initialize()'>
<script src="{{ asset('js/app.js') }}"></script>
    <div id="app">
       @include('inc.navbar')
        <div class="container">

        @include('inc.messages')
        @yield('content')
    </div>

    
    <!-- Scripts -->
    
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <script type='text/javascript'
    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCOP4mOSY5Kxn88U4P6jTmlgdDcdLMYRkA&callback=initMap'>
    </script>
</body>
</html>
