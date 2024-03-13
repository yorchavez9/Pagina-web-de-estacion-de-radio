<?php

class Conexion {
    static public function conectar() {
        try {
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4');
            $link = new PDO("mysql:host=localhost;dbname=sis_radio", "root", "", $opciones);
            return $link;
        } catch(PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }
}
