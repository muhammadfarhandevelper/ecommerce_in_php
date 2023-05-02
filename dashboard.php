<?php

session_start();

if(!isset($_SESSION['email'])){

    header("Location: login.php");

}

if($_SESSION['role'] == 0){

    header("Location: index.php");
}   

?>

<?php include('sidebar.php') ?>




<?php include('footer.php') ?>






