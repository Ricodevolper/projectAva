<?php

ini_set('display_errors', 0);  // Deshabilita la visualización de errores en pantalla
ini_set('log_errors', 1);      // Habilita la escritura de errores en un archivo de registro
ini_set('error_log', 'error.log');  // Ruta al archivo de registro
require_once "controlador/plantilla.controlador.php";
require_once "controlador/articulos.controlador.php";
require_once "controlador/usuarios.controlador.php";
require_once "controlador/ventas.controlador.php";
require_once "controlador/rentabilidad.controlador.php";
require_once "controlador/clientes.controlador.php";
require_once "controlador/productos.controlador.php";
require_once "controlador/simulador.controlador.php";
require_once "controlador/retiros.controlador.php";
require_once "controlador/bi.controlador.php";
require_once "controlador/empleados.controlador.php";
require_once "controlador/pmercado.controlador.php";
require_once "controlador/depositos.controlador.php";
require_once "controlador/automatico.controlador.php";
require_once "controlador/notificaciones.controlador.php";
require_once "controlador/pagos.controlador.php";




require_once "modelos/usuarios.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/articulos.modelo.php";
require_once "modelos/rentabilidad.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/simulador.modelo.php";
require_once "modelos/retiros.modelo.php";
require_once "modelos/bi.modelo.php";
require_once "modelos/empleados.modelo.php";
require_once "modelos/empleados.modelo.php";
require_once "modelos/pmercado.modelo.php";
require_once "modelos/depositos.modelo.php";
require_once "modelos/automatico.modelo.php";
require_once "modelos/notificaciones.modelo.php";
require_once "modelos/pagos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();


