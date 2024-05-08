<html>

    <head>
    <title> VerFotos.php </title>
    <meta charset="utf-8" >
    <?php

    if (isset($_POST['submit'])){ 

        print_r ($_POST);

        $nombreDirectorio= $_POST['dir'];
        $dirRaiz = "C:\\xampp\\htdocs\\Foap2023-php\\verFotos\\";
//        echo ("<br />".$nombreDirectorio );

        $isDirectorio = opendir($nombreDirectorio);

        if (!$isDirectorio) {  // mira si el directorio existe
            echo ("<br /> No se ha podido encontrar  el directorio".$_POST['dir']."\n");
        }else{
            
            if (!isset($_POST['fichero'])|| (($_POST['fichero']) =="")) { // solo lista ficheros en el directorio
             while ($elemento = readdir($isDirectorio)) {    // Leo todos los ficheros de la carpeta    
                if(( $elemento != ".") && ($elemento != "..")){ 

                    $info = pathinfo($elemento);
                    echo "<br />";
                    print_r ($info);
                    
                    $name = $info['basename'];
                    $extension = "";
                    If (isset ($info['extension'])) {$extension =  $info['extension'];}
                   
                    $size = filesize($dirRaiz.$nombreDirectorio."\\".$elemento) ;      
                    $lastDate = date("Y-m-d", filemtime($dirRaiz.$nombreDirectorio."\\".$elemento));

                    if (is_dir($nombreDirectorio."\\".$elemento))
                    {   // Si es una carpeta                  
                        echo "<p><strong>CARPETA: ". $elemento."</strong></p>";   
                    } else {           // Si es un fichero  
                        echo "<br />". $elemento. " Size ". $size. " Fecha ". $lastDate. "</p>";      // Muestro el fichero  
                    };
                  
                    
                }; 

                };
       
            } else {
                $nombreFichero= $_POST['fichero'];
                echo ($nombreFichero );
                $path = $nombreDirectorio."/".$nombreFichero.".txt";
                echo ($path);
                 if (file_exists ($path)) {
                        $gestor = fopen($path, 'r');
                        while (($line = fgets($gestor)) !== false) {
                        echo $line."<BR>";
                        }
                        fclose($gestor);
                 } else { echo ("<br /> el fichero".$path. " no existe");} 
            };
        };
    };

    ?>

    </head>
   
    <body>
        <form action="" method="post" enctype= "multipart/form-data">
        <label> Nombre del Directorio </label>
        <input type="text" name="dir" id="dir">
        <label> Nombre del fichero a leer  </label>
        <input type="text" name="fichero" id="fichero">
        <input type="submit" name="submit" VALUE="aceptar">
        </form>

       
    
    </body>

</html>

                 
