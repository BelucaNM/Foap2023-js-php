
<?php

// Simulación de una base de datos de productos
$municipios = array(
    array("id" => 1, "name" => "Sitges","provincia"=>"Barcelona"),
    array("id" => 2, "name" => "Vilafranca","provincia"=>"Barcelona"),
    array("id" => 3, "name" => "Barcelona","provincia"=>"Barcelona"),
    array("id" => 4, "name" => "Olivella","provincia"=>"Barcelona"),
    array("id" => 5, "name" => "SantPereDeRibes","provincia"=>"Barcelona"),
    array("id" => 6, "name" => "Agullana","provincia"=>"Girona"),
    array("id" => 7, "name" => "Aiguaviva","provincia"=>"Girona"),
    array("id" => 8, "name" => "Alp","provincia"=>"Girona"),
    array("id" => 9, "name" => "Amer","provincia"=>"Girona"),
    array("id" => 10, "name" => "Arbucias","provincia"=>"Girona"),
    array("id" => 11, "name" => "Argelaguer","provincia"=>"Girona"),
    array("id" => 12, "name" => "Tavascan","provincia"=>"LLeida"),
    array("id" => 13, "name" => "Balaguer","provincia"=>"LLeida"),
    array("id" => 14, "name" => "Algerri","provincia"=>"LLeida"),
    array("id" => 15, "name" => "Altafulla","provincia"=>"Tarragona"),
    array("id" => 16, "name" => "La Canonja","provincia"=>"Tarragona"),
    array("id" => 17, "name" => "El Catllar","provincia"=>"Tarragona"),
    array("id" => 18, "name" => "Constantí","provincia"=>"Tarragona"),
);

header('Content-Type: application/json');

echo json_encode($municipios);
