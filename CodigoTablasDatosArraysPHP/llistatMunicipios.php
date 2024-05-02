
<?php

// Simulación de una base de datos de productos
$municipios = array(
    array("id" => 1, "name" => "Sitges","provincia"=>"Barcelona"),
    array("id" => 2, "name" => "Vilafranca","provincia"=>"Barcelona"),
    array("id" => 3, "name" => "Barcelona","provincia"=>"Barcelona"),
    array("id" => 4, "name" => "Olivella","provincia"=>"Barcelona"),
    array("id" => 5, "name" => "SantPereDeRibes","provincia"=>"Barcelona")
);

header('Content-Type: application/json');

echo json_encode($municipios);
?>