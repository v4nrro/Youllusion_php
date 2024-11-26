<?php 

    namespace youllusion\app\repository;

    use youllusion\app\database\QueryBuilder;
    use youllusion\app\entity\Publicacion;

    class PublicacionesRepository extends QueryBuilder{
        /**
         * @param string $table
         * @param string $classEntity
         */
        public function __construct(string $table='publicaciones', string $classEntity=Publicacion::class)
        {
            parent::__construct($table, $classEntity);
        }
    }
?>