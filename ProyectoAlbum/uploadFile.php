<html>

<head>
    <meta charset="UTF-8">

</head>

<body>
    <?php


    if (isset($_POST['submit'])) {

        print_r($_POST);
        print_r($_FILES);

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            //si se ha subido el fichero….
            // mueve fichero temporal al destino definitivo
             $nombreDirectorio = $_POST['album'];

            // mira si el directorio existe; si no existe lo crea
            $isDirectorio = true;

            if (!file_exists($nombreDirectorio)) {
                $isDirectorio = mkdir($nombreDirectorio, 777); // 777 son autorizaciones
            }
    
            if (!$isDirectorio) {
                echo " no se ha podido crear la carpeta";
            } else {

                $idUnico = time();
                $nombreFichero = $idUnico . "-" . $_FILES['imagen']['name'];
                $path = $nombreDirectorio ."/". $nombreFichero;

                $result = move_uploaded_file(
                    $_FILES['imagen']['tmp_name'],
                    $path); // move devuelve true/false ... hay que ver si se ha creado

                if ($result) {
                    echo " se ha movido el fichero a sus directorio definitivo: ".$path;

                    // crea un link en la pagina
                    echo "<h3> Hola " . $nombreFichero . " </h3>";
                    echo "<p> <a href='" . $path . "' target= '_blank'>Abrir fichero</a></p>";
                    echo "<p> <a href='downloadFile.php?file=" . $path . "'>Descargar fichero</a></p>";
                } else {
                    echo "Ha habido un error al subir el fichero al directorio definitivo";
                }

            }

        } else {
            echo ("No se ha podido subir el archivo" . $_FILES['imagen']['error'] . "\n");
        }
        ;
    }
    ;
    ?>

    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <label> Subir al Album </label>
            <input type="text" name="album" id="album" placeholder="introducir el nombre del album"> <br>
            <input type="file" name="imagen" id="imagen">
            <input type="hidden" name"MAX_FILE_SIZE" value="102400">
            <input type="submit" name="submit" VALUE="aceptar">
        </form>
    </div>
</body>

</html>