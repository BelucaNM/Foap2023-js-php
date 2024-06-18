<html>
<head>
        <title> deleteFile.php Funcion Delete</title>
        <meta charset="utf-8" >
<head>
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

    if (isset($_GET['doc'])){ $theFile = $_GET['doc'];}

    if (isset($_POST['submit']) && isset($_POST ['name'])) {
        
                      
            if (unlink($theFile)) {
                echo " file $theFile borrado! <br>";
            }
            else {
                $error = error_get_last();
                echo "Error al borrar el archivo: " . $error['message']; 
            }
        header ("location:verFiles.php");
       
    }
?> 
<form action="" method="post" enctype= "multipart/form-data">
    <label> Nombre del fichero: </label>
    <input type = "text" name= "name" readonly maxlength= 60  size= 70 value=<?=$theFile?>> <br>
    <input type="submit" name="submit" value="Confirme para BORRAR">
</form>
            
</html>