

<?php $__env->startSection('title', '| Preferiti'); ?>


<?php $__env->startSection('script'); ?>
<script src='<?php echo e(url('scripts/VisualizzaPreferiti.js')); ?>' defer></script>
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
    <a  id='linkLibreria' href='<?php echo e(route('miaLibreria')); ?>'>La mia libreria</a>
    <img id='libreria'src='<?php echo e(url('immagini//libreria.PNG')); ?>'/>
</div>
<div id="titoloPreferiti">
    <h1><strong>Ecco qui i tuoi giochi preferiti <?php echo e($username['userID']); ?></strong></h1>
</div>
<div id="giochi_preferiti"> </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2-main\resources\views/preferiti.blade.php ENDPATH**/ ?>