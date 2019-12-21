<script>
    $(() => {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        })
        $('[data-toggle="tooltip"]').tooltip()
        $('a.btn-danger').click((e) => {
            let that = $(e.currentTarget)
            e.preventDefault()
            swal.fire({
                title: '<?php echo e($text); ?>',
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: '<?php echo app('translator')->get('Oui'); ?>',
                cancelButtonText: '<?php echo app('translator')->get('Non'); ?>'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: that.attr('href'),
                        type: 'DELETE'
                    })
                    .done(() => {
                        <?php switch($return):
                            case ('removeTr'): ?>
                                that.parents('tr').remove()
                                <?php break; ?>
                            <?php case ('reload'): ?>
                                location.reload()
                                <?php break; ?>
                            <?php case ('home'): ?>
                                location.replace('/')
                                <?php break; ?>
                        <?php endswitch; ?>
                    })
                    .fail(() => {
                        swal.fire({
                            title: '<?php echo app('translator')->get('Il semble y avoir une erreur sur le serveur, veuillez réessayer plus tard...'); ?>',
                            type: 'warning'
                        })
                    })
                }
            })
        })
    })
</script><?php /**PATH /home/eldji/Téléchargements/albumplus/resources/views/partials/script-delete.blade.php ENDPATH**/ ?>