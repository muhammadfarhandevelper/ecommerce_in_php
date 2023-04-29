<?php
include 'dashboard.php'; ?>




<div class="container my-5">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <br>
        <a href="product-insert.php" class="btn btn-primary">Add Product</a>    
        <br><br>
            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Color</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody style="">

                        <?php
                        include('conn.php');
                        $query = "select * from product INNER JOIN product_cat on product.catid = product_cat.catid inner join 
                        product_color on product.colorid = product_color.colorid";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            
                            <tr >
                                <td><?php echo $row['pid']?></td>
                                <td><?php echo $row['pname']?></td>
                                <td style="width: 20%;"><?php echo $row['pshortdesc']?> </td>
                                <td  style="width: 70%;"><?php echo $row['plongdesc']?> </td>
                                <td><img src="productimg/<?php echo $row['pimg']?>" width="100px" /></td>
                                <td >$<?php echo $row['pprice']?> </td>
                                <td ><?php echo $row['catname']?> </td>
                                <td ><?php echo $row['colorname']?> </td>
                                <td ><?php 
                                    if($row['status'] == 0){
                                        echo "<span class='btn btn-danger'>Out Stock</span>";
                                    }
                                    else{
                                        
                                        echo "<span class='btn btn-success'>In Stock</span>";
                                    }
                                ?> </td>
                                <td>
                                <a href="product-edit.php?id=<?php echo $row['catid']*103640?>" class="btn btn-warning btn-circle ">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>    
                                    <a onclick="myfun(<?php echo $row['pid']*103640?>)" class="btn btn-danger btn-circle ">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                            </tr>

                        <?php
                        }


                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>


<script>

    function myfun(id){

        var ans = confirm("Do you want to Delete ? ");

        if(ans){
            location.href = 'product-delete.php?id='+id;
        }

    }



</script>










<?php include('footer.php') ?>