
<?php
require "funciones.php";
  
   
    $usuarios = [6];
    $photos = obtener_photos($usuarios); // se busca mensajes del user y de sus subscriptores
    $fotos = [];
    while ($row = $photos->fetch_assoc()) {
    //    print_r( $row);
        $row['ubicacion']="";
        $fotos[] = $row;};
    //print_r($fotos);
    var_dump($fotos);
    header('Content-Type: application/json');

    $A= json_encode($fotos);
    echo $A;
    echo json_last_error(); 
    

?>