<?php $__env->startSection('css'); ?>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Modifer le profil'); ?>
            <a href="<?php echo e(route('profile.destroy', $user->id)); ?>" class="btn btn-danger btn-sm pull-right invisible" role="button" aria-disabled="true"><i class="fas fa-angry fa-lg"></i> <?php echo app('translator')->get('Supprimer mon compte'); ?></a>
        <?php $__env->endSlot(); ?>
        <form method="POST" action="<?php echo e(route('profile.update', $user->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <?php echo $__env->make('partials.form-group', [
                'title' => __('Adresse email'),
                'type' => 'email',
                'name' => 'email',
                'required' => true,
                'value' => $user->email,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div id="slider" class="form-group invisible">
                <?php echo app('translator')->get('Pagination : '); ?><span id="nbr"><?php echo e($user->settings->pagination); ?></span> <?php echo app('translator')->get('images par page'); ?><br>
                <input id="pagination" name="pagination" type="number" data-slider-min="3" data-slider-max="20"
                       data-slider-step="1" data-slider-value="<?php echo e($user->settings->pagination); ?>"/><br>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="adult" name="adult" <?php echo e($user->settings->adult ? 'checked' : ''); ?>>
                    <label class="custom-control-label" for="adult"> <?php echo app('translator')->get('Je déclare être adulte'); ?></label>
                </div>
            </div>
            <a href="<?php echo e(route('profile.show', $user->id)); ?>" class="btn btn-warning invisible" role="button" aria-disabled="true"><i class="fas fa-dolly fa-lg"></i> <?php echo app('translator')->get('Exporter mes données personnelles'); ?></a>
            <?php $__env->startComponent('components.button'); ?>
                <?php echo app('translator')->get('Envoyer'); ?>
            <?php echo $__env->renderComponent(); ?>
        </form>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.2.0/bootstrap-slider.min.js"></script>
    <script>
        $(() => {
            $("#pagination")
                .slider()
                .on("slide", (e) => {
                    $("#nbr").text(e.value)
                })
                .on("change", (e) => {
                    $("#nbr").text(e.value.newValue)
                })
            $('#slider, a').removeClass('invisible');
        })
    </script>
    <?php echo $__env->make('partials.script-delete', ['text' => __('Vraiment supprimer votre compte ?'), 'return' => 'home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/Téléchargements/albumplus/resources/views/profiles/edit.blade.php ENDPATH**/ ?>