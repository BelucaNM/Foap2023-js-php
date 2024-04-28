
<?php 

// include ("checkSession.php");

session_start();
if (isset($_SESSION['user_id'])) {
    echo "Identificación Correcta . En Home"; 
} else {
    header ("location:formularioBSCookies.php?err=2 ");
}
?>

