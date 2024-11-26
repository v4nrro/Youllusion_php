<?php

namespace youllusion\app\controllers;

use youllusion\app\repository\PublicacionesRepository;
use youllusion\core\Response;
use youllusion\core\App;

class PagesController {

    /**
     * @throws QueryException
     */
    public function index() {

        $publicaciones = App::getRepository( PublicacionesRepository::class)->findAll();

        Response::renderView(
            'index',
            'layout',
            compact('publicaciones'));
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