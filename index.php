<?php

include 'header.php';
include 'conn.php';

$search = $_GET['search'] ??"";

?>


<br><br><br>


<h1 class="text-center"> Products </h1>

<div class="container">
  <div class="row">
    <div class="offset-md-8 col-md-4">
      <form action="">
        <div class="input-group">
          <select  name="order" class="form-select">
            <option value="asc">Low to High</option>
            <option value="desc">High to Low </option>
          </select>
          <input type="text" class="form-control" value="<?php if($search ){ echo $_GET['search']; }?>" placeholder="Searching...." name="search" >
          <button type="submit" name="searchbtn" class="btn btn-primary">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="container my-3">

<div class="row">

<?php

  if(isset($_GET['searchbtn'])){

    $order = $_GET['order'];

    $search = $_GET['search'];
      
    $query = "select * from product where pname like '%$search%'  order by pprice $order";
    


  }
    
  else{

    $query = "select * from product";
  }

$result = mysqli_query($con,$query);

while($row  = mysqli_fetch_assoc($result)){

    echo "
    <div class='col-md-4'>
<div class='card'>
  <img src='productimg/$row[pimg]' height='200px' class='card-img-top' >
  <div class='card-body'>
    <h5 class='card-title'>$row[pname]</h5>
    <p class='card-text'>Price : $$row[pprice].</p>
    <p class='card-text'>$row[pshortdesc].</p>
    <a href='product-details.php?id=$row[pid]' class='btn btn-primary'>More</a>
    ";
    if($row['status'] == 0){

     echo " <a href='cart.php?id=$row[pid]' class='btn btn-warning disabled'>Add to Cart</a>";
    }
    else{
      
      echo " <a href='cart.php?id=$row[pid]' class='btn btn-warning '>Add to Cart</a>";
    }
    echo "
  </div>
</div>
</div>
";


}

?>



</div>

</div>





<br><br><br>



<?php
include 'hfooter.php';


?>