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
                                <h1 class="h4 text-gray-900 mb-4">Category Insert</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="catname"
                                            placeholder="Enter Category Name">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <textarea name="catdesc" rows="5" class="form-control" placeholder="Description:"></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="file" class="form-control " name="catimg">
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

            $catname = $_POST['catname'];
            $catdesc = $_POST['catdesc'];

            if(isset($_FILES['catimg'])){

                $imgname = $_FILES['catimg']['name'];
                $tmpimg = $_FILES['catimg']['tmp_name'];

                $imgname = time() . "_" . $imgname;

                move_uploaded_file($tmpimg,"categoryimg/".$imgname);


                include('conn.php');

                $query = "insert into product_cat(catname,catdesc,catimg) values('$catname','$catdesc','$imgname')";

                $result = mysqli_query($con,$query) or die("query expired");

                if($result){

                    echo "
                        <script>
                            alert('Category Inserted');
                            location.href = 'category-list.php';
                        </script>
                    ";

                }

            }




        }
    
    
    
    ?>








<?php include('footer.php') ?>