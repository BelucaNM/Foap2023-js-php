
<?php 

$provincias = array(
    array("id" => 1, "name" => "Barcelona"),
    array("id" => 2, "name" => "Tarragona"),
    array("id" => 3, "name" => "LLeide"),
    array("id" => 4, "name" => "Girona")

);
header('Content-Type: application/json');

var_dump(
    $provincias,
    json_encode($provincias));
?>