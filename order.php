<?php
session_start();
require_once "connection.php";



?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Cart</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="index.js"></script>

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.php">
                                <img src="assets/images/logo.jpg" alt="Logo" id="logo" style="width: 100px; height: 100px;">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <!-- <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="index.php" data-bs-toggle="collapse" data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" aria-label="Toggle navigation">Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Profile</a>
                                        <ul class="sub-menu mega-menu collapse" id="submenu-1-4">
                                            <li class="single-block">
                                                <ul>
                                                    <li class="nav-item"><a href="javascript:void(0)">My Profile</a>
                                                    </li>
                                                    <li class="nav-item"><a href="javascript:void(0)">Close account</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </div> <!-- navbar collapse -->
                            <div class="login-button">
                                <ul>
                                    <?php
                                    if (!isset($_SESSION["username"])) {
                                        echo "<li><a href='login.php'><i class='lni lni-enter'></i>Login</a></li>
                                            <li><a href='registration.php'><i class='lni lni-enter'></i>Register</a></li>";
                                    } else {
                                        echo "<li><a href='logout.php'><i class='lni lni-enter'></i>Logout</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                            <!-- <div class="button">
                                <a href="wishList.php" class="navbar-brand">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                </a>
                            </div> -->
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center wow fadeInUp" data-wow-delay=".4s">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Order</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="cart.php">Shopping Cart</a></li>
                        <li>Order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Shopping cart section -->
    <section class="py-3">
        <div class="container-fluid w-75 wow fadeInUp" data-wow-delay=".4s">
            <h5 class="font-baloo font-size-20">Order</h5>
            <!-- Cart item -->
            <div class="row">
                <div class="col-sm-9">
                    <?php
                    $count = 0;
                    $total = 0;
                    if (isset($_SESSION["cart"])) {
                        foreach ($_SESSION["cart"] as $value) :
                            $query = "SELECT * FROM products WHERE Id = " . $value["productId"];
                            $result = $conn->query($query);
                            $product = $result->fetch_assoc();
                            $count++;
                            if (isset($_COOKIE["quantity" . $product["Id"]])) {
                                $total += $product["Price"] * $_COOKIE["quantity" . $product["Id"]];
                            } else {
                                $total += $product["Price"] * $value["quantity"];
                            }
                    ?>

                            <div class='row border-top py-3 mt-3'>
                                <div class='col-sm-2'>
                                    <img src='<?php echo $product["thumbnail"]; ?>' alt='' style='height: 120px;' class='img-fluid'>
                                </div>
                                <div class='col-sm-8'>
                                    <h5 class='font-baloo font-size-20'><?php echo $product["Name"]; ?></h5>
                                    <small>Jean Monnet</small>
                                    <div class='qty d-flex pt-2'>
                                        <div class='d-flex font-rale w-50'>
                                            <select name='selectedQuantity' data-id="<?php echo $product['Id']; ?>" class='w-50 form-select' disabled>
                                                <?php
                                                if (isset($_COOKIE["quantity" . $product["Id"]])) {
                                                    echo "<option selected value='" . $_COOKIE["quantity" . $product["Id"]] . "'>Q.ty " . $_COOKIE["quantity" . $product["Id"]] . "</option>";
                                                } else {
                                                    if ($product["Quantity"] > 0) {
                                                        echo "<option selected value='" . $value["quantity"] . "'>Q.ty " . $value["quantity"] . "</option>";
                                                        if ($product["Quantity"] > 1) {
                                                            for ($i = 1; $i <= $product["Quantity"]; $i++) {
                                                                echo "<option value='$i'>Q.ty $i</option>";
                                                            }
                                                        }
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-sm-2 text-right'>
                                    <div class='font-size-20 text-dark font-baloo'>
                                        <span class='product_price' data-id="<?php echo $product['Id']; ?>"><?php
                                                                                                            if (isset($_COOKIE["quantity" . $product["Id"]])) {
                                                                                                                echo $product["Price"] * $_COOKIE["quantity" . $product["Id"]];
                                                                                                            } else {
                                                                                                                echo $product["Price"] * $value["quantity"];
                                                                                                            } ?> ple</span>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    } ?>
                </div>

                <div class="col-sm-3">
                    <div class="sub-total border text-center mt-2">
                        <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE delivery</h6>
                        <div class="border-top py-4">
                            <h5 class="font-baloo font-size-20">Total (<?php echo $count; ?> item)&nbsp; <span class="text-danger"><?php echo $total;?> ple</span></h5>
                            <form action="checkOrder.php" method="post">
                                <input type="hidden" name="total" value="<?php echo $total?>">
                                <button type="submit" class="btn btn-primary mt-3">Buy now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!--/ End Shopping cart section -->

    <!-- Start Footer Area -->
    <footer class="footer">
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <ul class="footer-bottom-links">
                                    <li><a href="">Terms of use</a></li>
                                    <li><a href=""> Privacy Policy</a></li>
                                    <li><a href="">Advanced Search</a></li>
                                    <li><a href="">Site Map</a></li>
                                    <li><a href="">Information</a></li>
                                </ul>
                                <p class="copyright-text">Designed and Developed by <a href="" rel="nofollow" target="_blank">Ficara Paolo</a>
                                </p>
                                <ul class="footer-social">
                                    <li><a href="https://instagram.com"><i class="lni lni-instagram-filled"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>