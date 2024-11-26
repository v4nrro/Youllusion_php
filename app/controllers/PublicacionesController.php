<?php

namespace youllusion\app\controllers;

use youllusion\app\entity\Publicacion;
use youllusion\app\repository\PublicacionesRepository;
use youllusion\core\Response;
use youllusion\core\helpers\FlashMessage;
use youllusion\core\App;
use youllusion\app\exceptions\AppException;
use youllusion\app\exceptions\FileException;
use youllusion\app\exceptions\QueryException;
use youllusion\app\exceptions\CategoriaException;
use youllusion\app\utils\File;

class PublicacionesController {
   
    /**
     * @throws QueryException
     */
    public function publicaciones() {
        $publicaciones = App::getRepository( PublicacionesRepository::class)->findAll();

        Response::renderView(
            'publicaciones',
            'layout',
            compact('publicaciones'));
    }

    public function crear() {

        
        $errores = FlashMessage::get('errores', []);
        $mensaje = FlashMessage::get('mensaje');
        $descripcion = FlashMessage::get('descripcion');
        $titulo = FlashMessage::get('titulo');

        try {
            $conexion = App::getConnection();
            
            $publicacionesRepository = App::getRepository(PublicacionesRepository::class);
    
            $publicaciones = $publicacionesRepository->findAll();

            FlashMessage::set('mensaje' , "Se ha guardado la imagen correctamente");
        } 
        catch (FileException $fileException) {
            FlashMessage::set('errores' , [$fileException->getMessage()]);
        }
        catch (QueryException $queryException) {
            FlashMessage::set('errores' , [$queryException->getMessage()]);
        }
        catch (AppException $appException) {
            FlashMessage::set('errores' , [$appException->getMessage()]);
        }
        catch (CategoriaException $categoriaException) {
            FlashMessage::set('errores' , [$categoriaException->getMessage()]);
        }

        Response::renderView(
            'crear',
            'layout',
            compact('errores', 'mensaje', 'descripcion', 'titulo', 'publicaciones', 'publicacionesRepository'));
    }

    public function nueva(){
        try {
            $publicacionesRepository = App::getRepository(PublicacionesRepository::class);

            $titulo = trim(htmlspecialchars($_POST['titulo']));
            $_SESSION['titulo']= $titulo;

            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $_SESSION['descripcion']= $descripcion;

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados);
                
            $imagen->saveUploadFile(Publicacion::RUTA_IMAGENES_PUBLICACIONES);
            
            //Insertar en la base de datos
            $imagenPublicacion = new Publicacion($imagen->getFileName(), $titulo, $descripcion);
            $publicacionesRepository->save($imagenPublicacion);
            
            FlashMessage::set('mensaje' , "Se ha guardado la publicación correctamente");
        } 
        catch (FileException $fileException) {
            FlashMessage::set('errores' , [$fileException->getMessage()]);
        } 
        catch (QueryException $queryException) {
            FlashMessage::set('errores' , [$queryException->getMessage()]);
        } 
        catch (AppException $appException) {
            FlashMessage::set('errores' , [$appException->getMessage()]);
        } 
        catch (CategoriaException $categoriaException) {
            FlashMessage::set('errores' , [$categoriaException->getMessage()]);
        }
        
        App::get('router')->redirect('publicaciones');
    }
    
    public function detalle($id){
        $publicacionesRepository = App::getRepository(PublicacionesRepository::class);
        $publicacion = $publicacionesRepository->find($id);
        
        Response::renderView(
        'publicacion-detalle',
        'layout',
        compact ( 'publicacion','publicacionesRepository')
        );
    }
}