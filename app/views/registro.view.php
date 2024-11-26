<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Registro</h1>
    </div>
</div>
<!-- Page Header End -->
<?php include __DIR__ . '/show-error.part.view.php' ?>

<div class="container-fluid my-5">
    <div class="container">
        <div class="reservation position-relative overlay-top overlay-bottom">
            <div class="row align-items-center">
                <div class="col-lg-6 my-5 my-lg-0">
                    <div class="p-5">
                        <div class="mb-4">
                            <h1 class="display-3 text-primary">BENEFICIOS</h1>
                            <h1 class="text-white">Por registrarse</h1>
                        </div>
                        <p class="text-white">
                            Tendrás acceso a numerosas características sólo por registrarte.
                            También podrás disponer de los distintos tipos de suscripciones
                            para poder ver contenido exclusivo y recibir recompensas:
                        </p>
                        <ul class="list-inline text-white m-0">
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Sube vídeos o imágenes</li>
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Comenta en las publicaciones</li>
                            <li class="py-2"><i class="fa fa-check text-primary mr-3"></i>Accede a contenido exclusivo</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                        <h1 class="text-white mb-4 mt-5">Regístrate</h1>
                        <form class="mb-5" action="/check-registro" method="post">
                            <div class="form-group">
                                <input name="username" type="text" class="form-control bg-transparent border-primary p-4" placeholder="Nombre de usuario"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <div class="password" id="password" data-target-input="nearest">
                                    <input name="password" type="password" class="form-control bg-transparent border-primary p-4 datetimepicker-input" placeholder="Contraseña" data-target="#date" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="password" id="repeat-password" data-target-input="nearest">
                                    <input name="re-password" type="password" class="form-control bg-transparent border-primary p-4 datetimepicker-input" placeholder="Repite tu contraseña" data-target="#date" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">ENVIAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>