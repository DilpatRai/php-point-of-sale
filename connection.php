<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "phppos";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    echo "An error occured connecting to the database";
}

?>