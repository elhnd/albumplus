<?php $__env->startSection('content'); ?>

    <div class="site-wrapper">
        <div class="site-wrapper-inner text-white text-center">
            <i class="fas fa-spinner fa-pulse fa-4x"></i>
        </div>
    </div>
    <main class="container-fluid">
        <?php if(isset($category)): ?>
            <h2 class="text-title mb-3"><?php echo e($category->name); ?></h2>
        <?php endif; ?>
        <?php if(isset($user)): ?>
            <h2 class="text-title mb-3"><?php echo e(__('Photos de ') . $user->name); ?></h2>
        <?php endif; ?>
        <div class="d-flex justify-content-center">
            <?php echo e($images->links()); ?>

        </div>
        <div class="card-columns">
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card <?php if($image->adult): ?> border-danger <?php endif; ?>" id="image<?php echo e($image->id); ?>">
                    <a href="<?php echo e(url('images/' . $image->name)); ?>" class="image-link">
                        <img class="card-img-top"
                             src="<?php echo e(url('thumbs/' . $image->name)); ?>"
                             alt="image">
                    </a>
                    <?php if(isset($image->description)): ?>
                        <div class="card-body">
                            <p class="card-text"><?php echo e($image->description); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="card-footer text-muted">
                        <em>
                            <a href="#" data-toggle="tooltip"
                               title="<?php echo e(__('Voir les photos de ') . $image->user->name); ?>"><?php echo e($image->user->name); ?></a>
                        </em>
                        <div class="pull-right">
                            <em>
                                <?php echo e($image->created_at->formatLocalized('%x')); ?>

                            </em>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="d-flex justify-content-center">
            <?php echo e($images->links()); ?>

        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(() => {
            $('.site-wrapper').fadeOut(1000)
            $('[data-toggle="tooltip"]').tooltip()
            $('.card-columns').magnificPopup({
                delegate: 'a.image-link',
                type: 'image',
                tClose: '<?php echo app('translator')->get("Fermer (Esc)"); ?>'<?php if($images->count() > 1): ?>,
                gallery: {
                    enabled: true,
                    tPrev: '<?php echo app('translator')->get("Précédent (Flèche gauche)"); ?>',
                    tNext: '<?php echo app('translator')->get("Suivant (Flèche droite)"); ?>'
                },
                callbacks: {
                    buildControls: function () {
                        this.contentContainer.append(this.arrowLeft.add(this.arrowRight))
                    }
                }<?php endif; ?>
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/albumplus/resources/views/home.blade.php ENDPATH**/ ?>