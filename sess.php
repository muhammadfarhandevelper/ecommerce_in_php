<?php
include 'header.php';
include 'conn.php';


    $cart = $_SESSION['cart'];

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

        
        <?php
            foreach($cart as $item => $val){
                $ttl = $val['price']*$val['quantity'];

                echo "
                <tr>
                <td> $val[title] </td>
                <td> image  </td>
                <td> <input type='number' value='$val[quantity]' min='1' class='form-control'/> </td>
                <td> $val[price] </td>
                <td> $ttl </td>
                <td> <button class='btn btn-danger'>X</button>  </td>
                </tr>
                ";
                
        
            }?>
            
        </div>
        
    </table>    




<?php


?>