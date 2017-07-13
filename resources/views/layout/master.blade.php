<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('titel')</title>
    <link rel="icon" href="tabBild2.ico">
    <link rel="icon" href="{{ URL::asset('img/AceOfSpades.jpg') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel='stylesheet' href="{{ URL::to('scr/css/app.css') }}">
    <script src="{{ URL::asset('js/fontawesome.js')}}"></script>
    @yield('style')

</head>
<body background="{{URL::asset('img/abstract-20650.jpg')}}">
@include('partials.header')


<div class="container">
    @yield('inhalt')
</div>
<script src="{{ URL::asset('js/jquery-1.12.3.min.js')}}" integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
        crossorigin="anonymous"></script>
<script src="{{ URL::asset('js/bootstrap.min.js')}}"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>
