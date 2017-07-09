<?php ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="index.png">
        <title>@yield('title')</title>

        <link href="starter-template.css" rel="stylesheet">
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    </head>

    <body>
        <h1> <br> <br> <font color="#009F74">Master</h1>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/alteSeite.blade.php"><font color="#0051FF"> Home </font></a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.blade.php">Contact</a></li>
                        <li><a href="seite1.html">Formular1</a>
                        </li><li><a href="seite2.html">Formular2</a></li>
                    </ul>
                </div>
        </nav>
        @yield('inhalt')
    </body>
</html>
