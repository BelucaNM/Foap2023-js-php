<?php
header("Content-type: application/json; charset=utf-8");
$_POST=json_decode(file_get_contents('php://input'), true);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname); // Create connection

if ($conn->connect_error) {// Check connection
    echo json_encode("No se pudo conectar, mostrando error de MySql: " . mysqli_connect_error());
}else{
    $sqlTodas ="";
    $update = $_POST['data'];
   
    for ($i = 0; $i<count($update); $i++) {
        
        $idUsuario = $update[$i]['idUsuario'];
        $titulo =  $update[$i]['titulo'];
        $fechaInicio = $update[$i]['fechaInicio'];
        $fechaFin =  $update[$i]['fechaFin'];
        $Opcion1 =  $update[$i]['Opcion1'];
        $Opcion2 =  $update[$i]['Opcion2'];
        $Opcion3 =  $update[$i]['Opcion3'];    
        $Opcion4 =  $update[$i]['Opcion4'];
     
     
       
        
    };
  
/*
    $sqlTodas =" UPDATE subscripciones SET activa = 1  WHERE  subscriptor = 4 and siguiendoA = 5;
    UPDATE subscripciones SET activa = 1  WHERE  subscriptor = 4 and siguiendoA = 7; 
    UPDATE subscripciones SET activa = 1  WHERE  subscriptor = 4 and siguiendoA = 1; ";  
    
    */ 
    if ($conn->multi_query($sqlTodas) === TRUE) {
        echo json_encode("New records created successfully");
    } else {
        echo json_encode("Error");
    };

    $conn->close(); //     
    
};
