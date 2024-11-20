<?php


namespace youllusion\app\controllers;

use youllusion\core\Response;

class IniciarSesionController {
   
    /**
     * @throws QueryException
     */
    public function iniciarSesion() {

        Response::renderView(
            'iniciar-sesion',
            'layout');
    }
}