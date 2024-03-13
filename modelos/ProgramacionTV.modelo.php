<?php

require_once "Conexion.php";

class ModeloProgramacionTV
{

    /* ==========================
    MOSTRAR PROGRAMACION TV
    ========================== */

    static public function mdlMostrarProgramacionTV($tablaR, $tablaC, $item, $valor)
    {

        $conexion = Conexion::conectar();

        if ($item != null) {

            $stmt = $conexion->prepare("SELECT * FROM $tablaC INNER JOIN $tablaR ON $tablaC.id_conductor = $tablaR.id_conductor WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $conexion->prepare("SELECT * FROM $tablaC INNER JOIN $tablaR ON $tablaC.id_conductor = $tablaR.id_conductor ORDER BY id_tv DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /* ==========================
    INGRESAR PROGRAMACION TV
    ========================== */

    static public function mdlIngresarProgramacionTV($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_conductor, dia, titulo, imagen, hora) VALUES(:id_conductor, :dia, :titulo, :imagen, :hora)");

        $stmt->bindParam(":id_conductor", $datos["id_conductor"], PDO::PARAM_INT);
        $stmt->bindParam(":dia", $datos["dia"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }

    /* ==========================
    ACTUALIZAR PROGRAMACION TV
    ========================== */

    static public function mdlActualizarProgramacionTV($tabla, $item1, $valor1, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR PROGRAMCION TV
    ========================== */

    static public function mdlEditarProgramacionTV($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET
                                                                id_conductor = :id_conductor,
                                                                dia = :dia,
                                                                titulo = :titulo,
                                                                imagen = :imagen,
                                                                hora = :hora
                                                            WHERE 
                                                                id_tv = :id_tv
                                                            ");

        $stmt->bindParam(":id_conductor", $datos["id_conductor"], PDO::PARAM_INT);
        $stmt->bindParam(":dia", $datos["dia"], PDO::PARAM_STR);
        $stmt->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
        $stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
        $stmt->bindParam(":hora", $datos["hora"], PDO::PARAM_STR);
        $stmt->bindParam(":id_tv", $datos["id_tv"], PDO::PARAM_INT);
 

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

    }

    /* ==========================
    EDITAR PROGRAMACION TV
    ========================== */

    static public function mdlBorrarProgramacionTV($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tv = :id_tv");

		$stmt -> bindParam(":id_tv", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>