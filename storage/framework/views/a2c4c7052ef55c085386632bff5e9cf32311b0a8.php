<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Album')); ?></title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><?php echo e(config('app.name', 'Album')); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('Connexion'); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('Inscription'); ?></a></li>
            <?php else: ?>
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="<?php echo e(route('logout')); ?>"><?php echo app('translator')->get('Déconnexion'); ?></a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hide">
                        <?php echo e(csrf_field()); ?>

                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php echo $__env->yieldContent('content'); ?>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
<script>
    $(() => {
        $('#logout').click((e) => {
            e.preventDefault()
            $('#logout-form').submit()
        })
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>
</html><?php /**PATH /home/eldji/albumplus/resources/views/layouts/app.blade.php ENDPATH**/ ?>