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
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle
                        <?php if(isset($category)): ?>
                            <?php echo e(currentRoute(route('category', $category->slug))); ?>

                        <?php endif; ?>
                            " href="#" id="navbarDropdownCat" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo app('translator')->get('Catégories'); ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownCat">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item" href="<?php echo e(route('category', $category->slug)); ?>"><?php echo e($category->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
                <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle<?php echo e(currentRoute(
                                                route('category.create'), 
                                                route('category.index'),
                                                route('category.edit', request()->category?: 0)
                                            )); ?>" href="#" id="navbarDropdownGestCat" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <?php echo app('translator')->get('Administration'); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownGestCat">
                            <a class="dropdown-item" href="<?php echo e(route('category.create')); ?>">
                                <i class="fas fa-plus fa-lg"></i> <?php echo app('translator')->get('Ajouter une catégorie'); ?>
                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('category.index')); ?>">
                                <i class="fas fa-wrench fa-lg"></i> <?php echo app('translator')->get('Gérer les catégories'); ?>
                            </a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle<?php echo e(currentRoute(route('image.create'))); ?>"
                        href="#" id="navbarDropdownGestAlbum" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                            <?php echo app('translator')->get('Gestion'); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownGestAlbum">
                            <a class="dropdown-item" href="<?php echo e(route('image.create')); ?>">
                                <i class="fas fa-images fa-lg"></i> <?php echo app('translator')->get('Ajouter une image'); ?>
                            </a>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item<?php echo e(currentRoute(route('login'))); ?>"><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('Connexion'); ?></a></li>
                <li class="nav-item<?php echo e(currentRoute(route('register'))); ?>"><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo app('translator')->get('Inscription'); ?></a></li>
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

    <?php if(session('ok')): ?>
        <div class="container">
            <div class="alert alert-dismissible alert-success fade show" role="alert">
                <?php echo e(session('ok')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    <?php endif; ?>

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