<?php

$conn = mysqli_connect("localhost", "id19539469_root", "-$}u3[7^<Mu1_?p+", "id19539469_crud");




if(isset($_POST['id'])){

  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $exp_date = $_POST['exp_date'];

  $sql = "UPDATE `product` SET `name`='$name',`description`='$description',`quantity`='$quantity',`price`='$price',`expire_date`='$exp_date' WHERE id = {$_POST['id']}";



if(mysqli_query($conn, $sql)){
  header("Location: /");
}



}




?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>

  </head>
  <body>
    <header>
      <div>
        <h2>My Simple CRUD Operation</h2>
      </div>
    </header>

    <div class="main_wrapper">
      <div class="wrapper_header">
        <p class="head_title">Add Product</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">




        <?php

$id = $_GET['id'];

$sql = "SELECT * FROM product WHERE id = $id";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

  while($row = mysqli_fetch_assoc($result)){

    ?> 

    <div class="input_div">
    <input style='display: none' type="text" name='id' value='<?php echo $id; ?>' />

    <div>
      <p>Product Name</p>
      <input type="text" name='name' value='<?php echo $row['name']; ?>' />
    </div>
    <div>
      <p>Product Price</p>
      <input type="text" name='price' value='<?php echo $row['price']; ?>'  />
    </div>
    <div>
      <p>Product Description</p>
      <input type="text" name='description' value='<?php echo $row['description']; ?>'  />
    </div>
    <div>
      <p>Quantity</p>
      <input type="text" name='quantity' value='<?php echo $row['quantity']; ?>'  />
    </div>
    <div>
      <p>Expiry Date</p>
      <input type="date" name='exp_date' value='<?php echo $row['expire_date']; ?>' />
    </div>
  </div>
  <div class="btn_holder">
    <input type="submit" value="Update" />
  </div>


  <?php
  }
}

?>



        </form>
      </div>

    </div>
  </body>
</html>