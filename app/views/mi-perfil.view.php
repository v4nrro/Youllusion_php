<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Perfil de: <?= $usuario->getUsername()?></h1>
    </div>
</div>

<?php include __DIR__ . '/show-error.part.view.php' ?>


<div class="container">
    <div class="row align-items-center">
        <div class="col-sm-5">
            <!-- Imagen -->
            <img class="img-fluid mb-3 mb-sm-0 rounded-circle" width="200px" src="<?= $usuario->getUrlAvatar(); ?>" alt="">

            <!-- Usuario -->
            <h4><?= $usuario->getUsername(); ?></h4>

        </div>
        <div class="col-sm-7">

            <!-- Formulario para modificar el username -->
            <form method="POST" action="/perfil/modificar-username">
                <div class="mb-3">
                    <label for="username" class="form-label">Nuevo Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $usuario->getUsername(); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Modificar Username</button>
            </form>

            <!-- Formulario para modificar el password -->
            <form method="POST" action="/perfil/modificar-password" class="mt-4">
                <div class="mb-3">
                    <label for="password" class="form-label">Nueva Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Modificar Contraseña</button>
            </form>

            <!-- Formulario para modificar la imagen -->
            <form method="POST" action="/perfil/modificar-avatar" class="mt-4" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="avatar" class="form-label">Nueva Imagen</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Modificar Imagen</button>
            </form>
        </div>
    </div>
</div>
