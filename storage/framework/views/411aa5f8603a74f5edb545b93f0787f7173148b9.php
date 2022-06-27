

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(url('scripts/LoginJs.js')); ?>' defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>LOGIN:</h1>
<form id="form" name="login" method="post"  action="<?php echo e(route('login')); ?>">
    <?php echo csrf_field(); ?>
    <label>UserName <input type='text' name='user'></label>
    <label>Password <input type='password' name='password'></label>
    <label id="ricerca">&nbsp;<input id="submit" type='submit'></label>
    <?php if(isset($error)): ?>
        <div id=errore>
            <h1><?php echo e($error); ?></h1>
        </div>
    <?php endif; ?>
</form>
<a href='<?php echo e(route('registrazione')); ?>' >Registrati se non hai un account</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_signup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/login.blade.php ENDPATH**/ ?>