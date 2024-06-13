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
    $idUsuario = $update[0]['idUsuario'];
    $idEncuesta = $update[0]['idEncuesta'];
    $idOpcion =  $update[0]['idOpcion'];
    $fechaVoto = $update[0]['fechaVoto'];

    $stmt->bind_param("ssss", $idUsuario, $idEncuesta, $idOpcion, $fechaVoto);
    try{
        if ($stmt->execute())
        {
            $messageObj['message'] =  "New records created successfully"; 
          
        }
       
    }catch (mysqli_sql_exception $e) {

        $messageObj['message'] =  "Error"; 
        if ($e->getCode() == 1062)
        {

        $messageObj['message'] =  "Registro duplicado"; 
        
        }

    } finally {
        $conn->close(); 
        echo json_encode($messageObj);
    };
    
        
};
