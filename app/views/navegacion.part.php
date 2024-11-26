<?php
    use youllusion\app\utils\Utils;
?>

<div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
        <a href="/" class="navbar-brand px-lg-4 m-0">
            <h1 class="m-0 display-4 text-uppercase text-white">YOULLUSION</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">

            <?php if (is_null($app['user'])) : ?>
                <a href="/" class="nav-item nav-link <?php 
                     if (Utils::esOpcionMenuActiva('/')==true){
                        echo ' active';
                     }
                ?>">Inicio</a>

                <a href="/contacto" class="nav-item nav-link<?php 
                    if (Utils::esOpcionMenuActiva('/contacto')==true){
                        echo ' active';
                     }
                ?>">Contacto</a>

                <a href="/iniciar-sesion" class="nav-item nav-link<?php 
                    if (Utils::esOpcionMenuActiva('/iniciar-sesion')==true){
                        echo ' active';
                     }
                ?>">Iniciar Sesion</a>

                <a href="/registro" class="nav-item nav-link<?php 
                    if (Utils::esOpcionMenuActiva('/registro')==true){
                        echo ' active';
                     }
                ?>">Registro</a>
        
            <?php else : ?>
                <a href="/" class="nav-item nav-link <?php 
                     if (Utils::esOpcionMenuActiva('/')==true){
                        echo ' active';
                     }
                ?>">Inicio</a>

                <a href="/publicaciones" class="nav-item nav-link<?php 
                    if (Utils::esOpcionMenuActiva('/publicaciones')==true){
                        echo ' active';
                     }
                    ?>">Publicaciones</a>

                <a href="/crear" class="nav-item nav-link<?php 
                    if (Utils::esOpcionMenuActiva('/crear')==true){
                        echo ' active';
                     }
                    ?>">Crear</a>

                <a href="/contacto" class="nav-item nav-link<?php 
                    if (Utils::esOpcionMenuActiva('/contacto')==true){
                        echo ' active';
                     }
                    ?>">Contacto</a>

                <a href="/cerrar-sesion" class="nav-item nav-link<?php 
                    if (Utils::esOpcionMenuActiva('/cerrar-sesion')==true){
                        echo ' active';
                     }
                ?>">Cerrar Sesion</a>

            <?php endif; ?>

            <!-- Acceder a la lista de usuarios solo si eres Admin -->
            <?php if (isset($app['user']) && ($app['user']->getRole() === 'ROLE_ADMIN')) : ?>
                <a href="/lista-usuarios" class="nav-item nav-link<?php 
                    if (Utils::esOpcionMenuActiva('/lista-usuarios')==true){
                        echo ' active';
                     }
                ?>">Lista Usuarios</a>
            <?php endif; ?>
            </div>
        </div>
    </nav>
</div>