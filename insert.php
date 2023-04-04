<?php
include 'connection.php';

if ($_POST['upload']) {

    $name = $_FILES['file']['name'];
    $extension_allowed = array('png', 'jpg');
    $x = explode('.', $name);
    $extension = strtolower(end($x));
    $size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $productCode = $_POST['product_code'];
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $currency = $_POST['currency'];
    $disc = $_POST['disc'];
    $dimension = $_POST['dimension'];
    $unit = $_POST['unit'];

    if (in_array($extension, $extension_allowed) === true) {
        if ($size < 1044070) {
            move_uploaded_file($file_tmp, 'assets/photo/' . $name);
            $query = mysqli_query($conn, "INSERT INTO product (product_code, product_name, price, currency, discount, dimension, unit, photo) VALUES('$productCode', '$productName', '$price', '$currency', '$disc', '$dimension', '$unit', '$name')");
            if ($query) {
                echo 'FILE HAS BEEN UPLOADED';
            } else {
                echo 'FAILED TO UPLOAD FILE';
            }
        } else {
            echo 'FILE SIZE IS TOO BIG';
        }
    } else {
        echo 'FILE TYPE IS NOT ALLOWED';
    }
} elseif ($_POST['update']) {
    $name = $_FILES['file']['name'];
    $productCode = $_POST['product_code'];
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $currency = $_POST['currency'];
    $disc = $_POST['disc'];
    $dimension = $_POST['dimension'];
    $unit = $_POST['unit'];
    $id = $_POST['id'];

    $data = mysqli_query($conn, "SELECT * FROM product where id=" . $id);
    $row = mysqli_fetch_array($data);
    $xfile = $row['photo'];

    if ($name != null || $name != '') {
        $extension_allowed = array('png', 'jpg');
        $x = explode('.', $nama);
        $extension = strtolower(end($x));
        $size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        unlink('assets/photo/' . $xfile);

        if (in_array($extension, $extension_allowed) === true) {
            if ($size < 1044070) {
                move_uploaded_file($file_tmp, 'assets/photo/' . $name);
                $query = mysqli_query($conn, "UPDATE product SET product_code='$productCode', product_name='$productName', price='$price', currency='$currency', discount='$disc', dimension='$dimension', unit='$unit', photo='$name' where id='$id'");
                if ($query) {
                    echo 'UPDATED SUCCESSFULLY';
                } else {
                    echo 'FAILED TO UPDATE';
                }
            } else {
                echo 'FILE SIZE IS TOO BIG';
            }
        } else {
            echo 'FILE TYPE IS NOT ALLOWED';
        }

    } else {
        $query = mysqli_query($conn, "UPDATE product SET product_code='$productCode', product_name='$productName', price='$price', currency='$currency', discount='$disc', dimension='$dimension', unit='$unit' where id='$id'");
        if ($query) {
            echo 'UPDATED SUCCESSFULLY';
        }
    }
}

header("Location: product.php");


?>