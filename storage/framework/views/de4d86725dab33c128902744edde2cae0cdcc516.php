

<?php $__env->startSection('title', '| Store'); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href='<?php echo e(url('css/ShopCss.css')); ?>'/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(url('scripts/apiShop.js')); ?>' defer></script>
<script src='<?php echo e(url('scripts/AggiungiRimuoviCarrello.js')); ?>' defer></script>
<script type="text/javascript">
    const csrf_token= "<?php echo e(csrf_token()); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
<div id="menu">
    <a id="home"href='<?php echo e(route('home')); ?>'>Home</a>
    <a id="cerca"href='<?php echo e(route('cercaGiochi')); ?>'>Cerca Giochi</a>
    <a id="preferiti" href='<?php echo e(route('preferiti')); ?>'>Preferiti</a>
    <a id="logout" href='<?php echo e(route('logout')); ?>'>Logout</a>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="link">
        <a  id='linkLibreria' href='<?php echo e(route('miaLibreria')); ?>'>La mia libreria</a>
        <img id='libreria'src='<?php echo e(url('immagini//libreria.PNG')); ?>'/>
    </div>
    <div id="shop">
    <a href='<?php echo e(route('carrello')); ?>'>Carrello</a>
            <img src='<?php echo e(url('immagini//carrello.PNG')); ?>'/>
            
    </div>

    <div id="titoloShop">
        <h1><strong>Trova la migliore offerta per il tuo prossimo acquisto </strong></h1>
    </div>
    
    <div id="formShop"> 
        <form id="ricerca">
            <label id="label">Nome gioco: <input type='text' id='contenuto'></label>
            <input id="cerca" type="submit" value="ricerca">
        </form>
    </div>
    

    
    <div id="giochi_shop"> </div>
    <div id='risali'>
        <img id='arrow' class='hidden' src='<?php echo e(asset('immagini//arrow-up.PNG')); ?>'/>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2-main\resources\views/shop.blade.php ENDPATH**/ ?>