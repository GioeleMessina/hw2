

<?php $__env->startSection('title', '| Carrello'); ?>

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href='<?php echo e(url('css/ShopCss.css')); ?>'/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(url('scripts/visualizzaCarrello.js')); ?>' defer></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <div id="menu">
        <a id="home"href='<?php echo e(route('home')); ?>'>Home</a>
        <a id="cerca" href='<?php echo e(route('cercaGiochi')); ?>'>Cerca Giochi</a>
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
    <a href='<?php echo e(route('shop')); ?>'>Continua i tuoi acquisti nello store</a>
</div>
<div id="titoloShop">
    <h1><strong>Ecco il tuo carrello <?php echo e($username['userID']); ?></strong></h1>
</div>
<div id="giochi_shop"> </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2-main\resources\views/carrello.blade.php ENDPATH**/ ?>