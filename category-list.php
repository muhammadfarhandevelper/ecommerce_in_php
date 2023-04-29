<?php
include 'dashboard.php'; ?>




<div class="container my-5">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <br>
        <a href="category-insert.php" class="btn btn-primary">Add Category</a>    
        <br><br>
            <h6 class="m-0 font-weight-bold text-primary">Product Category List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        include('conn.php');
                        $query = "select * from product_cat";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <tr>
                                <td><?php echo $row['catid']?></td>
                                <td><?php echo $row['catname']?></td>
                                <td style="width: 50%;"><?php echo $row['catdesc']?> </td>
                                <td><img src="categoryimg/<?php echo $row['catimg']?>" width="100px" /></td>
                                <td>
                                <a href="category-edit.php?id=<?php echo $row['catid']*103640?>" class="btn btn-warning btn-circle ">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>    
                                    <a onclick="myfun(<?php echo $row['catid']*103640?>)" class="btn btn-danger btn-circle ">
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
            location.href = 'category-delete.php?id='+id;
        }

    }



</script>










<?php include('footer.php') ?>