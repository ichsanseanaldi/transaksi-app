<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;500;700;900&display=swap" rel="stylesheet">
        <title>E-commerce Checkout Template</title>
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
