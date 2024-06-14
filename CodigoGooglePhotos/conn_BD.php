<?php 
// arranca conexion a BD
            $servername = "localhost";
            $adminuser = "root";
            $adminpwd = "";
            $dbname = "foap2023photos";
            $error = false;

        // Create connection
            $conn = new mysqli($servername, $adminuser, $adminpwd, $dbname);
            
        // Check connection
            if ($conn->connect_error) { 
                die("Connection failed: No se puede acceder a la Xarxa". $conn->connect_error);
            };
?> 