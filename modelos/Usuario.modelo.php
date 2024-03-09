<?php

require_once "Conexion.php";

class ModeloUsuarios
{

    /* ==========================
    MOSTRAR USUARIO
    ========================== */

    static public function mdlMostrarUsuarios($tabla, $item, $valor)
    {

        $conexion = Conexion::conectar();

        if ($item != null) {

            $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $conexion->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /* ==========================
    INGRESAR USUARIO
    ========================== */

    static public function mdlIngresarUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                nombre, 
                                                                apellidos, 
                                                                perfil, 
                                                                correo, 
                                                                password
                                                                ) 
                                                            VALUES(
                                                                :nombre,
                                                                :apellidos, 
                                                                :perfil, 
                                                                :correo, 
                                                                :password)"
                                                                );

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);    
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);    
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);    
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);    

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR USUARIO
    ========================== */

    static public function mdlActualizarUsuario()
    {



    }

    /* ==========================
    EDITAR USUARIO
    ========================== */

    static public function mdlEditarUsuario()
    {



    }

    /* ==========================
    EDITAR USUARIO
    ========================== */

    static public function mdlBorrarUsuario()
    {



    }

}

?>