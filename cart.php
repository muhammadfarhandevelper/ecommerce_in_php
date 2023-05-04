<?php

include 'conn.php';

session_start();

$id = $_GET['id'];

$query = "select * from product where pid = $id";

$result = mysqli_query($con,$query);

$row  = mysqli_fetch_assoc($result);



if(!isset($_SESSION['cart'])){

    $array = [
       $_GET['id'] => ['title' => $row['pname'] , 'price' => $row['pprice'] , 'quantity' => 1]
    ];

    $_SESSION['cart']  = $array;
    
    print_r($_SESSION['cart']);

    header("Location: sess.php");

}

else{

    $cart = $_SESSION['cart'];

    if(isset($cart[$id])){

        $cart[$id]['quantity']++;
        
        $_SESSION['cart'] = $cart;

        header("Location: sess.php");

    }

    else{
        $cart[$id] = ['title' => $row['pname'] , 'price' => $row['pprice'] , 'quantity' => 1];

        $_SESSION['cart'] = $cart;

        header("Location: sess.php");


    }




}





?>