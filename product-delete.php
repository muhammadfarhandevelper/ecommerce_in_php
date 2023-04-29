<?php

    include 'conn.php';

    $id = $_GET['id'];

    $id = $id/103640;

    $query = "select * from product where pid  = $id";

    $result  = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

    unlink("productimg/".$row['pimg']);

    $query = "delete from product where pid = $id";
    
    $result = mysqli_query($con,$query);

    if($result){
        echo "
        <script>
            alert('Product Deleted');
            location.href = 'product-list.php';
        </script>
    ";

    }


?>