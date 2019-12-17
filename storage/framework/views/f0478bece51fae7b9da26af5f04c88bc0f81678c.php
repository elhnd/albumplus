<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Connexion'); ?>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo $__env->make('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.form-group', [
                'title' => __('Mot de passe'),
                'type' => 'password',
                'name' => 'password',
                'required' => true,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> 
                <label class="custom-control-label" for="remember"> <?php echo app('translator')->get('Se rappeler de moi'); ?></label>
            </div>
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->get('Connexion'); ?>
            <?php echo $__env->renderComponent(); ?>
            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                <?php echo app('translator')->get('Mot de passe oublié ?'); ?>
            </a>
        </form>
    <?php echo $__env->renderComponent(); ?>            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/albumplus/resources/views/auth/login.blade.php ENDPATH**/ ?>