<?php $__env->startSection('card'); ?>

    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Modifier un utilisateur'); ?>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('user.update', $user->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('partials.form-group', [
                'title' => __('Nom'),
                'type' => 'text',
                'name' => 'name',
                'value' => $user->name,
                'required' => true,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.form-group', [
                'title' => __('Email'),
                'type' => 'email',
                'name' => 'email',
                'value' => $user->email,
                'required' => true,
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="adult" name="adult" <?php echo e($user->settings->adult ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="adult"> <?php echo app('translator')->get('Adulte'); ?></label>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="verified" name="verified" <?php echo e($user->hasVerifiedEmail() ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="verified"> <?php echo app('translator')->get('Vérifié'); ?></label>
                </div>
            </div>
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->get('Envoyer'); ?>
            <?php echo $__env->renderComponent(); ?>
        </form>

    <?php echo $__env->renderComponent(); ?> 
               
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/albumplus/resources/views/users/edit.blade.php ENDPATH**/ ?>