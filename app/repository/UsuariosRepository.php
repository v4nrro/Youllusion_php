<?php 

    namespace youllusion\app\repository;

    use youllusion\app\database\QueryBuilder;
    use youllusion\app\entity\Usuario;

    class UsuariosRepository extends QueryBuilder{
        /**
         * @param string $table
         * @param string $classEntity
         */
        public function __construct(string $table='usuarios', string $classEntity=Usuario::class)
        {
            parent::__construct($table, $classEntity);
        }
    }
?>