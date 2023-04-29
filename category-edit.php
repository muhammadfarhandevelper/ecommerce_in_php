<?php
include 'dashboard.php'; ?>

<?php

    $id = $_GET['id'];
    $id = $id/103640;

    include 'conn.php';

    $query = "select * from product_cat where catid = $id";

    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

    $catname = $row['catname'];
    $catdesc = $row['catdesc'];
    $catimg = $row['catimg'];

?>

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Category Edit</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="catname"
                                            placeholder="Enter Category Name" value="<?php echo $catname?>">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <textarea name="catdesc" rows="5" class="form-control" placeholder="Description:"><?php echo $catdesc?></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="file" class="form-control " name="catimg">
                                    </div>
                                    <input type="hidden" name="oldimg" value="<?php echo $catimg
                                    ?>">
                                </div>
                                
                                <img src="categoryimg/<?php echo $catimg?>" width="80px" >
                                <br>
                                <br>
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

            $catname = $_POST['catname'];
            $catdesc = $_POST['catdesc'];

            if(isset($_FILES['catimg'])){


                if($_FILES['catimg']['name'] != null){

                    
                    $imgname = $_FILES['catimg']['name'];
                    $tmpimg = $_FILES['catimg']['tmp_name'];
                    
                    $imgname = time() . "_" . $imgname;
                    
                    move_uploaded_file($tmpimg,"categoryimg/".$imgname);
                    unlink("categoryimg/".$_POST['oldimg']);

                }
                else{
                    $imgname = $_POST['oldimg'];
                }
                
                $query = "update  product_cat set catname = '$catname', catdesc = '$catdesc', catimg = '$imgname' where catid = $id";

                $result = mysqli_query($con,$query) or die("query expired");

                if($result){
                    
                    echo "
                        <script>
                            alert('Category Updated');
                            location.href = 'category-list.php';
                        </script>
                    ";

                }

            }




        }
    
    
    
    ?>








<?php include('footer.php') ?>