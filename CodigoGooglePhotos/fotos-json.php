<?php
 if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
    $usuario =$_SESSION["usuario"];
    $idUsuario =$_SESSION["idUsuario"]; 

    include "funciones.php";
    $usuarios = [$idUsuario];

    $photos = obtener_photos($usuarios); // se busca mensajes del user y de sus subscriptores
    $fotos = [];
    while ($row = $photos->fetch_assoc()) {
        $fotos[] = $row;};

    header('Content-Type: application/json');
    echo json_encode($fotos);
} else {
    echo null;
};
?>