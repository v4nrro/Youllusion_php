    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Publicaciones</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <?php include __DIR__ . '/show-error.part.view.php' ?>

    <!-- About Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Publicaciones de la Comunidad</h4>
            </div>
            <div class="row">

                <!-- HACER UN FOREACH, RECORRER Y PONER LAS PUBLICACIONES AQUÍ  TODO-->
                <?php
                    foreach($publicaciones as $publicacion):
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
                <?php 
                    endforeach; 
                ?>
            </div>
        </div>
    </div>
    <!-- About End -->