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

    static public function mdlIngresarUsuario()
    {



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