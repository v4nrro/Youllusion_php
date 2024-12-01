<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Usuarios</h1>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container">
        <?php include __DIR__ . '/show-error.part.view.php' ?>

        <?php foreach($usuarios as $usuario): ?>
        <div class="row">
            <div class="row align-items-center mb-5 gap-20">
                <div class="col-8 col-sm-9">
                    <p></p>

                    <img class="img-fluid mb-3 mb-sm-0 rounded-circle" width="200px" src="<?= $usuario->getUrlAvatar(); ?>" alt="">

                    <h4><?= $usuario->getUsername()?> - <?= $usuario->getRole()?></h4>

                    <!-- Añadimos el formulario para elegir el rol -->
                    <form method="POST" action="/lista-usuarios/cambiar-rol">
                        <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
                        <div class="d-flex align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="role" value="ROLE_ADMIN" 
                                    <?= $usuario->getRole() === 'ROLE_ADMIN' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="roleAdmin">Admin</label>
                            </div>
                            <div class="form-check me-3">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" value="ROLE_USER" 
                                    <?= $usuario->getRole() === 'ROLE_USER' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="roleUser">User</label>
                            </div>
                            <div class="form-check me-3">
                            </div>
                            <button type="submit" class="btn btn-primary ms-3">Guardar</button>
                        </div>
                    </form>

                    <p class="m-0"> <strong>Contraseña cifrada:</strong>
                        <?= $usuario->getPassword()?></p>

                    <br>
                    <form method="POST" action="/lista-usuarios/borrar">
                        <input type="hidden" name="id" value="<?= $usuario->getId() ?>">
                        <button type="submit" class="btn btn-danger">Borrar usuario</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
