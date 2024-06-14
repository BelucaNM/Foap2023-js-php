<html>
<head>
    <title> PHOTOS </title>
    <meta charset="utf-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href=".\imgCodigo\favicon.png">
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="funciones.js"></script> 
<!-- >    <link rel="stylesheet" type="text/css" href="estilo.css" title="style" /> <-->
        
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

    $title ="Bienvenido a PHOTOS";
    include ("header.php");
    include ("funciones.php");
    
    $photos = obtener_photos($idUsuario); // busca mensajes del user y de sus subscriptores

    ?>
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6">

    <div  id="PHOTOS" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
    <p name=" usuario"><strong>HOLA <?=$usuario;?> !</strong></p>
    <div class = "btn-group btn-group-sm">        
        <a type="button" class="btn btn-dark" href="logOut.php">Log Out</a>
        <a type="button" class="btn btn-light" href='uploadImage.php' >Subir mensajes</a>
    </div>
    <div class = "btn-group btn-group-sm">
    </div>
    </div>

    
    <?php  
    
    if ($photos->num_rows > 0) {
        // output data of each row
            while($row = $photos->fetch_assoc()) {
                
    ?>
               <div  id="soyPhoto" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
                <div class="card-header"></div>
                <div class="card-body bg-light">
                    <img class="card-img-top" src="<?= $row["propietario"];?>" alt="<?= $row["imagenURL"];?>">
                    <h4 class = "card-title"><?= $row["nombre"]; ?></h4>
                    <p class  = "card-text"><?= $row["url"]; ?></p> 
                    <p class  = "card-text"><?= $row["fechaRegistro"]; ?></p> 
                    <p class  = "card-text"><?= $row["fechaFotografia"]; ?></p> 
                    <p class  = "card-text"><?= $row["ubicacion"];?></p>                        
                </div>
                <div class="card-footer"></div>
                </div>
    <?php
            };
        };
    
    ?>
    </div>
    </div>
    <div class="col-3"></div>
    </div>
    <?php include ("footer.php"); ?>
</body>
</html>