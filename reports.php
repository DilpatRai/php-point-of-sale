<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

include 'connection.php';

$doc = $_GET['doc'];
$data = mysqli_query($conn, "SELECT * FROM transaction_detail WHERE document_number ='$doc'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Cars | Hyderabad</title>
</head>

<body class="margin-left:40px;" onload="window.print()">
    <table width="100%">
        <tr>
            <td width="34%" align="center">
                <h1>Report </h1>
            </td>
        </tr>
    </table>
    <table width="100%" class="table" cellspacing="0" cellpading="0" border="1">
        <thead>
            <tr>
                <th>Transaction</th>
                <th>Total</th>
                <th>Qty</th>
                <th>Item</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $d) {
                echo "<tr>
                <td>" . $d['document_code'] . "-" . $d['document_number'] . "</td>
                <td>" . $d['sub_total'] . "</td>
                <td>" . $d['unit'] . "</td>
                <td>" . $d['product_code'] . "</td>
            </tr>";
            } ?>
        </tbody>

    </table>
</body>

</html>