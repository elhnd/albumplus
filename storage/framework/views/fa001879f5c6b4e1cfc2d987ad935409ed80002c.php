<?php $__env->startSection('card'); ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Renouvellement du mot de passe'); ?>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('password.email')); ?>">
            <?php echo e(csrf_field()); ?>

            <?php echo $__env->make('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->get('Envoi de la demande'); ?>
            <?php echo $__env->renderComponent(); ?>
        </form>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/albumplus/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>