<?php

if ($_POST['gerente']) {
   print_r($_POST);

 
 $id_cliente = $_POST['id_cliente'];
 $gerente = $_POST['gerente']; 
 $asesor = $_POST['asesor'];
 $fondo = $_POST['fondo'];
 $serie = $_POST['serie'];
 $numeroContrato = $_POST['numeroContrato'];

     $insertContrato = ControladorDepositos::ctrInsertContrato($id_cliente, $gerente, $asesor, $fondo, $serie, $numeroContrato);


}

//