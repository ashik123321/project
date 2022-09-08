<?php

$conn = mysqli_connect("localhost", "id19539469_root", "-$}u3[7^<Mu1_?p+", "id19539469_crud");

if(isset($_POST['add'])){

  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $exp_date = $_POST['exp_date'];

$sql = "INSERT INTO `product`( `name`, `description`, `quantity`, `price`, `expire_date`) VALUES ('{$name}','{$description}','{$quantity}','{$price}','{$exp_date}')";

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
    <link rel="stylesheet" href="style2.css" />
    <title>Document</title>

  </head>
  <body>
    <header>
      <div>
        <h2>My Simple CRUD Operation</h2>
      </div>
    </header>

    <div class="main_wrapper">

    <div class="col1">
    <div class="wrapper_header">
        <p class="head_title">Add Product to Datababase</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="input_div">
          <div>
              <p> Name</p>
              <input type="text" name='name' />
            </div>
            <div>
              <p> Price</p>
              <input type="text" name='price'  />
            </div>
            <div>
              <p> Description</p>
              <input type="text" name='description'  />
            </div>
            <div>
              <p>Quantity</p>
              <input type="text" name='quantity'  />
            </div>
            <div>
              <p> Date</p>
              <input type="date" name='exp_date' />
            </div>
          </div>
          <div class="btn_holder">
            <input type="submit" name='add' value="Add" />
          </div>
        </form>
      </div>
    </div>
    <div class="col2">
    <p class="head_title">All Products</p>
      <div class="wrapper_bdy">
          <table border='1'>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Expire Date</th>
              <th>Action</th>
            </tr>




            <?php

$sql = "SELECT * FROM product ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

  while($row = mysqli_fetch_assoc($result)){

    ?>


            <tr>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['description']; ?></td>
              <td><?php echo $row['quantity']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td><?php echo $row['expire_date']; ?></td>
              <td style='display: flex; justify-content: space-around;'><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a><a href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>
            </tr>

<?php

  }
}

?>








          </table>
      </div>
    </div>


      
    </div>
  </body>
</html>