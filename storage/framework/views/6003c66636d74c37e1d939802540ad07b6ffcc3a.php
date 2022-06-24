

<?php $__env->startSection('title', '| Cerca_Giochi'); ?>
<?php $__env->startSection('script'); ?>
<script src='<?php echo e(url('scripts/ApiCercaGiochi.js')); ?>' defer></script>
<script src='<?php echo e(url('scripts/AggiungiRimuoviPreferiti.js')); ?>' defer></script>
<script src='<?php echo e(url('scripts/AggiungiRimuoviLibreria.js')); ?>' defer></script>
<script type="text/javascript">
    const csrf_token= "<?php echo e(csrf_token()); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <div id="menu">
        <a id="home"href='<?php echo e(route('home')); ?>'>Home</a>
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
    <div id="titoloCercaGiochi">
        <h1><strong>Non sai a cosa giocare? Prendi spunto da qui per il tuo prossimo gioco </strong></h1>
    </div>
    
    <form id="form">
        Genere:
        <select id="genere" name='genere'>
            <option value='action'>Azione</option>
            <option value='adventure'>Avventura</option>
            <option value='role-playing-games-rpg'>RPG</option>
            <option value='shooter'>Sparatutto</option>
            <option value='puzzle'>Puzzle</option>
            <option value='strategy'>Strategia</option>
        
        </select>
    
        Console:
        <select id="console" name='console'>   
            <option value='4'>PC</option>
            <option value='1'>Xbox One</option>
            <option value='186'>Xbox Series S/X</option>
            <option value='14'>Xbox 360</option>
            <option value='18'>PlayStation 4</option>
            <option value='187'>PlayStation 5</option>
            <option value='7'>Nintendo Switch </option>
            
        </select>
        
        <label>&nbsp;<input id="submit" type='submit'  ></label>
    
    </form>
    
    <div id="elenco_giochi"> </div>
    
    <div id="bottoni">
        <a id="precedente" class="hidden" >Precedente</a>
        <a id="successivo" class="hidden">Successivo</a>
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/cercaGiochi.blade.php ENDPATH**/ ?>