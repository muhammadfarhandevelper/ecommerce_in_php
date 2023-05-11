<?php

session_start();

$pid = $_GET['id'];

if(isset($_SESSION['cart'])){


    $cart = $_SESSION['cart'];

    echo "<pre>";
    print_r($cart);

    session_unset();

    unset($cart[$pid]);

    $_SESSION['cart'] = $cart;

    header("location: sess.php");
    
    
}
?>