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
    
    $update = $_POST['data'];
    
   // prepara el sql para las encuestas
    $stmt = $conn->prepare("INSERT INTO encuestas (id, titulo, idUsuario, fechaInicio, fechaFin) VALUES (?, ?, ?, ?, ?);");
    for ($i = 0; $i<count($update); $i++) { // solo hay una

        $conn->query("START TRANSACTION;");

        $id = "";
        $idUsuario =    $update[$i]['idUsuario'];
        $titulo =       $update[$i]['titulo'];
        $fechaInicio =  $update[$i]['fechaInicio'];
        $fechaFin =     $update[$i]['fechaFin'];

        $stmt->bind_param("sssss",$id, $titulo, $idUsuario, $fechaInicio, $fechaFin);
        $stmt->execute();

        
        
        $idEncuesta = $conn->insert_id;
        $stmtOpc = $conn->prepare("INSERT INTO opciones (id,idEncuesta,idOpcion,texto) 
                                    VALUES  (?, ?, ?, ?);");
        $id ="";
        
        
        for ($j = 0; $j<count($update[$i]['opciones']); $j++) {
            
            $texto = $update[$i]['opciones'][$j];   
            
            $stmtOpc->bind_param("ssss",$id,$idEncuesta,$j,$texto);
            $stmtOpc->execute();   
            
            };
               
        $result = $conn->query("COMMIT;");
        
    
        if ($result === TRUE) {
            $messageObj['message'] =  "New records created successfully";       
            echo json_encode($messageObj);
        } else {
            $messageObj['message'] =  "Error"; 
            echo json_encode($messageObj);
        };
    };

    $conn->close();      
    
};
