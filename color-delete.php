<?php

    include 'conn.php';

    $id = $_GET['id'];

    $id = $id/103640;

    $query = "delete from product_color where colorid = $id";
    
    $result = mysqli_query($con,$query);

    if($result){
        echo "
        <script>
            alert('Color Deleted');
            location.href = 'color-list.php';
        </script>
    ";

    }


?>