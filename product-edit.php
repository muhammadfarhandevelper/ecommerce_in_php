<?php
include 'dashboard.php'; ?>

<?php

    include 'conn.php';

    $id = $_GET['id'];
    $id = $id/103640;

    $query = "select * from product where pid = $id";

    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

    $pname = $row['pname'];
    $pshortdesc = $row['pshortdesc'];
    $plongdesc = $row['plongdesc'];
    $pimg = $row['pimg'];
    $pprice = $row['pprice'];
    $catid = $row['catid'];
    $colorid = $row['colorid'];
    $status = $row['status'];



?>


<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Product Update</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="pname"
                                            placeholder="Enter Product Name" value="<?php echo $pname?>">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="pshortdesc"
                                            placeholder="Enter Short Description " value="<?php echo $pshortdesc?>">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <textarea name="plongdesc" rows="5" class="form-control" placeholder="Description:"><?php echo $plongdesc?></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="file" class="form-control " name="pimg">
                                        <br>
                                        <img src="productimg/<?php echo $pimg?>" width="80px" >
                                        <input type="hidden" name="oldimg" value="<?php echo $pimg?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" min="0" class="form-control form-control-user" name="pprice"
                                            placeholder="Enter Product Price" value="<?php echo $pprice?>">
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select name="category" class="form-control">
                                      
                            <?php
                                    include 'conn.php';

                                    $query = "select * from product_cat";
                                    $result = mysqli_query($con,$query);
                                   
                                   while($row = mysqli_fetch_assoc($result)){
                                    
                                    if($row['catid'] == $catid){

                                        echo " <option value='$row[catid]' selected  >$row[catname]</option>";
                                    }
                                    else{
                                        echo " <option value='$row[catid]'  >$row[catname]</option>";

                                    }

                                   }

                            ?>
                                            </select>    
                                    
                                </div>

                                   
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                            <select name="color" class="form-control">
                                      
                            <?php

                                    $query = "select * from product_color";
                                    $result = mysqli_query($con,$query);
                                   
                                   while($row = mysqli_fetch_assoc($result)){
                                        
                                    if($row['colorid'] == $colorid){

                                        echo " <option value='$row[colorid]' selected>$row[colorname]</option>";
                                    }
                                    else{
                                        echo " <option value='$row[colorid]'>$row[colorname]</option>";
                                    }

                                   }

                            ?>
                                            </select>    
                                    
                                </div>
                                    <br><br><br>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="pstatus" class="form-control">
                                        <?php

                                            if($status == 1){

                                                echo "
                                                <option value='1' selected>In Stock</option>
                                                <option value='0'>Out Stock</option>";
                                            }
                                            else{
                                                echo "
                                                <option value='1' >In Stock</option>
                                                <option value='0' selected>Out Stock</option>";
                                            }
                                        
                                        ?>
                                    </select>

                                    </div>

                                    
                                </div>


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

            $pname = $_POST['pname'];
            $pshortdesc = $_POST['pshortdesc'];
            $plongdesc = $_POST['plongdesc'];
            $pprice = $_POST['pprice'];
            $category = $_POST['category'];
            $color = $_POST['color'];
            $status = $_POST['pstatus'];

            if(isset($_FILES['pimg'])){


                if($_FILES['pimg']['name'] != null){

                    $imgname = $_FILES['pimg']['name'];
                    $tmpimg = $_FILES['pimg']['tmp_name'];
    
                    $imgname = time() . "_" . $imgname;
    
                    move_uploaded_file($tmpimg,"productimg/".$imgname);
                    unlink("productimg/".$_POST['oldimg']);


                }
                else{
                    $imgname = $_POST['oldimg'];
                }

                $query = "update product set pname = '$pname' , pshortdesc = '$pshortdesc',
                plongdesc = '$plongdesc', pimg = '$imgname' , pprice = $pprice , catid = $category , colorid = $color , status = $status where pid = $id ";

                $result = mysqli_query($con,$query) or die("query expired");

                if($result){

                    echo "
                        <script>
                            alert('Product Updated');
                            location.href = 'product-list.php';
                        </script>
                    ";

                }

            }




        }
    
    
    
    ?>








<?php include('footer.php') ?>