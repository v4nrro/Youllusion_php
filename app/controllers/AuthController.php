<?php


namespace youllusion\app\controllers;

use youllusion\core\Response;
use youllusion\core\helpers\FlashMessage;
use youllusion\app\exceptions\ValidationException;
use youllusion\app\repository\UsuariosRepository;
use youllusion\core\App;
use youllusion\app\entity\Usuario;
use youllusion\core\Security;

class AuthController {
   
    /**
     * @throws QueryException
     */
    public function iniciarSesion() {
        $errores = FlashMessage::get('login-error', []);
        $username = FlashMessage::get('username');

        Response::renderView(
            'iniciar-sesion',
            'layout',
            compact('errores', 'username'));
    }

    public function checkLogin() {
        try {
            if (!isset($_POST['username']) || empty($_POST['username']))
                throw new ValidationException('Debes introducir el usuario y el password');

            FlashMessage::set('username', $_POST['username']);

            if (!isset($_POST['password']) || empty($_POST['password']))
                throw new ValidationException('Debes introducir el usuario y el password');

            $usuario = App::getRepository(UsuariosRepository::class)->findOneBy([
                'username' => $_POST['username']
            ]);

            if (!is_null($usuario) && Security::checkPassword($_POST['password'], $usuario->getPassword())) {

                // Guardamos el usuario en la sesión y redireccionamos a la página principal
                $_SESSION['loguedUser'] = $usuario->getId(); // Guardamos el usuario en la sesión y redireccionamos a la página principal
                FlashMessage::unset('username');
                App::get('router')->redirect('');
            }
            throw new ValidationException('El usuario y el password introducidos no existen');
        } 
        catch (ValidationException $validationException) {
            FlashMessage::set('login-error', [$validationException->getMessage()]);
            App::get('router')->redirect('iniciar-sesion'); // Redireccionamos al login
        }
    }

    /**
     * @throws QueryException
     */
    public function registro() {

        $errores = FlashMessage::get('registro-error', []);
        $mensaje = FlashMessage::get('mensaje');
        $username = FlashMessage::get('username');

        Response::renderView(
            'registro',
            'layout',
            compact('errores', 'mensaje', 'username'));
    }

    public function checkRegistro() {
        try {
            if (!isset($_POST['username']) || empty($_POST['username']))
            throw new ValidationException('El nombre de usuario no puede estar vacío');

            FlashMessage::set('username', $_POST['username']);

            if (!isset($_POST['password']) || empty($_POST['password']))
            throw new ValidationException('El password de usuario no puede estar vacío');

            if (!isset($_POST['re-password']) || empty($_POST['re-password']) || $_POST['password'] !== $_POST['re-password'])
            throw new ValidationException('Los dos password deben ser iguales');

            $password = Security::encrypt($_POST['password']);
            $usuario = new Usuario();
            $usuario->setUsername($_POST['username']);
            $usuario->setRole('ROLE_USER');
            $usuario->setPassword($password);

            App::getRepository(UsuariosRepository::class)->save($usuario);

            FlashMessage::unset('username');
            $mensaje = "Se ha creado el usuario: " . $usuario->getUsername();
            FlashMessage::set('mensaje', $mensaje);
            App::get('router')->redirect('iniciar-sesion');
        }
        catch (ValidationException $validationException) {
            FlashMessage::set('registro-error', [$validationException->getMessage()]);
            App::get('router')->redirect('registro');
        }
    }

    public function cerrarSesion() {
        if (isset($_SESSION['loguedUser'])) {
            $_SESSION['loguedUser'] = null;
            unset($_SESSION['loguedUser']);
        }
        App::get('router')->redirect('iniciar-sesion');
    }
}