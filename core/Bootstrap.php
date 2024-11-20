<?php 
    use youllusion\core\App;
    use youllusion\core\Router;
    use youllusion\app\repository\UsuariosRepository;

    require __DIR__ . '/../vendor/autoload.php';

    Session_start();

    $config = require_once __DIR__ . '/../app/config.php';

    App::bind('config',$config); // Guardamos la configuración en el contenedor de servicios
    
    $router = Router::load(__DIR__ . '/../app/' . $config['routes']['filename']);
    App::bind('router',$router);

    if (isset($_SESSION['loguedUser'])) // Obtenemos el repositorio del usuario logueado y lo guardamos en el contenedor de servicios
        $appUser = App::getRepository(UsuariosRepository::class)->find($_SESSION['loguedUser']);
    else
        $appUser = null;

    App::bind('appUser', $appUser);

?>