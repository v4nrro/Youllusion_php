<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Crear</h1>
    </div>
</div>
<!-- Page Header End -->

<?php include __DIR__ . '/show-error.part.view.php' ?>

<!-- Service Start -->
<div class="container-fluid my-5">
    <div class="container">
        <div class="reservation position-relative overlay-top overlay-bottom">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                        <h1 class="text-white mb-4 mt-5"></h1>
                        <form class="mb-5" action="/crear/nueva" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input name="titulo" type="text" class="form-control bg-transparent border-primary p-4" placeholder="Título"
                                    required/>
                            </div>
                            <div class="form-group">
                                <label for="archivo" class="btn btn-primary">Sube tu imagen o vídeo</label>
                                <input name="imagen" type="file" class="form-control-file d-none" id="archivo">
                            </div>
                            <div class="form-group">
                                <textarea name="descripcion" class="form-control bg-transparent py-3 px-4" rows="5" id="message" placeholder="Descripción"
                                    required></textarea>
                            </div>

                            

                            <!-- Captcha -->
                            <label class="label-control" style="color: white;">Introduce el captcha:  
                                <img style="border: 1px solid #D3D0D0" src="../../app/utils/captcha.php" id='captcha'>
                            </label>
                            <input class="form-control" type="text" name="captcha">
                            
                            <br>

                            <div>
                                <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Publicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->