<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

include 'connection.php';

$id = $_POST['id'];
$query = mysqli_query($conn, "DELETE from product_temp WHERE id_product='$id'");
if ($query) {
    echo json_encode('success');
} else {
    echo json_encode('failed');
}

?>