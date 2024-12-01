<?php 
    $router->get ('', 'PagesController@index');
    $router->get ('contacto', 'PagesController@contacto');
    $router->get ('iniciar-sesion', 'AuthController@iniciarSesion');
    $router->get ('publicaciones', 'PublicacionesController@publicaciones', 'ROLE_USER');
    $router->get ('crear', 'PublicacionesController@crear', 'ROLE_USER');
    $router->get ('registro', 'AuthController@registro');
    $router->get ('cerrar-sesion', 'AuthController@cerrarSesion');
    $router->get ('publicaciones/:id', 'PublicacionesController@detalle', 'ROLE_USER');
    $router->get ('lista-usuarios', 'UsuariosController@listaUsuarios', 'ROLE_ADMIN');
    $router->get ('perfil/:id', 'UsuariosController@miPerfil', 'ROLE_USER');
    $router->get ('mis-publicaciones/:id', 'PublicacionesController@misPublicaciones', 'ROLE_USER');

    $router->post('check-login', 'AuthController@checkLogin');
    $router->post('check-registro', 'AuthController@checkRegistro');
    $router->post ('crear/nueva', 'PublicacionesController@nueva', 'ROLE_USER');
    $router->post('lista-usuarios/borrar', 'UsuariosController@borrar', 'ROLE_ADMIN');
    $router->post('detalle/borrar', 'PublicacionesController@borrar', 'ROLE_USER');
    $router->post('lista-usuarios/cambiar-rol', 'UsuariosController@cambiarRol', 'ROLE_ADMIN');
    $router->post('perfil/modificar-username', 'UsuariosController@modificarUsername', 'ROLE_USER');
    $router->post('perfil/modificar-password', 'UsuariosController@modificarPassword', 'ROLE_USER');
    $router->post('perfil/modificar-avatar', 'UsuariosController@modificarAvatar', 'ROLE_USER');

