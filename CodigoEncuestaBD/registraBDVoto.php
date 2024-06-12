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

/*   $update = array (
        "idUsuario"=> 1,
        "idEncuesta"=> 10,
        "idOpcion"=> 0 ,
        "fechaVoto"=>"" ); */
    
    $update = $_POST['data'];
    
   // prepara el sql para las encuestas
    $stmt = $conn->prepare("INSERT INTO respuestas(idVotante,idEncuesta, idOpcion, fechaVoto) VALUES (?, ?, ?, ?);");
    
    $id = "";
    $idUsuario = $update['idUsuario'];
    $idEncuesta = $update['idEncuesta'];
    $idOpcion =  $update['idOpcion'];
    $fechaVoto = $update['fechaVoto'];

    $stmt->bind_param("ssss", $idUsuario, $idEncuesta, $idOpcion, $fechaVoto);
    $stmt->execute();

        
    $result = $conn->query("COMMIT;");
    if ($result === TRUE) {
        $messageObj['message'] =  "New records created successfully"; 
    } else {
        $messageObj['message'] =  "Error"; 
    };
    $conn->close();       
    echo json_encode($messageObj);
        
};
