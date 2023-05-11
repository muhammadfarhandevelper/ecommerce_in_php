<?php

include 'header.php';
include 'conn.php';

if(!isset($_SESSION['email'])){

    header("Location: login.php");

}   


$totalprice = 0;
$shippingprice = 100;
$count = 0;

if (isset($_SESSION['cart'])) {

    $cart = $_SESSION['cart'];


    foreach ($cart as $item => $val) {
        $ttl = $val['price'] * $val['quantity'];

        $count++;

        $totalprice += $ttl;
    }
}

?>

<br><br>


<div class="container">
    <div class="row align-items-start">

        <div class="offset-md-1 col-md-6">

            <form action="" method="post">

                <label for="" class="my-2">Enter Name:</label>
                <input type="text" placeholder="Enter Name" class="form-control" name="fullname">
                <label for="" class="my-2">Enter Phone:</label>
                <input type="text" placeholder="Enter Phone" class="form-control" name="phone">
                <label for="" class="my-2">Enter Email:</label>
                <input type="email" placeholder="Enter Email" class="form-control" name="email">
                <label for="" class="my-2">Enter Shipping Address:</label>
                <textarea name="address" rows="5" class="form-control"></textarea>
                <br>
                <button type="submit" name="btn" class="btn btn-primary">Confirm Checkout</button>
            </form>

        </div>

        <div class="offset-md-1 col-md-3 mt-5">

            <p>Total Products Number: <?php echo $count ?> </p>
            <p>Shipping Price: <?php echo $shippingprice ?> PKR</p>
            <p>Total Price : <?php echo $totalprice ?> PKR</p>


        </div>


    </div>
</div>
</div>




<?php

if (isset($_POST['btn'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    mail($email,'Order Confirmed','Your order has been confirmed 
    thanks for the order! ');
    

    
    $query = "INSERT INTO `checkout`(`fullname`, `email`, `phone`, `address`, `userid`)
         VALUES ('$fullname','$email','$phone','$address',$_SESSION[id])";

    $result = mysqli_query($con, $query);

    if ($result) {


        $query = "INSERT INTO `order`(`totalprice`, `userid`) VALUES
         ($totalprice,$_SESSION[id])";

        $result2 = mysqli_query($con, $query);

        if ($result2) {

            $result3 = mysqli_query($con, "select * from `order` order by orderid desc");

            $row = mysqli_fetch_assoc($result3);

            foreach ($cart as $item => $val) {
                

                $query  = "INSERT INTO `order_details`(`order_id`, `pid`, `quantity`)
                 VALUES ($row[orderid],$item,$val[quantity])";

                $result4 = mysqli_query($con, $query);
            }

            if($result4){

                session_unset();
                unset($_SESSION['cart']);

                echo "<script>

alert('Order confirmed');
location.href = 'index.php';
</script>";

            }

        }
    }
}






?>



<br><br><br>
<?php
include 'hfooter.php';


?>