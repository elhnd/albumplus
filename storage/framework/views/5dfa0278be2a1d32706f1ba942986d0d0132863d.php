<?php $__env->startSection('content'); ?>
    <main class="container-fluid">
        <h1><?php echo app('translator')->get('Export des données personnelles'); ?></h1>
        <div class="card">
            <div class="card-body">
                    <h5 class="card-title"><?php echo app('translator')->get('A propos'); ?></h5>
                 <table class="table">
                    <tr>
                        <td><?php echo app('translator')->get('Rapport généré pour : '); ?></td>
                        <td><?php echo e($user->email); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get('Pour le site :'); ?></td>
                        <td><?php echo e(env('APP_NAME')); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get("A l'url :"); ?></td>
                        <td><?php echo e(env('APP_URL')); ?></td>
                    </tr>
                     <tr>
                         <td><?php echo app('translator')->get('Le :'); ?></td>
                         <td><?php echo e(now()->formatLocalized('%x')); ?></td>
                     </tr>
                </table>
                <em><?php echo app('translator')->get('Vous pouvez enregistrer cette page pour conserver vos données en utilisant le menu de votre navigateur.'); ?></em>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo app('translator')->get('Utilisateur'); ?></h5>
                <table class="table">
                    <tr>
                        <td><?php echo app('translator')->get("ID : "); ?></td>
                        <td><?php echo e($user->id); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get("Nom de connexion : "); ?></td>
                        <td><?php echo e($user->name); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get("Email :"); ?></td>
                        <td><?php echo e($user->email); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo app('translator')->get("Date d'inscription :"); ?></td>
                        <td><?php echo e($user->created_at->formatLocalized('%x')); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <?php if (! ($images->isEmpty())): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo app('translator')->get('Medias'); ?></h5>
                    <table class="table" style="margin-bottom: 140px">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo app('translator')->get('Adresse web :'); ?></td>
                                <td>
                                    <div class="hover_img">
                                        <a href="<?php echo e(url('images/' . $image->name)); ?>" target="_blank"><?php echo e(url('images/' . $image->name)); ?><span><img src="<?php echo e(url('thumbs/' . $image->name)); ?>" alt="image" height="150" /></span></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eldji/Téléchargements/albumplus/resources/views/profiles/data.blade.php ENDPATH**/ ?>