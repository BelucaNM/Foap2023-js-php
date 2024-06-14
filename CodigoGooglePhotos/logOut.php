
<?php

    session_start();

    if (isset($_SESSION["usuario"])) { // Identificación Correcta 
 
        $user =$_SESSION["usuario"]; 
        echo  "Adios ". $user;
        

        echo " voy a destruir todas las variables de sesión.";
    
        print_r ($_SESSION);

        if (isset($_COOKIE['remember_me'])) {
            foreach ($_COOKIE['remember_me'] as $name => $value) {
                $name = htmlspecialchars($name);
                $value = htmlspecialchars($value);
                echo "$name : $value <br />\n";
            }
        }
        // Borra las cookies estableciendo  la fecha de expiración a una hora atrás
        setcookie("remember_me[0]", "", time() - (24*3600));// un dia
  
/*        
        $cookie_name ="remember_me[0]";
        // $cookie_value =0;
        $cookie_expiry_time = time() - (24*3600); 
        setcookie($cookie_name,0,$cookie_expiry_time,"/","",true,true);
                        
*/
// Se borra también la cookie de sesión.


        if (ini_get("session.use_only_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,$params["path"], $params["domain"],$params["secure"], $params["httponly"]
                );
        };

// Finalmente, destruir la sesión.

       
        $resultado = session_destroy();
        if ($resultado ) {echo "La sesión ha sido cerrada "  ;}

        } else {

            echo "La sesión no estaba abierta "  ;
            
    };
    header ("location:index.php ");
?>           