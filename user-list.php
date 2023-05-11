<?php
include 'dashboard.php'; ?>




<div class="container my-5">


    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <br>
        <a href="product-insert.php" class="btn btn-primary">Add user</a>    
        <br><br>
            <h6 class="m-0 font-weight-bold text-primary">user  List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email </th>
                            <th>Password</th>
                            <th>Image </th>
                            <th>Phone </th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody style="">

                        <?php
                        include('conn.php');
                        $query = "select * from user ";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            
                            <tr >
                                <td><?php echo $row['userid']?></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['useremail']?></td>
                                <td><?php echo $row['userpassword']?></td>
                                <td><img src="userimg/<?php echo $row['userimg']?>" width="100px" /></td>
                                <td><?php echo $row['userphone']?></td>
                                <td ><?php 
                                    if($row['usergender'] == 0){
                                        echo "<span class='btn btn-warning'>Female</span>";
                                    }
                                    else{
                                        
                                        echo "<span class='btn btn-success'>Male</span>";
                                    }
                                ?> </td>
                                <td ><?php 
                                    if($row['role'] == 0){
                                        echo "<span class='btn btn-warning'>user</span>";
                                    }
                                    else{
                                        
                                        echo "<span class='btn btn-success'>Admin</span>";
                                    }
                                ?> </td>
                                <td ><?php echo $row['date']?> </td>
                                <td>
                                <a href="product-edit.php?id=<?php echo $row['userid']*103640?>" class="btn btn-warning btn-circle ">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>    
                                    <a onclick="myfun(<?php echo $row['userid']*103640?>)" class="btn btn-danger btn-circle ">
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