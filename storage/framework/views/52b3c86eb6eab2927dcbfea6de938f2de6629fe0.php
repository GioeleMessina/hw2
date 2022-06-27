

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(url('scripts/RegistrazioneJs.js')); ?>' defer></script>
<script type="text/javascript">
    const SIGNUP_ROUTE = "<?php echo e(route('registrazione')); ?>";
</script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<h1>Inserisci i tuoi dati:</h1>
<form id="form" name='registrazione' method='post' action="<?php echo e(url('registrazione')); ?>">
    <?php echo csrf_field(); ?>
    <label id="labelNome">Nome <input id="inputNome" type='text' name='nome' value= '<?php echo e(old('nome')); ?>'></label><div id="erroreNome"></div>
    <label >Cognome <input id="inputCognome"  type='text' name='cognome' value= '<?php echo e(old('cognome')); ?>'></label><div id="erroreCognome"></div>
    <label>email <input id="inputEmail"type='text' name='email' value= '<?php echo e(old('email')); ?>'></label><div id="erroreEmail"></div>
    <label >userID <input id="inputID" type='text' name='IDuser' value= '<?php echo e(old('IDuser')); ?>'></label><div id="erroreUser"></div>
    <label>Password <input id="inputPassword" type='password' name='password'></label><div id="errorePassword"></div>
    <label>Conferma Password <input id="inputConfermaPass"type='password' name='ConfermaPassword'></label><div id="erroreConferma"></div>
    <label id="ricerca">&nbsp;<input  id="submit"type='submit' ></label>

</form>
<a href='<?php echo e(url('login')); ?>'>Torna al login</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login_signup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/registrazione.blade.php ENDPATH**/ ?>