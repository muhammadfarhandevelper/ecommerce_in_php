<?php

    include 'conn.php';

    $id = $_GET['id'];

    $id = $id/103640;

    $query = "select * from product_cat where catid  = $id";

    $result  = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

    unlink("categoryimg/".$row['catimg']);

    $query = "delete from product_cat where catid = $id";
    
    $result = mysqli_query($con,$query);

    if($result){
        echo "
        <script>
            alert('Category Deleted');
            location.href = 'category-list.php';
        </script>
    ";

    }


?>