    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="/public/img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Mira, Crea & Aprende</h2>
                        <h1 class="display-1 text-white m-0">MAGIA</h1>
                        <h2 class="text-white m-0">* DESDE 2024 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="/public/img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Mira, Crea & Aprende</h2>
                        <h1 class="display-1 text-white m-0">MAGIA</h1>
                        <h2 class="text-white m-0">* DESDE 2024 *</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->
    
    <!-- Service Start PONER AQUÍ VIDEOS O IMAGENES ALEATORIOS DE LAS PUBLICACIONES TODO-->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">PUBLICACIONES</h4>
                <h1 class="display-4">Elegido para tí</h1>
            </div>
            <div class="row">
                <?php 
                    shuffle($publicaciones);
                    
                    require_once __DIR__ . "/index-publicaciones.part.php"
                    
                ?>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">TESTIMONIOS</h4>
                <h1 class="display-4">Nuestros Asociados</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="/public/img/testimonial-1.jpg" alt="">
                        <div class="ml-3">
                            <h4>Juan Tamariz</h4>
                            <i>Cartomagia</i>
                        </div>
                    </div>
                    <p class="m-0">Nunca había visto tanto contenido de ilusionistas en un solo lugar. Es un paso gigante para nuestra profesión.</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="/public/img/testimonial-2.jpg" alt="">
                        <div class="ml-3">
                            <h4>Dani Daortiz</h4>
                            <i>Cartomagia</i>
                        </div>
                    </div>
                    <p class="m-0">La mejor página para crear, visualizar y comentar contenido para ilusionistas.</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="/public/img/testimonial-3.jpg" alt="">
                        <div class="ml-3">
                            <h4>Luis Piedrahíta</h4>
                            <i>Numismagia</i>
                        </div>
                    </div>
                    <p class="m-0">Es cómo asistir a una conferencia de ilusionistas en cualquier momento y lugar. Sin duda la mejor página.</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="/public/img/testimonial-4.jpg" alt="">
                        <div class="ml-3">
                            <h4>Penn & Teller</h4>
                            <i>Magia de Escenario</i>
                        </div>
                    </div>
                    <p class="m-0">Por fin un lugar dónde compartir nuestro conocimiento y aprender de otros.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->