<?php

require_once '../../configuracion/database.php'; 
require_once '../../modelo/mascota.php'; 
require_once '/request/nuevoRequest.php'; 
require_once '/responses/nuevoResponse.php'; 

$json = file_get_contents('php://input',true);
$req = json_decode($json);
header('Content-Type: application/json');

$masc=new Mascota();
$masc->Especie=$req->Especie;
$masc->Nombre=$req->Nombre;
$masc->Raza=$req->Raza;

$masc->Agregar();
$masc->IsOk=true;

echo json_encode($resp);