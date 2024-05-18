
<?php 
$provincias = array(
    array("id" => 1, "name" => "Barcelona"),
    array("id" => 2, "name" => "Tarragona"),
    array("id" => 3, "name" => "LLeida"),
    array("id" => 4, "name" => "Girona")
);
header('Content-Type: application/json');

echo json_encode($provincias);
?>