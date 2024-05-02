<html>

<head>
    <meta charset="UTF-8">

</head>

<body>
    <?php


    if (isset($_POST['submit'])) {

        print_r($_POST);
        echo "<br>";
        print_r($_FILES);
        echo "<br>";

        $uploadOk = false;

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {

            $uploadOk = true;
         // chequea un formato válido
            $targetDirectorio = "./".$_POST['album'];
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
                    echo " no se ha podido crear el Album";
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
                    echo "<h3> Hola " . $targetImage . " </h3>";
                    echo "<p> <a href='" . $targetImage . "' target= '_blank'>Abrir fichero</a></p>";
                    echo "<p> <a href='downloadFile.php?file=" . $targetImage . "'>Descargar fichero</a></p>";
                
            };
            
             
        }else{
            echo ("No se ha podido subir el archivo" . $_FILES['imagen']['error'] . "\n");
        };
    };

    ?>

    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <label> Subir al Album </label>
            <input type="text" name="album" id="album" placeholder="introducir el nombre del album destino"> <br>
            <input type="file" name="imagen" id="imagen" placeholder="introducir el nombre de la imagen">
            <input type="hidden" name"MAX_FILE_SIZE" value="102400">
            <input type="submit" name="submit" VALUE="aceptar">
        </form>
    </div>
</body>

</html>