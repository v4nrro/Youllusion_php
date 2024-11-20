<?php 

namespace youllusion\app\database;

use youllusion\app\exceptions\AppException;
use youllusion\core\App;
use PDO;
use PDOException;

class Connection {
    /**
     * @return PDO
     * @throws AppException
     */
    public static function make() {
        try {
            $config = App::get('config')['database'];
            $connection = new PDO (
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }
        
        catch (PDOException $PDOException) {
            throw new AppException('No se ha podido crear la conexión a la base de datos');
        }

        return $connection;
    }
}


?>