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

/*    $leer = $_POST['data'];
    $id = $leer['id'];*/

    $id = 1;
    
    $sql ="SELECT e.titulo, e.idUsuario, e.fechaInicio, e.fechaFin, o.idOpcion, o.texto FROM encuestas as e
                JOIN
                opciones as o ON e.id = o.idEncuesta 
                WHERE e.id = '$id';";
    print ($sql);

    $result = $conn->query($sql);
    $conn->close(); 
    echo json_encode($result);
    
};

     
