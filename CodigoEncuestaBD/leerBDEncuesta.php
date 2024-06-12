
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
/*  $update = array (
        "id"=>3,
        "idUsuario"=> "", 
        "titulo"=> "",
        "fechaInicio"=> "",
        "fechaFin"=> "",
        "opciones" =>   array ( ),
                ); */

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

    
    $update ['opciones'] =[]; // select opciones
    $sql ="SELECT idOpcion, texto  FROM opciones as o WHERE o.idEncuesta = $id;"; 
    $result = $conn->query($sql);
//    print_r ($result);
    while($row = $result->fetch_assoc()) {
//        print_r ($row);
        $idOpcion = $row ['idOpcion'];
        $sql ="SELECT SUM(r.idEncuesta = $id and r.idOpcion= $idOpcion) FROM respuestas as r;" ;
//        echo ($sql); 
        $result1 = $conn->query($sql);
        
        $row1 = mysqli_fetch_row($result1);
        $sum = $row1[0];
//        echo ($sum);
        $row += array('votos'=>$sum);
        $update['opciones'][] = $row; 
    };
};

    $encuesta=array('data'=>$update);
    $conn->close(); 

    echo json_encode($encuesta);
?>

     
