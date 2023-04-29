<?php
include 'dashboard.php'; ?>

<?php

    $id = $_GET['id'];
    $id = $id/103640;

    include 'conn.php';

    $query = "select * from product_color where colorid = $id";

    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

    $colorname = $row['colorname'];


?>

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Color Edit</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="colorname"
                                            placeholder="Enter Category Name" value="<?php echo $colorname?>">
                                    </div>
                                    
                                </div>
                                
                                <br>
                                
                                <button  type="submit" name="update" class="btn btn-primary btn-user btn-block">
                                    Update
                                </button>
                                <hr>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <?php

        if(isset($_POST['update'])){

            $colorname = $_POST['colorname'];

                $query = "update  product_color set colorname = '$colorname' where colorid = $id";

                $result = mysqli_query($con,$query) or die("query expired");

                if($result){
                    
                    echo "
                        <script>
                            alert('Color Updated');
                            location.href = 'color-list.php';
                        </script>
                    ";

                }

            }
    
    ?>








<?php include('footer.php') ?>