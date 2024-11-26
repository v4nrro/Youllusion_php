<?php 
    $router->get ('', 'PagesController@index');
    $router->get ('contacto', 'PagesController@contacto');
    $router->get ('iniciar-sesion', 'AuthController@iniciarSesion');
    $router->get ('publicaciones', 'PublicacionesController@publicaciones', 'ROLE_USER');
    $router->get ('crear', 'PublicacionesController@crear', 'ROLE_USER');
    $router->get ('registro', 'AuthController@registro');
    $router->get ('cerrar-sesion', 'AuthController@cerrarSesion');
    $router->get ('publicaciones/:id', 'PublicacionesController@detalle', 'ROLE_USER');


    $router->post('check-login', 'AuthController@checkLogin');
    $router->post('check-registro', 'AuthController@checkRegistro');
    $router->post ('crear/nueva', 'PublicacionesController@nueva', 'ROLE_USER');
