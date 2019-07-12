<?php


    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input'); // RECIBE EL JSON DE ANGULAR
 
  $params = json_decode($json); // DECODIFICA EL JSON Y LO GUARADA EN LA VARIABLE

  $response = array();
  
  require_once("conexion.php"); // IMPORTA EL ARCHIVO CON LA CONEXION A LA DB

  $conexion = conexion(); // CREA LA CONEXION
  
if(isset($_GET['action'])){
    $action = $_GET['action'];
}else{
     echo "no existe la variable action";
     die();
};

if($action == 'GuardarCliente'){

    if($params->nombre != ''){
        mysqli_query($conexion, "INSERT INTO formularioCliente(nombre, email, telefono) VALUES
        ('$params->nombre','$params->email', '$params->telefono')");   
        $response['mensaje'] = 'Cliente Guardado con exito';
        echo json_encode($response);
        die();
    };

    
};

if($action == 'MensajesEnDbBienvenida'){

   $mensajeBienvenida = mysqli_query($conexion, "SELECT * FROM mensajeBienvenida WHERE mensajeBienvenida_id = 1");



   $json = array();
  while($row = mysqli_fetch_array($mensajeBienvenida)) {
    $json['mensajeDesdeDb'] = array('mensaje' => $row['mensajeBienvenida']);


    
  
  };
  $json['mensaje'] = 'mensajes de bienvenida';
  $jsonstring = json_encode($json);

  echo $jsonstring;
  die();

};


// if($action == 'MensajesEnDbInstruccion'){


 
//     $mensajeInstruccion = mysqli_query($conexion, "SELECT * FROM mensajeInstruccion");
 
//     $json = array();
  
//    while($row = mysqli_fetch_array($mensajeInstruccion)) {
//      $json['mensajeInstruccion'] = array(
//        'mensaje' => $row['mensajeInstruccion'],
//        'id' => $row['mensajeInstruccion_id']
//      );
//    };
//    $json['mensaje'] = 'Lista de mensajes de instruccion';
//    $jsonstring = json_encode($json);
 
//    echo $jsonstring;
//    die();
 
//  };
 


?>