<?php

require_once 'exceptions/DatabaseException.php';

class Conexion{
    public static function make(){ //funcion estática!!
        try{
            $conexion = new PDO(
                'mysql:host=localhost' . ';dbname=' . 'examen',
                'root',
                '',
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => true    
                ]
            );
        }
        
        catch (PDOException){
            throw new DatabaseException("Error en la conexión con la base de datos");
        }

        return $conexion;
    }
}
?>