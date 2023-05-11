<?php
include 'header.php';
include 'conn.php';

if(!isset($_SESSION['email'])){

    header("Location: login.php");

} 

$id = $_GET['id'];

$query = "select * from `order` where orderid = $id";
$result = mysqli_query($con,$query);
    if($result){

?>


<div class="container mt-5">
    <div class="row">

    <form action="" method="post">

        <div class="col-md-4">
            <label for="">Order Status</label>
            <select name="status" class="form-select">
                <option value="0">Pending</option>
                <option value="1">Confirmed</option>
            </select>
            <br>
            <button type="submit" name="btnupdate" class="btn btn-primary">Update</button>
        </div>

    </form>

    </div>
</div>

<?php

if(isset($_POST['btnupdate'])){

    $status = $_POST['status'];

    $query = "update `order` set status = $status where orderid = $id";
   $result = mysqli_query($con,$query);

   if($result){

    header("location: allorders.php");

   }

}



?>



<?php

    }

?>