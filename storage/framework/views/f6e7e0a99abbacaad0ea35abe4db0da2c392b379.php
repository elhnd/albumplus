<?php $__env->startSection('card'); ?>

    <?php $__env->startComponent('components.card'); ?>

        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Mode maintenance'); ?>
        <?php $__env->endSlot(); ?>

        <form method="POST" action="<?php echo e(route('maintenance.update')); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php $__env->startComponent('components.checkbox', [
                    'name' => 'maintenance',
                    'label' => __('Mode maintenance'),
                    'checked' => $maintenance ? 'checked' : ''
                ]); ?>
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('components.checkbox', [
                    'name' => 'ip',
                    'label' => __('Autoriser mon IP ') . '(' . $ip . ')',
                    'checked' => $ipChecked ? 'checked' : ''
                ]); ?>
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->get('Envoyer'); ?>
            <?php echo $__env->renderComponent(); ?>
        </form>

    <?php echo $__env->renderComponent(); ?>  
              
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/albumplus/resources/views/maintenance/maintenance.blade.php ENDPATH**/ ?>