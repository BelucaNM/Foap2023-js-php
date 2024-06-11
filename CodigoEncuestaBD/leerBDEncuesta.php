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
    
    $update = $_POST['data'][0];

    $id = $update['id'];
    // datos encuesta
    $sql ="SELECT idUsuario, titulo, fechaInicio, fechaFin  FROM encuestas as e WHERE e.id = $id;"; 
    $result = $conn->query($sql);
    $datos = $result->fetch_assoc();
    $update['titulo'] = $datos['titulo'];
    $update['idUsuario'] = $datos['idUsuario'];
    $update['fechaInicio']= $datos['fechaInicio']; 
    $update['fechaFin'] = $datos['fechaFin'];
    $update['opciones'] = [];

    // select opciones
    $update ['opciones'] =[];
    $sql ="SELECT idOpcion, texto  FROM opciones as o WHERE e.idEncuesta = $id;"; 
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $update['opciones'][] = $row;};

    $encuesta=array('data'=>$update);
        
    $conn->close(); 
    echo json_encode($encuesta);
    
};

     
