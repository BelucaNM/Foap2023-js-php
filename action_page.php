
<?php

function validate_input($input){ // sanear datos
    $input = trim ($input);
    $input = htmlspecialchars ($input);
    $input = stripslashes ($input);
    return $input;

}


if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['submit'])) { // verificar entrada por formulario

    $username = validate_input ($_POST['uname']);
    $password = validate_input ($_POST['pwd']);

    $passwordcodif = $password;
    echo $username;
    echo $passwordcodif;

    if ($username == 'belu' &&  $passwordcodif = 'belu'){  // poner un user/pswcodigf conocido
        session_start([
            'use_only_cookies'=> 1,
            'cookie_lifetime'=> 0,
            'cookie_secure'=> 1,
            'cookie_httponly'=> 1
        ]);

        $_SESSION['user_id'] = 1;

        if (isset($_POST['remember'])) { // crear una cookie para recordar el usuario

            $cookie_name ="remember_me";
            $cookie_value =1;
            $cookie_expiry_time = time() + (24*3600); // un dia
            setcookie($cookie_name,$cookie_value,$cookie_expiry_time,"/","",true,true);
            
        }
        header ("location:home.php");

    
    }else{ // credenciales no correctas
        header ("location:formularioBSCookies.php?err=1 ");


    };
};
?>