<?php $__env->startSection('card'); ?>
    <?php $__env->startComponent('components.card'); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Vérification de votre adresse email'); ?>
        <?php $__env->endSlot(); ?>
        <?php if(session('resent')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo app('translator')->get("Un nouveau lien de vérification a été envoyé à votre adresse email."); ?>
            </div>
        <?php endif; ?>
        <p><?php echo app('translator')->get("Avant d'utiliser ce site veuillez trouver le lien de vérification dans vos emails"); ?></p>
        <?php echo app('translator')->get("Si vous n'avez pas reçu l'email "); ?> <a href="<?php echo e(route('verification.resend')); ?>"><?php echo app('translator')->get("cliquez ici pour en recevoir un nouveau"); ?></a>.
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/albumplus/resources/views/auth/verify.blade.php ENDPATH**/ ?>