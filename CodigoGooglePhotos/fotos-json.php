
<?php
session_start();
require "funciones.php";

//print_r($_SESSION);

 if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
    $usuario =$_SESSION["usuario"];
    $idUsuario =$_SESSION["idUsuario"]; 
    $usuarios = [$idUsuario];



//    print_r($usuarios);
    
    $photos = obtener_photos($usuarios); // se busca mensajes del user y de sus subscriptores
    $fotos = [];
    while ($row = $photos->fetch_assoc()) {
        $row['ubicacion']="";
        $fotos[] = $row;};

//    print_r($fotos);

    header('Content-Type: application/json');
    echo json_encode($fotos);
    
} else {
    echo null;
};
?>