<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div class="container py-5">
      <div class="row mt-4">

<?php
  require 'conn.php';

  $query = "SELECT * FROM product";
  $query_run = mysqli_query($conn, $query);
  $check_product = mysqli_num_rows($query_run) > 0;

  if($check_product){
    while($row = mysqli_fetch_array($query_run))
    {
      ?>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <?php echo '<img src="databaseimages/'  .$row['image'].'" class="card-img-top" alt="Image">' ?>
              <h2 class="card-title"><?php echo $row['product_name']; ?></h2>
              <h2 class="card-title"><?php echo $row['price']; ?></h2>
              <p class="card-text">
                <?php echo $row['price']; ?>
              </p>
            </div>
          </div>
        </div>
      <?php


    }
  } else{
    echo "No data found";
  }
 ?>


      </div>
    </div>




  </body>
</html>
