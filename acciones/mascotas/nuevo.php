<?php

require_once '../../configuracion/database.php'; 
require_once '../../modelo/mascota.php'; 
require_once 'request/nuevoRequest.php'; 
require_once 'responses/nuevoResponse.php'; 

header('Content-Type: application/json');
$json = file_get_contents('php://input',true);
$req = json_decode($json);


$resp=new NuevoResponse();

$masc=new Mascota();
$masc->Especie=$req->Especie;
$masc->Nombre=$req->Nombre;
$masc->Raza=$req->Raza;

$masc->Agregar();
$resp->IsOk=true;

echo json_encode($resp);