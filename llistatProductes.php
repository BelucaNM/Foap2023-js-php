<?php 
$products = array(
    array("id" => 1, "name" => "Cireres", "category" => "fruites", "price" => 16),
    array("id" => 2, "name" => "Atmelles", "category" => "fruites", "price" => 23),
    array("id" => 3, "name" => "Castanyes", "category" => "fruites", "price" => 32),
    array("id" => 4, "name" => "Platans", "category" => "fruites", "price" => 46),
    array("id" => 5, "name" => "Pomelos", "category" => "fruites", "price" => 55)
);
?>
<table border="1">
<?php
$producte = null;
foreach ($products as $product) {
    ?>
<tr><td><?=$product['name']?></td><td><?=$product['category']?></td><td><?=$product['price']?></td></tr>

<?php

}




?>

</table>