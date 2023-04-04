<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

include 'connection.php';

$id = $_POST['id'];
$query = mysqli_query($conn, "INSERT INTO product_temp (id_product) VALUES (" . $id . ") ");
if ($query) {
    echo json_encode('success');
} else {
    echo json_encode('failed');
}

?>