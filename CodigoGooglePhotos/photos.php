<html>
<head>
    <title> PHOTOS </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href=".\imgCodigo\favicon.png">
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="funciones.js"></script> 
    <link rel="stylesheet" type="text/css" href="estilo.css" title="style" /> 
    <style>
        .card-body p {
            font-size :13px !important ;
            line-height: 13px !important;

        }
    </style>
</head>
<body>

    <?php
    session_start();
  
    if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
        $usuario =$_SESSION["usuario"];
        $idUsuario =$_SESSION["idUsuario"]; 

    } else {
        echo "La sesión no esta abierta o no tengo todavia ningun resultado"  ;
        header ("location:formLogin.php ");
    };

    $title ="Bienvenido a la GALERIA";
    include ("header.php");
    include "funciones.php";
    $usuarios = [$idUsuario];
   
    $photos = obtener_photos($usuarios); // se busca mensajes del user y de sus subscriptores
    
    ?>
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <div  id="PHOTOS" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <p name=" usuario"><strong>HOLA <?=$usuario;?> !</strong></p>
    <div class = "btn-group btn-group-sm">        
        <a type="button" class="btn btn-dark" href="logOut.php">Log Out</a>
        <a type="button" class="btn btn-light" href="verEnMapa.html">Ver en el Mapa</a>
        <a type="button" class="btn btn-light" href='uploadImage.php' >Subir photo</a>
    </div>
    <div class = "btn-group btn-group-sm">
    </div>
    </div>
    </div>
    <div class="col-3"></div>
    </div>
    <div  id="soyPhoto" class = "grid-container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <?php  
    
    if ($photos->num_rows > 0) {
        // output data of each row
            while($row = $photos->fetch_assoc()) {
//              print_r($row)
                               
    ?>
                
            <div class="grid-item bg-light text-start"> 
            
            <h5 class = "card-title"><?= $row["nombre"]; ?></h5>
            <img class="card-img-top" src="<?=$row['url'];?>" alt="<?=$row['nombre'];?>"/>
            <div class="card-body"> 
                        <a type="button" class="card-link" href="verCarousel.html?id=<?= $row["id"];?>">Carousel</a>
                        <br><br>
                        <p class  = "card-text" >Cortesia de: <?= $row["username"]; ?></p> 
                        <p class  = "card-text" >Fecha Registro: <?= $row["fechaRegistroBD"]; ?></p> 
                        <p class  = "card-text" >Fecha Fotografía: <?= $row["fechaFotografia"]; ?></p> 
            
            
            
<?php
if ($row["longitude"] != null){
?>
    
                        <p class  = "card-text" font-size ="13px" !important  >Ubicación:[<?= $row['latitude' ];?>,<?= $row['longitude' ];?>]</p> 
<?php
} else {
    ?>
    
                        <p class  = "card-text" font-size ="13px" !important >Ubicación: No consta </p> 
<?php


};
?>
            </div>
            </div>
                
    <?php
            };
        };
    
    ?>
    </div>
    
    <?php include ("footer.php"); ?>
</body>
</html>