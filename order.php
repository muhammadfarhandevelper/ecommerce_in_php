
<?php

session_start();
    
if(!isset($_SESSION['email'])){

    header("Location: login.php");

}

?>

<h1>Order Page </h1>