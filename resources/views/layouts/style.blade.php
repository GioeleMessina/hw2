
<!DOCTYPE html>
    <html>
        <head>
            <title >GAME ZONE - @yield('title') </title>
            <link rel="stylesheet" href='{{ url('css/HomePageCss.css') }}'/>
            @yield('style')
            @yield('script')
            <script type="text/javascript"> 
                const BASE_URL = "{{url('/')}}"
            </script>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
            
        </head>

        <body>

            <article>
                <header> 
                    <nav>
                        <div id="intestazione">
                            <img id="titoloPagina" src='{{ asset('immagini//logo.png') }}'/> 
                            <div id="menu">
                            @yield('menu')
                            </div>
                        </div> 
                        <h1>
                            <strong>Rimani sempre aggioranto sul mondo dei videogames</strong><br/>
                            
                        </h1>

                    </nav>
                </header>
                
                <section>
                
                @yield('content')
                </section>
            

                <footer>
                    <p>Gioele Messina 1000002040<br/>A.A. 2021/2022</p>
                </footer>
                
            </article>

        </body>

    </html>