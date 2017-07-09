
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('titel')</title>
        <link rel="icon" href="tabBild2.ico">
        <link rel="icon" href="{{ URL::asset('img/tabBild.png') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel='stylesheet' href="{{ URL::to('scr/css/app.css') }}">
        <script src="https://use.fontawesome.com/da80c4bbaa.js"></script>


        @yield('style')

    </head>
    <body>
        @include('partials.header')


        <div class="container">
            @yield('inhalt')
        </div>
         <script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
</html>
