<?php
include 'dashboard.php'; ?>




<div class="container my-5">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <br>
        <a href="color-insert.php" class="btn btn-primary">Add Color</a>    
        <br><br>
            <h6 class="m-0 font-weight-bold text-primary">Product Color List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        include('conn.php');
                        $query = "select * from product_color";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <tr>
                                <td><?php echo $row['colorid']?></td>
                                <td><?php echo $row['colorname']?></td>
                                <td>
                                <a href="color-edit.php?id=<?php echo $row['colorid']*103640?>" class="btn btn-warning btn-circle ">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>    
                                    <a onclick="myfun(<?php echo $row['colorid']*103640?>)" class="btn btn-danger btn-circle ">
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
            location.href = 'color-delete.php?id='+id;
        }

    }



</script>










<?php include('footer.php') ?>