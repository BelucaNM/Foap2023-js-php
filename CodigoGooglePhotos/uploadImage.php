<html>
<head>
    <title> Upload Image </title>
    <meta charset="UTF-8">
    <meta description="Basecon favicon">
    <link rel="shortcut icon" href=".\imgCodigo\favicon.png">
    <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="funciones.js"></script> 

</head>

<body>
   <?php
   session_start();
   $title ="UploadImage a PHOTOS";
   include ("header.php");
   include_once "funciones.php";

   
  
    if (isset($_SESSION["usuario"])) { // Identificación Correcta . En XarxaPrivada
        $usuario =$_SESSION["usuario"];
        $idUsuario =$_SESSION["idUsuario"]; 

    } else {
        echo "La sesión no esta abierta o no tengo todavia ningun resultado"  ;
        header ("location:formLogin.php ");
    };

    if (isset($_POST['submit'])) {

        print_r($_POST);
        echo "<br>";
        print_r($_FILES);
        echo "<br>";

        $uploadOk = false;

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {

            $uploadOk = true;
         // chequea un formato válido
            $targetDirectorio = "./imgApp";
            echo ($targetDirectorio);
            $targetFile = basename($_FILES["imagen"]["name"]);
            

            if(getimagesize($_FILES["imagen"]["tmp_name"]) === false) { 
                echo ("El archivo no es una imagen \n");
                $uploadOk = false ;
            };

            
            if ($uploadOk ){
                // chequea el formato de la imagen
                $fileType = strtolower(pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION));
                $arrayImageTypes = ["jpg","png","jpeg","gif"];
                
                if(!in_array($fileType,$arrayImageTypes)) {
                    echo "Solo se aceptan formatos JPG, JPEG, PNG y GIF files.";
                    $uploadOk = false;
                };
            };
                    
            if ($uploadOk ){
                // mira si el directorio existe; si no existe lo crea
                $isDirectorio = true;
                if (!file_exists($targetDirectorio)) {
                    $isDirectorio = mkdir($targetDirectorio, 0777,true); // 777 son autorizaciones
                };
                if (!$isDirectorio) {
                    echo " no se ha podido crear el directorio";
                    $uploadOk = false;
                };
            };

            if ($uploadOk ){
                // Check if file already exists

                $targetImage = $targetDirectorio ."/". $_FILES['imagen']['name'];
                if (file_exists($targetImage)) {
                    echo "Este fichero ya existe.";
                    $uploadOk = false;
                };
            };

            if ($uploadOk ){
                $uploadOK = move_uploaded_file(
                    $_FILES['imagen']['tmp_name'],
                    $targetImage); // move devuelve true/false ... hay que ver si se ha creado
            };


            if ($uploadOk) {
                    echo " se ha movido el fichero a sus directorio definitivo: ".$targetImage;
                    

                    // crea un link en la pagina
                    echo "<h3>". $targetImage ."</h3>";
                    echo "<p> <a href='" . $targetImage . "' target= '_blank'>Abrir fichero</a></p>";
                    echo "<p> <a href='downloadFile.php?file=" . $targetImage . "'>Descargar fichero</a></p>";
                    
                    $uploadOk = alta_photo( $idUsuario,
                                            $_POST['nombre'],
                                            $_POST['album'],
                                            $targetImage);

                    if ($uploadOk) {
                        echo " se ha dado de alta la imagen: ".$targetImage;};
           
                };
            
             
        }else{
            echo ("No se ha podido subir el archivo" . $_FILES['imagen']['error'] . "\n");
        };
    };

    ?>
    <div class="row">
    <div class="col-3"></div>
    <div class="col-6">
    <
    <div  id="subirImagen" class = "container pt-3 pb-3 mt-3 bg-light shadow-lg">
        <div class = "btn-group btn-group-sm"> 
            <a type="button" class="btn btn-dark" href="logOut.php">Log Out</a>
            <a type="button" class="btn btn-light" href="photos.php">Galeria de Photos</a>
        </div>
        <br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="idAlbum" class="form-check-label"> Subir al Album : </label> <br>
            <input type="text" class="form-control" name="album"  id="idAlbum"  maxlength= "50" placeholder="Nombre para el album "> <br>
            <input type="text" class="form-control" name="nombre" id="idNombre" maxlength= "50" placeholder="Nombre para la foto"> <br>
            <br><br>
            <label for="idImagen" class="form-check-label"> Introducir el nombre de la imagen : </label> <br>
            <input type="file" class="form-control" name="imagen" id="idImagen" maxlength = "100" >
            <input type="hidden" name="MAX_FILE_SIZE" value="102400">
            <input type="submit" class="btn btn-light text-dark" name="submit" VALUE="Aceptar">
        </form>
    </div>
    </div>
    <div class="col-3"></div>
    </div>

<?php include ("footer.php");?> 
</body>
</html>