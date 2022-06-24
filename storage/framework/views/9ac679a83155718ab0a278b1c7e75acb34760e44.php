

<?php $__env->startSection('title', '| Libreria'); ?>


<?php $__env->startSection('script'); ?>
<script src='<?php echo e(url('scripts/VisualizzaMiaLista.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
<div id="menu">
    <a id="home"href='<?php echo e(route('home')); ?>'>Home</a>
    <a id="cerca"href='<?php echo e(route('cercaGiochi')); ?>'>Cerca Giochi</a>
    <a id="shop" href='<?php echo e(route('shop')); ?>'>Shop</a>
    <a id="logout" href='<?php echo e(route('logout')); ?>''>Logout</a>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="link">
    <a  id='linkPreferiti' href='<?php echo e(route('preferiti')); ?>'>I miei prefiriti</a>
    <img id='stella'src='<?php echo e(url('immagini//Places-favorites-icon.PNG')); ?>'/>
</div>
<div id="titoloPreferiti"> 
    <h1><strong></strong></h1>
</div>
<div id="giochi_libreria"> </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/miaLibreria.blade.php ENDPATH**/ ?>