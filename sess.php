<?php
include 'header.php';
include 'conn.php';

if(isset($_SESSION['cart'])){
   
    $cart = $_SESSION['cart'];
    
}
?>

<div class="container my-3">
    <div class="row">
        <table class="table table-bordered">
        <tr>

            <th>Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>total Price </th>
            <th>Remove</th>
        </tr>    

        <form action="updatecart.php" method="post">

        <?php

            $totalprice = 0;

            if(isset($_SESSION['cart'])){

 
            foreach($cart as $item => $val){
                $ttl = $val['price']*$val['quantity'];

                $totalprice += $ttl;

                echo "
                <tr>
                <td> $val[title] </td>
                <td> image  </td>
                <td> <input type='number' onblur='this.form.submit()' name='quantity[]' value='$val[quantity]' min='1' class='form-control'/> </td>
                <td> $val[price] </td>
                <td> $ttl </td>
                <td> <a href='removecart.php?id=$item' class='btn btn-danger'>X</a>  </td>
                </tr>
                ";
                
        
            }
        }
        ?>

        <div class="row justify-content-end">

            <button type="submit" name="upcart" class="btn btn-warning my-3" style="width: 140px;">Update Cart</button>
        </div>
        <br>
        </form>
        </div>
        
    </table>    

    <div class="border border-dark">
        
    <p>Total Price : <?php echo $totalprice?> PKR</p>
    <p>Shipping Price: 100 PKR</p>

    <br><br>
</div>
<br>

<div class="row">

</div>

<a  href="checkout.php" class="btn btn-primary my-3" style="width: 100px;">Check Out</a>





<?php


?>