<?php
include 'dashboard.php'; ?>



<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Color Insert</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="colorname"
                                            placeholder="Enter Color  Name">
                                    </div>
                                    
                                </div>
                               
                                <button  type="submit" name="insert" class="btn btn-primary btn-user btn-block">
                                    Insert
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

        if(isset($_POST['insert'])){

            $colorname = $_POST['colorname'];

                include('conn.php');

                $query = "insert into product_color(colorname) values('$colorname')";

                $result = mysqli_query($con,$query) or die("query expired");

                if($result){

                    echo "
                        <script>
                            alert('Color Inserted');
                            location.href = 'color-list.php';
                        </script>
                    ";

                }

            }

    
    
    
    ?>








<?php include('footer.php') ?>