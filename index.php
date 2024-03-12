<?php

/* CONTROLADORES */
require_once "controladores/Plantilla.controlador.php";
require_once "controladores/Usuario.controlador.php";
require_once "controladores/Banner.controlador.php";
require_once "controladores/Noticia.controlador.php";
require_once "controladores/Video.controlador.php";
require_once "controladores/Evento.controlador.php";
require_once "controladores/Galeria.controlador.php";
require_once "controladores/Conductor.controlador.php";

/* MODELOS */
require_once "modelos/Usuario.modelo.php";
require_once "modelos/Banner.modelo.php";
require_once "modelos/Noticia.modelo.php";
require_once "modelos/Video.modelo.php";
require_once "modelos/Evento.modelo.php";
require_once "modelos/Galeria.modelo.php";
require_once "modelos/Conductor.modelo.php";





/* INICIANDO PLANTILLA */
$plantilla = new ControladorPlantilla();

$plantilla->ctrPlantilla();