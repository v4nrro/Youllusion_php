<?php

$publicacionesLimitadas = array_slice($publicaciones, 0, 4);

foreach ($publicacionesLimitadas as $publicacion):
?>

    <div class="col-lg-6 mb-5">
        <div class="row align-items-center">
            <div class="col-sm-5">

                <!-- Imagen -->
                <a href="/publicaciones/<?= $publicacion->getId(); ?>">
                    <img class="img-fluid mb-3 mb-sm-0" src="<?= $publicacion->getUrlPublicaciones(); ?>" alt="">
                </a>
            </div>
            <div class="col-sm-7">

                <!-- Título -->
                <a href="/publicaciones/<?= $publicacion->getId(); ?>">
                    <h4><?= $publicacion->getTitulo(); ?></h4>
                </a>

                <!-- Descripción -->
                <p class="m-0"><?= $publicacion->getDescripcion(); ?></p>

                <!-- Comentario? -->


            </div>
        </div>
    </div>
<?php endforeach; ?>