
<!DOCTYPE html>
    <html>
        <head>
            <title >GAME ZONE - <?php echo $__env->yieldContent('title'); ?> </title>
            <link rel="stylesheet" href='<?php echo e(url('css/HomePageCss.css')); ?>'/>
            <?php echo $__env->yieldContent('style'); ?>
            <?php echo $__env->yieldContent('script'); ?>
            <script type="text/javascript"> 
                const BASE_URL = "<?php echo e(url('/')); ?>"
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
                            <img id="titoloPagina" src='<?php echo e(asset('immagini//logo.png')); ?>'/> 
                            <div id="menu">
                            <?php echo $__env->yieldContent('menu'); ?>
                            </div>
                        </div> 
                        <h1>
                            <strong>Rimani sempre aggioranto sul mondo dei videogames</strong><br/>
                            
                        </h1>

                    </nav>
                </header>
                
                <section>
                
                <?php echo $__env->yieldContent('content'); ?>
                </section>
            

                <footer>
                    <p>Gioele Messina 1000002040<br/>A.A. 2021/2022</p>
                </footer>
                
            </article>

        </body>

    </html><?php /**PATH C:\xampp\htdocs\example-app\resources\views/layouts/style.blade.php ENDPATH**/ ?>