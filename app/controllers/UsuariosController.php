<?php

namespace youllusion\app\controllers;

use youllusion\app\repository\PublicacionesRepository; 
use youllusion\app\repository\UsuariosRepository;
use youllusion\core\Response;
use youllusion\core\App;
use youllusion\core\helpers\FlashMessage;
use youllusion\core\Security;
use youllusion\app\utils\File;
use youllusion\app\entity\Usuario;

class UsuariosController
{

    /**
     * @throws QueryException
     */
    public

 function listaUsuarios() {

        $usuarios = App::getRepository(UsuariosRepository::class)->findAll();
        $mensaje = FlashMessage::get('mensaje');

        Response::renderView(
            'lista-usuarios',
            'layout',
            compact('usuarios', 'mensaje')
        );
    }

    public function cambiarRol(){
        $id = $_POST['id'];
        $rolSeleccionado = $_POST['role'];

        FlashMessage::set('mensaje' , "Se ha cambiado el rol correctamente");
        App::getRepository(UsuariosRepository::class)->updateRol($id, $rolSeleccionado);
        App::get('router')->redirect('lista-usuarios');        
    }

    public function borrar() {
        $id = $_POST['id'];

        $publicacionesUser = App::getRepository(PublicacionesRepository::class)->findByUserId($id);

        if (empty($publicacionesUser)) {
            App::getRepository(UsuariosRepository::class)->delete($id);
            App::get('router')->redirect('lista-usuarios');
        }
        else{
            App::get('router')->redirect('lista-usuarios');
            FlashMessage::set('error' , "No se puede borrar un usuario con publicaciones");
        }
            
    }

    public function miPerfil($id){
        $usuariosRepository = App::getRepository(UsuariosRepository::class);
        $usuario = $usuariosRepository->find($id);
        $mensaje = FlashMessage::get('mensaje');
        
        if($_SESSION['loguedUser'] === $usuario->getId()){
            Response::renderView(
                'mi-perfil',
                'layout',
                compact('usuario', 'mensaje')
            );
        }
        else{
            App::get('router')->redirect('');
        }        
    }

    public function modificarUsername(){
        $userId = $_SESSION['loguedUser'];
        $newUsername = $_POST['username'];

        App::getRepository(UsuariosRepository::class)->updateUsername($userId, $newUsername);

        FlashMessage::set('mensaje' , "Se ha cambiado el usuario correctamente");
        App::get('router')->redirect("perfil/$userId");
    }

    public function modificarPassword(){
        $userId = $_SESSION['loguedUser'];

        $password = Security::encrypt($_POST['password']);

        App::getRepository(UsuariosRepository::class)->updatePassword($userId, $password);
        
        FlashMessage::set('mensaje' , "Se ha cambiado la contraseña correctamente");
        App::get('router')->redirect("perfil/$userId");
    }

    public function modificarAvatar(){
        $userId = $_SESSION['loguedUser'];

        $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
        $avatar = new File('avatar', $tiposAceptados);
            
        $avatar->saveUploadFile(Usuario::RUTA_USUARIO_AVATAR);

        App::getRepository(UsuariosRepository::class)->updateAvatar($userId, $avatar->getFileName());

        FlashMessage::set('mensaje' , "Se ha cambiado el avatar correctamente");
        App::get('router')->redirect("perfil/$userId");
    }
}
