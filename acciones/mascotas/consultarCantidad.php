<?php

require_once '../../configuracion/database.php'; 
require_once '../../modelo/mascota.php';  
require_once '/responses/consultarCantidadResponse.php'; 

$json = file_get_contents('php://input',true);
$req = json_decode($json);
header('Content-Type: application/json');

$resp=new ConsultarCantidadResponse();
$resp->ListMascotas=Mascota::BuscarTodas();

$ContadorMascotas=0;

foreach($resp->ListMascotas as $lm){
    $ContadorMascotas=$ContadorMascotas+1; 
}

$resp->CantMasc=$ContadorMascota;

echo json_encode($resp);