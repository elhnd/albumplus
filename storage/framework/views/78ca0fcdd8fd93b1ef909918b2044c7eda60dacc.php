<?php $__env->startSection('content'); ?>

    <main class="container-fluid">
        <h1>
            <?php echo e($orphans->count); ?> <?php echo e(trans_choice(__('image orpheline|images orphelines'), $orphans->count)); ?>

            <?php if($orphans->count): ?>
                <a class="btn btn-danger pull-right" href="<?php echo e(route('orphans.destroy')); ?>"
                   role="button"><?php echo app('translator')->get('Supprimer'); ?></a>
            <?php endif; ?>
        </h1>
        <div class="card-columns">
            <?php $__currentLoopData = $orphans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orphan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <img class="img-fluid" src="<?php echo e(url('thumbs/' . $orphan)); ?>" alt="image">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('partials.script-delete', ['text' => __('Vraiment supprimer toutes les photos orphelines ?'), 'return' => 'reload'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/albumplus/resources/views/maintenance/orphans.blade.php ENDPATH**/ ?>