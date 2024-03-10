<?php

/* CONTROLADORES */
require_once "controladores/Plantilla.controlador.php";
require_once "controladores/Usuario.controlador.php";
require_once "controladores/Banner.controlador.php";
require_once "controladores/Noticia.controlador.php";
require_once "controladores/Video.controlador.php";

/* MODELOS */
require_once "modelos/Usuario.modelo.php";
require_once "modelos/Banner.modelo.php";
require_once "modelos/Noticia.modelo.php";
require_once "modelos/Video.modelo.php";





/* INICIANDO PLANTILLA */
$plantilla = new ControladorPlantilla();

$plantilla->ctrPlantilla();