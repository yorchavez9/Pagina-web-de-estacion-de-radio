<?php

require_once "Conexion.php";

class ModeloSobreNosotros
{

    /* ==========================
    MOSTRAR SOBRE NOSOTROS
    ========================== */

    static public function mdlMostrarSobreNosotros($tabla, $item, $valor)
    {

        $conexion = Conexion::conectar();

        if ($item != null) {

            $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $conexion->prepare("SELECT * FROM $tabla ORDER BY id_sobre_nosotros DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /* ==========================
    INGRESAR SOBRE NOSOTROS
    ========================== */

    static public function mdlIngresarSobreNosotros($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo, descripcion) VALUES(:titulo, :descripcion)");

        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);


        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }


    /* ==========================
    EDITAR SOBRE NOSOTROS
    ========================== */

    static public function mdlEditarSobreNosotros($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                titulo = :titulo,
                                                                descripcion = :descripcion
                                                            WHERE 
                                                                id_sobre_nosotros = :id_sobre_nosotros
                                                            ");

        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_sobre_nosotros", $datos["id_sobre_nosotros"], PDO::PARAM_INT);
 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR SOBRE NOSOTROS
    ========================== */

    static public function mdlBorrarSobreNosotros($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sobre_nosotros = :id_sobre_nosotros");

		$stmt -> bindParam(":id_sobre_nosotros", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>