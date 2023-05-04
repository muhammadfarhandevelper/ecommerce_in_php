<?php

include 'header.php';
include 'conn.php';

$id = $_GET['id'];


$query = "select * from product where pid = $id";

$result = mysqli_query($con,$query);

$row = mysqli_fetch_assoc($result);

$pname = $row['pname'];
$pshortdesc = $row['pshortdesc'];
$plongdesc   = $row['plongdesc'];
$pimg   = $row['pimg'];
$pprice   = $row['pprice'];
$status   = $row['status'];


?>

<br><br>


<div class="container">
    <div class="row align-items-center">

    <div class="col-md-6">

    <img src="productimg/<?php echo $pimg?>" width="100%" height="400px" alt="">

    </div>
    <div class="col-md-6">

    <h3><?php echo $pname?></h3>
    <p><?php echo $plongdesc?></p>
    <p>Price : $<?php echo $pprice?></p>
    <?php

            if($status == 0){
                echo "<span class='btn  btn-danger'>Out Stock</span>";
            }
            else{

                echo "<span class='btn btn-success'>In Stock</span>";
            }
    ?>

    </div>
    </div>
</div>







<br><br><br>
<?php
include 'hfooter.php';


?>