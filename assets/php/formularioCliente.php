<?php


    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
 
  $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE
  
  require("conexion.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB

  $conexion = conexion(); // CREA LA CONEXION
  
if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
     echo "no existe la variable action";
     die();
};

if($action == 'GuardarCliente'){
    echo json_encode($params->nombre);
    die();
};


?>