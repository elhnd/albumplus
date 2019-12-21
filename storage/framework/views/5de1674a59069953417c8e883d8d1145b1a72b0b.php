<?php $__env->startSection('content'); ?>

    <div class="container py-5">
        <div class="row">
            <div class="col">
                <?php echo $__env->yieldContent('card'); ?>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/albumplus/resources/views/layouts/form-wide.blade.php ENDPATH**/ ?>