<?php

class Conexion{
    static public function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=radio_vivo","root","");

        $link->exec("set names utf8");

        if(!$link){
            
            echo "Error al conectar a la base de datos";
        }else{
            return $link;
        }
    }
}