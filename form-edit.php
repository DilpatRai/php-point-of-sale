<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

include 'connection.php';

$id = $_GET['id'];
$product = mysqli_query($conn, "SELECT * FROM product WHERE id =" . $id);
$row = mysqli_fetch_array($product);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Milton, Kashif and Dilpat">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Luxury Cars | Hyderabad</title>




    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./assets/bs4/css/bootstrap.min.css">



    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <link href="./assets/bs4/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Luxury Cars</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="logout.php">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <span data-feather="home"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="product.php">
                                <span data-feather="shopping-cart"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="order.php">
                                <span data-feather="file"></span>
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="report.php">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Product</h1>
                    <div class="btn-group mr-2">
                        <a type="button" class="btn btn-sm btn-outline-secondary" href="product.php">Back</a>
                    </div>
                </div>
                <h4>Edit Add</h4>
                <div class="table-responsive" class="mb-5">
                    <form class="mb-3" method="post" action="insert.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" class="form-control" id="product_code" name="product_code"
                                value="<?= $row['product_code'] ?>">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                value="<?= $row['product_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="<?= $row['price'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="currency">Currency</label>
                            <input type="text" class="form-control" id="currency" name="currency"
                                value="<?= $row['currency'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="disc">Discount</label>
                            <input type="text" class="form-control" id="disc" name="disc"
                                value="<?= $row['discount'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="dimension">Dimension</label>
                            <input type="text" class="form-control" id="dimension" name="dimension"
                                value="<?= $row['dimension'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit" value="<?= $row['unit'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" id="photo" name="file">
                        </div>

                        <input type="submit" name="update" value="Update Product"
                            class="btn btn-sm btn-outline-primary">
                    </form>
                </div>
            </main>
        </div>
    </div>

    </div>
    </div>


    <script src="./assets/bs4/js/jquery.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="./assets/bs4/js/jquery.slim.min.js"><\/script>')</script>
    <script src="/docs/4.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/bs4/js/feather.min.js"></script>
    <script src="./assets/bs4/js/dashboard.js"></script>
</body>

</html>