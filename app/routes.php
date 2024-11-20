<?php 
    $router->get ('', 'PagesController@index');
    $router->get ('contacto', 'PagesController@contacto');
    $router->get ('iniciar-sesion', 'IniciarSesionController@iniciarSesion');
    $router->get ('publicaciones', 'PublicacionesController@publicaciones');