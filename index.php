<?php

/* CONTROLADORES */
require_once "controladores/Plantilla.controlador.php";
require_once "controladores/Usuario.controlador.php";

/* MODELOS */
require_once "modelos/Usuario.modelo.php";





/* INICIANDO PLANTILLA */
$plantilla = new ControladorPlantilla();

$plantilla->ctrPlantilla();