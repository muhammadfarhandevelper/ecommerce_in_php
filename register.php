<?php

include 'header.php';

?>


<br>

<div class="container">
    <div class="row">
        <div class="offset-md-3 col-md-6">


            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Full Name: </label>
                    <input type="text" class="form-control" placeholder="Enter Name " name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email : </label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password : </label>
                    <input type="password" class="form-control" placeholder="Enter Name " name="pass">
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone: </label>
                    <input type="text" class="form-control" placeholder="Enter Name " name="phone">
                </div>
                <div class="mb-3">
                    <label class="form-label">Image: </label>
                    <input type="file" class="form-control" placeholder="Enter Name " name="img">
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender: </label>
                    <label for="">Male : </label>
                    <input type="radio" value="1" name="gender">
                    <label for="">Female : </label>
                    <input type="radio" value="0" name="gender">
                </div>

                <button type="submit" name="register" class="btn btn-primary">Register</button>

            </form>

        </div>
    </div>
</div>



<br>


<?php


if(isset($_POST['register'])){

    $name  = $_POST['name'];
    $email  = $_POST['email'];
    $pass  = $_POST['pass'];
    $phone  = $_POST['phone'];
    $gender  = $_POST['gender'];

    if(isset($_FILES['img'])){

    
        $tmpname = $_FILES['img']['tmp_name'];
        $imgname = $_FILES['img']['name'];

        $imgname = time() . $imgname;

        move_uploaded_file($tmpname,"userimg/".$imgname);

    }

    include 'conn.php';

    $query = "insert into user(username,useremail,userpassword,userphone,userimg,usergender) 
    values('$name','$email','$pass','$phone','$imgname',$gender)";

    $result = mysqli_query($con,$query);    

    if($result){
        echo "
        <script>
            alert('you are Registered');
            location.href = 'index.php';
        </script>
    ";
    }

}





?>


<?php
include 'hfooter.php';


?>