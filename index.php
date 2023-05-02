<?php

include 'header.php';
include 'conn.php';



?>


<br><br><br>


<h1 class="text-center"> Products </h1>


<div class="container">

<div class="row">

<?php

    
$query = "select * from product";
$result = mysqli_query($con,$query);

while($row  = mysqli_fetch_assoc($result)){

    echo "
    <div class='col-md-4'>
<div class='card'>
  <img src='productimg/$row[pimg]' class='card-img-top' >
  <div class='card-body'>
    <h5 class='card-title'>$row[pname]</h5>
    <p class='card-text'>$row[pshortdesc].</p>
    <a href='' class='btn btn-primary'>More</a>
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