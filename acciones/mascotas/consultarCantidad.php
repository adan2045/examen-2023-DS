<?php

require_once '../../configuracion/database.php'; 
require_once '../../modelo/mascota.php';  
require_once 'responses/consultarCantidadResponse.php'; 

header('Content-Type: application/json');
$json = file_get_contents('php://input',true);
$req = json_decode($json);


$resp=new ConsultarCantidadResponse();
$Mascotas=Mascota::BuscarTodas();

$ContadorMascotas=0;

foreach($Mascotas as $lm){
    $ContadorMascotas=$ContadorMascotas+1; 
}

$resp->CantidadMascotas=$ContadorMascotas;

echo json_encode($resp);