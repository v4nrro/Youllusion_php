<?php
    use youllusion\app\exceptions\NotFoundException;
    use youllusion\core\Request;
    use youllusion\core\App;

    try {
        require_once 'core/Bootstrap.php';
        App::get('router')->direct(Request::uri(), Request::method());
    }
    catch ( NotFoundException $notFoundException) {
        die($notFoundException->getMessage());
    }