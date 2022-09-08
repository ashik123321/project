<?php

$id = $_GET['id'];

$conn = mysqli_connect("localhost", "id19539469_root", "-$}u3[7^<Mu1_?p+", "id19539469_crud");
$sql = "DELETE FROM `product` WHERE id = $id";


if(mysqli_query($conn, $sql)){
  header("Location: /");
}




