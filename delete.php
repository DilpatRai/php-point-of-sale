<?php
include 'connection.php';
$id = $_GET['id'];
$query = "DELETE from product where id='$id'";
mysqli_query($conn, $query);
header("location:product.php");


?>