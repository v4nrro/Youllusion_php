<?php

    namespace youllusion\app\entity;
    use youllusion\app\entity\IEntity;

    class Publicacion implements IEntity{
         
        /**
         * @var string
         */
        
        private $id;  
        private $imagen, $titulo, $descripcion, $userId;

        const RUTA_IMAGENES_PUBLICACIONES = '/public/images/publicaciones/';

        public function __construct($imagen = "", $titulo = "", 
        $descripcion = "", $userId = 0) {

            $this->id = null;
            $this->imagen = $imagen;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
            $this->userId = $userId;
        }

        // Setters
        public function setImagen(string $imagen) : Publicacion {
            $this->imagen = $imagen;
            return $this;
        }

        public function setUserId(int $userId) : Publicacion {
            $this->userId = $userId;
            return $this;
        }

        public function setTitutlo(string $titulo) : Publicacion {
            $this->titulo = $titulo;
            return $this;
        }

        public function setDescripcion(string $descripcion) : Publicacion {
            $this->descripcion = $descripcion;
            return $this;
        }

        // Getters
        public function getImagen(){
            return $this->imagen;
        }

        public function getUserId(){
            return $this->userId;
        }

        public function getTitulo(){
            return $this->titulo;
        }

        public function getId(){
            return $this->id;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getUrlPublicaciones(){
            return self::RUTA_IMAGENES_PUBLICACIONES . $this->getImagen();
        }

        // toString
        public function __toString() {
            return $this->getDescripcion();
        }

        // IEntity
        public function toArray(): array {
            return [
                'id' => $this->getId(),
                'imagen' => $this->getImagen(),
                'titulo' => $this->getTitulo(),
                'descripcion' => $this->getDescripcion(),
                'userId' => $this->getUserId()
            ];
        }
    }
?>