<html>

    <head>
        <title> MySQLPruebas loginForm.php </title>
        <meta charset="utf-8" >
        <meta description="Basecon favicon">
        <link rel="shortcut icon" href=".\imgCodigo\favicon.png">
<!-- > <link rel="canonical" href="https://multitod.com/iconos-para-paginas-web-codigo-php.php" /> 
        <link rel="stylesheet" type="text/css" href="estilo.css" title="style" /><-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="funciones.js"></script>  
    </head>

    <body>
    <?php
        $title ="Login en PHOTOS";
        include_once "funciones.php";
        $user = $pwd = $sql = $error= $result = $checked= "";

    
        if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST['signIn'])) { // verificar entrada por formulario
    
            if (empty($_POST["user"]) || empty($_POST["pwd"])) {
                $error= "Introduzca Usuario y Password";
            } else {
                $username = validate_input ($_POST['user']);
                $password = validate_input ($_POST['pwd']);

                $id = existe_User ($username, $password) ;
                if (!is_null($id)) { // credenciales  correctas  , abre session y cookies
                    session_start([
                        'use_only_cookies'=> 1,
                        'cookie_lifetime'=> 0,
                        'cookie_secure'=> 1,
                        'cookie_httponly'=> 1
                    ]);
                    $_SESSION["idUsuario"] = $id;
                    $_SESSION["usuario"] = $_POST["user"]; // inicia session
                    $cookie_name ="remember_me[0]";
                        $cookie_value =$username;
                        $cookie_expiry_time = time() + (24*3600); // un dia
                        setcookie($cookie_name,$cookie_value,$cookie_expiry_time,"/","",true,true);

                    header("Location:photos.php"); 
                } else {
                    
                    $error = 'Error en validación. Reintroduzca datos'; // credenciales no correctas
                    unset($_POST["signIn"]);
                    if (isset($_POST["user"])) {$user = $username;};
                    if (isset($_POST["pwd"]))  {$pwd = $password;};
                    if (isset($_POST["recordar"]))  {$checked = 1;};
                    };
                }
            };
                     

        if (isset($_GET['nuevoRegistro'])){ //vengo desde formRegistro 
            $error = "Por favor introduzca credenciales para acceso.";
        };
        ?>


</head>
<body>

    
<?php include ("header.php");?> 
    <div class="row">
    <div class="col"></div>
    <div class="col">
    <div  id="login" class = " container pt-3 pb-3 mt-3 bg-light shadow-lg">
            <form method="post">
            <span><?=$error;?></span>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control"  id= "user" name="user" value= "<?=$user;?>" placeholder="Introduzca usuario"> 
                <label for ="user">Usuario</label> 
            </div> 
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" style="margin-top:5px!important" id="pwd" name="pwd" value= "<?=$pwd;?>"placeholder="Introduzca password" >   
                <label for = "pwd">Password</label>
            </div> 
            <div class="form-check mb-3">
                <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="recordar" value="Si" <?php if ($checked) echo "checked"; ?>>Seleccione para recordar 
                </label>
            </div>    
            
            <div>
                <input class="btn btn-primary" type="submit" name="signIn" value="Sign In">
            </div>    
            
            <!-- > value es el txt que muestra el boton. Es "Enviar" por defecto. 
            El indice en el POST es el name <-->
            </form>
    </div>
    <div class = "container mt-3 bg-light shadow-lg">
        <a class = "btn btn-lg btn-link"  href = "formRegistro.php" name="signUp" value="Sign Up">Sign Up</a> 
    </div>
    </div>
    
    <div class="col"></div>
</div>
  
<?php include ("footer.php");?>  

</body>
</html>           