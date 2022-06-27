

<?php $__env->startSection('title', '| Home'); ?>
<?php $__env->startSection('script'); ?>
<script src='<?php echo e(url('scripts/AggiungiRimuoviPreferiti.js')); ?>' defer></script>
<script src='<?php echo e(url('scripts/AggiungiRimuoviLibreria.js')); ?>' defer></script>
<script src='<?php echo e(url('scripts/ApiHomePage.js')); ?>' defer></script>
<script type="text/javascript">
    const csrf_token= "<?php echo e(csrf_token()); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <div id="menu">
        <a id="cerca" href='<?php echo e(route('cercaGiochi')); ?>'>Cerca Giochi</a>
        <a id="preferiti" href='<?php echo e(route('preferiti')); ?>'>Preferiti</a>
        <a id="shop" href='<?php echo e(route('shop')); ?>'>Shop</a>
        <a id="logout" href='<?php echo e(route('logout')); ?>'>Logout</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="link">
    <a  id='linkLibreria' href='<?php echo e(route('miaLibreria')); ?>'>La mia libreria</a>
    <img id='libreria'src='<?php echo e(url('immagini//libreria.PNG')); ?>'/>
</div>
<div id="titolo">
    <h1>I GIOCHI PIU' APPREZZATI DALLA CRITICA</h1>
</div>
    
    <div id="ricerca_giochi"> </div>
    <div id="bottoni">
        <a id="precedente" class="hidden" >Precedente</a>
        <a id="successivo" class="hidden">Successivo</a>
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hw2-main\resources\views/home.blade.php ENDPATH**/ ?>