<!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href='{{ url('css/LoginCss.css') }}'/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet"> 
        @yield('script')
    </head>
    <body>
        <section> 
            @yield('content')
        </section>
    </body>
</html>