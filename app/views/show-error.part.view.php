<!-- Sección que muestra la confirmación del formulario o bien sus errores -->
<?php  if( !empty($mensaje) || !empty($errores) ) : ?>
<div class="alert alert-<?= empty($errores) ? 'info' : 'danger'; ?> alert-dismissible text-center" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">x</span>
    </button>
    <?php if(empty($errores)) : ?>
    <p><?= $mensaje ?></p>
    <?php else : ?>
    <ul>
        <?php foreach ($errores as $error) : ?>
        <li><?= $error ?></li>
        <?php endforeach;?>
    </ul>
    <?php endif; ?>
</div>
<?php endif; ?>