<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Detalle</h1>
    </div>
</div>

<div class="container">
<div class="row align-items-center">
        <div class="col-sm-5">

            <!-- Imagen -->
            <img class="img-fluid mb-3 mb-sm-0" width="300px" src="<?= $publicacion->getUrlPublicaciones(); ?>" alt="">

        </div>
        <div class="col-sm-7">

            <!-- Título -->
            <h4><?= $publicacion->getTitulo(); ?></h4>

            <!-- Descripción -->
            <p class="m-0"><?= $publicacion->getDescripcion(); ?></p>

            <!-- Borrar evento si es mio -->
             <?php if($_SESSION['loguedUser'] === $publicacion->getUserId()) :?>
                <form method="POST" action="/detalle/borrar">
                    <input type="hidden" name="id" value="<?= $publicacion->getId() ?>">
                    <button type="submit" class="btn btn-danger">Borrar detalle</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>