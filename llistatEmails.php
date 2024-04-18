
<?php 
$emails = array(
    array("id" => 1, "email"=>"isabel@gmail.com","DNI" => "33246334H"),
    array("id" => 2, "email"=>"toni@gmail.com","DNI" => "32100100Z"),
    array("id" => 3, "email"=>"ikram@gmail.com","DNI" => "32100101L"),
    array("id" => 4, "email"=>"juan@gmail.com","DNI" => "22333555Z")

);
header('Content-Type: application/json');
echo json_encode($emails);
?>