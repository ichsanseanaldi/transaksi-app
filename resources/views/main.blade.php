<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
        <title>Laravel</title>
    </head>
    <body>
        
        @include('layouts.navbar')
        
        <div class="container">
            <div class="wrapper">
                @yield('child')
            </div>
        </div>
    </body>

    <script src="/js/scriptDisplay.js"></script>

</html>
