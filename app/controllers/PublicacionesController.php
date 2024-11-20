<?php


namespace youllusion\app\controllers;

use youllusion\core\Response;

class PublicacionesController {
   
    /**
     * @throws QueryException
     */
    public function publicaciones() {

        Response::renderView(
            'publicaciones',
            'layout');
    }
}