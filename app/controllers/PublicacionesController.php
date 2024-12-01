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
use Exception;

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

            // if ( isset($_POST['captcha']) && ($_POST['captcha']!="")) {
                    
            //     if( $_SESSION['captchaGenerado'] != $_POST['captcha'] ) {
            //         throw new Exception("Ha introducido un captcha incorrecto! Inténtelo de nuevo.");
            //     } 
            //     else {
                    $titulo = trim(htmlspecialchars($_POST['titulo']));
                    $_SESSION['titulo']= $titulo;

                    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
                    $_SESSION['descripcion']= $descripcion;

                    $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
                    $imagen = new File('imagen', $tiposAceptados);
                        
                    $imagen->saveUploadFile(Publicacion::RUTA_IMAGENES_PUBLICACIONES);
                    
                    $user = $_SESSION['loguedUser'];

                    //Insertar en la base de datos
                    $publicacion = new Publicacion($imagen->getFileName(), $titulo, $descripcion, $user);
                    $publicacionesRepository->save($publicacion);
                    
                    FlashMessage::set('mensaje' , "Se ha guardado la publicación correctamente");
                    App::get('router')->redirect('publicaciones');
            //     }
            // }
            // else{
            //     throw new Exception("No ha introducido un captcha. Inténtelo de nuevo.");
            // }
        } 
        catch (FileException $fileException) {
            FlashMessage::set('errores' , [$fileException->getMessage()]);
        } 
        catch (QueryException $queryException) {
            FlashMessage::set('errores' , [$queryException->getMessage()]);
        }
        catch (Exception $e){
            FlashMessage::set('errores' , [$e->getMessage()]);
        }
        catch (AppException $appException) {
            FlashMessage::set('errores' , [$appException->getMessage()]);
        } 
        catch (CategoriaException $categoriaException) {
            FlashMessage::set('errores' , [$categoriaException->getMessage()]);
        }
        App::get('router')->redirect('crear');
    }
    
    public function detalle($id){
        $publicacionesRepository = App::getRepository(PublicacionesRepository::class);
        $publicacion = $publicacionesRepository->find($id);
        $userId = $_SESSION['loguedUser']; 

        Response::renderView(
        'publicacion-detalle',
        'layout',
        compact ( 'publicacion','publicacionesRepository')
        );
    }

    public function borrar(){
        $id = $_POST['id'];

        if ($id) {
            App::getRepository(PublicacionesRepository::class)->delete($id);
            App::get('router')->redirect('publicaciones');
        }
            
        App::get('router')->redirect('publicaciones');
    }

    public function misPublicaciones($id){
        $publicacionesUser = App::getRepository(PublicacionesRepository::class)->findByUserId($id);

        Response::renderView(
            'mis-publicaciones',
            'layout',
            compact ( 'publicacionesUser')
            );
    }
}