<?php
include 'header.php';
include 'conn.php';

if(!isset($_SESSION['email'])){

    header("Location: login.php");

}   
?>

<div class="container">

<div class="row">
    <div class="col-md-12">

    <table class="table table-border">
    <tr>

        <th>#</th>
        <th>User Name</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    <?php

        $query = "select * from `order`";
        $result = mysqli_query($con,$query);

        while($row = mysqli_fetch_assoc($result)){

        echo "<tr>

        <td>$row[orderid]</td>
        <td>$row[userid]</td>
        <td>$row[totalprice]</td>
        ";
        if($row['status'] == 0){
            echo "<td ><span class='bg-danger text-white'>Pending</span></td>";
        }
        else{
            echo "<td ><span class='bg-success text-white'>Confirm</span></td>";
        }
        if($row['status'] == 0){

            echo "
            <td>
            <a href='editorder.php?id=$row[orderid]'>Edit</a>
            |  <a>Delete</a>
            </td>";
        }
        echo "
    </tr>
    ";


        }

    
    ?>

        
    </table>

    </div>
</div>

</div>
