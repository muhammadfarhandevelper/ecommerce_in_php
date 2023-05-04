<?php

if(isset($_SESSION['email'])){

    header("Location: index.php");

}

include 'header.php';

?>


<br>

<div class="container">
    <div class="row">
        <div class="offset-md-3 col-md-6">


            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Email : </label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password : </label>
                    <input type="password" class="form-control" placeholder="Enter Name " name="pass">
                </div>
                
                <button type="submit" name="login" class="btn btn-primary">Login</button>

            </form>

        </div>
    </div>
</div>



<br>


<?php


if(isset($_POST['login'])){

    $email  = $_POST['email'];
    $pass  = $_POST['pass'];


    include 'conn.php';

    $query = "select * from user where useremail = '$email' and userpassword = '$pass' ";

    $result = mysqli_query($con,$query);    

    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){


        $_SESSION['email'] = $email;
        $_SESSION['img'] = $row['userimg'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['id'] = $row['userid'];
        
        header("location: index.php");
    }
    else{
        echo "
        <script>
            alert('Login Failed');
            location.href = 'login.php';
        </script>
    ";
    }

}





?>


<?php
include 'hfooter.php';


?>