<?php

require_once "Conexion.php";

class ModeloPatrocinador
{

    /* ==========================
    MOSTRAR PATROCINADOR
    ========================== */

    static public function mdlMostrarPatrocinador($tabla, $item, $valor)
    {

        $conexion = Conexion::conectar();

        if ($item != null) {

            $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = $conexion->prepare("SELECT * FROM $tabla ORDER BY id_patrocinador DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt = null;
    }

    /* ==========================
    INGRESAR PATROCINADOR
    ========================== */

    static public function mdlIngresarPatrocinador($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                nombre, 
                                                                empresa,
                                                                correo,
                                                                telefono,
                                                                sitio_web,
                                                                direccion,
                                                                mensaje
                                                                ) 
                                                            VALUES(
                                                                :nombre,
                                                                :empresa,
                                                                :correo,
                                                                :telefono,
                                                                :sitio_web,
                                                                :direccion,
                                                                :mensaje
                                                                )"
                                                                );

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":empresa", $datos["empresa"], PDO::PARAM_STR);    
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);    
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);    
        $stmt->bindParam(":sitio_web", $datos["sitio_web"], PDO::PARAM_STR);    
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);    
        $stmt->bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);    
  

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }


    }


    /* ==========================
    BORRAR PATROCINADOR
    ========================== */

    static public function mdlBorrarPatrocinador($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_patrocinador = :id_patrocinador");

		$stmt -> bindParam(":id_patrocinador", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt = null;


    }

}

?>
