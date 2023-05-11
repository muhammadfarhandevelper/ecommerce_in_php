<?php

session_start();


if(isset($_SESSION['cart'])){

    $cart = $_SESSION['cart'];


}


if(isset($_POST['quantity'])){

    $i = 0;

    foreach($cart as $item => $val){

     $cart[$item]['quantity'] = $_POST['quantity'][$i];

        $i++;
    }

    $_SESSION['cart'] = $cart;

    header("location: sess.php");
    
    
}

header("location: sess.php");




?>