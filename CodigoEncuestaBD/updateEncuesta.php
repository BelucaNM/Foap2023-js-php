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
    echo json_encode("Start Transaction") ;
    $sqlTodas ="START TRANSACTION;";
//    $update = $_POST['data'];

$update = array (0 => array(
    'idUsuario' => 4,
    'titulo'  =>"Cual es tu personaje favorito de los Simpson?",
    'fechaInicio'=>"",
    'fechaFin'=>"",
    'opciones'=> ["Homer", "Lisa", "Marge", "NO se mas",]));
   
    for ($i = 0; $i<count($update); $i++) {
        
        $idUsuario = $update[$i]['idUsuario'];
        $titulo =  $update[$i]['titulo'];
        $fechaInicio = $update[$i]['fechaInicio'];
        $fechaFin =  $update[$i]['fechaFin'];

/*        $sql= " 
            INSERT INTO encuestas (id, titulo, idUsuario, fechaInicio, fechaFinal) 
                VALUES ('', $titulo, $idUsuario, $fechaInicio, $fechaFin);
            @A:= SELECT LAST_INSERT_ID();";
        
            $sqlTodas .= $sql; */


            $sql= " 
            INSERT INTO encuestas (id, titulo, idUsuario, fechaInicio, fechaFinal) 
                VALUES ('', 'Cual es tu personaje favorito de los Simpson?', '4', 
                        '2024-06-10 22:41:23.000000', '2024-06-12 22:41:23.000000');
            @A:= SELECT LAST_INSERT_ID();";
            $sqlTodas .= $sql;


            for ($j = 0; $j<count($update[$i]['opciones']); $j++) {
            /*  $sql= " INSERT INTO opciones (id, idEncuesta,idOpcion,texto) 
                        VALUES ('',@A,$j,$update[$i]['opciones'][$j]);";
                $sqlTodas .= $sql ;*/
                };
            
    };
          echo ($sqlTodas) ;     

/* genera $sql y las envadena*/
        
    $sql = "
    INSERT INTO opciones (id, idEncuesta,idOpcion,texto) VALUES ('',@A,0,'Homer'); 
    INSERT INTO opciones (id, idEncuesta,idOpcion,texto) VALUES ('',@A,1,'Lisa); 
    INSERT INTO opciones (id, idEncuesta,idOpcion,texto) VALUES ('',@A,2,'Marge'); 
    INSERT INTO opciones (id, idEncuesta,idOpcion,texto) VALUES ('',@A,3,'yoQueSe');
    COMMIT;";
    $sqlTodas .= $sql ;
    echo json_encode($sqlTodas) ;

    if ($conn->multi_query($sql) === TRUE) {
        echo json_encode("New records created successfully");
    } else {
        echo json_encode("Error");
    };

    $conn->close(); //     
    
};
