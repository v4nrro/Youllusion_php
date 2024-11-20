<?php

namespace youllusion\app\controllers;

use youllusion\core\Response;

class PagesController {

    /**
     * @throws QueryException
     */
    public function index() {

        Response::renderView(
            'index',
            'layout');
    }
    

    /**
     * @throws QueryException
     */
    public function contacto() {

        Response::renderView(
            'contacto',
            'layout');
    }   
}