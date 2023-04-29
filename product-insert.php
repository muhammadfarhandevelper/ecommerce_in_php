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
                                <h1 class="h4 text-gray-900 mb-4">Product Insert</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="pname"
                                            placeholder="Enter Product Name">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="pshortdesc"
                                            placeholder="Enter Short Description ">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <textarea name="plongdesc" rows="5" class="form-control" placeholder="Description:"></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="file" class="form-control " name="pimg">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" min="0" class="form-control form-control-user" name="pprice"
                                            placeholder="Enter Product Price">
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
                                    
                                    echo " <option value='$row[catid]'>$row[catname]</option>";

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
                                    
                                    echo " <option value='$row[colorid]'>$row[colorname]</option>";

                                   }

                            ?>
                                            </select>    
                                    
                                </div>
                                    <br><br><br>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="pstatus" class="form-control">
                                        <option value="1">In Stock</option>
                                        <option value="0">Out Stock</option>
                                    </select>

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

            $pname = $_POST['pname'];
            $pshortdesc = $_POST['pshortdesc'];
            $plongdesc = $_POST['plongdesc'];
            $pprice = $_POST['pprice'];
            $category = $_POST['category'];
            $color = $_POST['color'];
            $status = $_POST['pstatus'];

            if(isset($_FILES['pimg'])){

                $imgname = $_FILES['pimg']['name'];
                $tmpimg = $_FILES['pimg']['tmp_name'];

                $imgname = time() . "_" . $imgname;

                move_uploaded_file($tmpimg,"productimg/".$imgname);

                
                $query = "insert into product(pname,pshortdesc,plongdesc,pimg,pprice,catid,colorid,status) 
                values('$pname','$pshortdesc','$plongdesc','$imgname',$pprice,$category,$color,$status)";

                $result = mysqli_query($con,$query) or die("query expired");

                if($result){

                    echo "
                        <script>
                            alert('Product Inserted');
                            location.href = 'product-list.php';
                        </script>
                    ";

                }

            }




        }
    
    
    
    ?>








<?php include('footer.php') ?>