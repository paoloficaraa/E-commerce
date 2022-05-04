<?php 
require_once("connection.php");
session_start(); 

require_once "classCart.php";

ob_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST["btnAddToCart"]))
        $Cart->addToCart($_SESSION["userId"], $_POST["productId"], 1);
}
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>E-Commerce</title>
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
                            <a class="navbar-brand" href="index.html">
                                <img src="assets/images/logo.jpg" alt="Logo" id="logo" style="width: 100px; height: 100px;">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class=" active dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Home
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" aria-label="Toggle navigation">Categories</a>
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
                                </ul>
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
                            <div class="button">
                                <a href="cart.php" class="navbar-brand">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
                                </a>

                                <a href="wishList.php" class="navbar-brand">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
  <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
</svg>
                                </a>
                            </div> 
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section class="hero-area overlay" style="background-image: url('assets/images/hero-area.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="hero-text text-center">
                        <!-- Start Hero Text -->
                        <div class="section-heading">
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">E-commerce Jean Monnet</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Are available all product that you need with just a click</p>
                        </div>
                        <!-- End Hero Text -->
                        <!-- Start Search Form -->
                        <form action="" class="search-form wow fadeInUp" method="get" data-wow-delay=".7s">

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 p-0">
                                    <div class="search-input">
                                        <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                        <input type="text" name="keyword" id="keyword" placeholder="Product">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 p-0">
                                    <div class="search-input">
                                        <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                                        <select name="category" id="category">
                                            <option value="none" selected disabled>Categories</option>
                                            <!--da aggiungere dinamicamente con phpp-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 p-0">
                                    <div class="search-input">
                                        <label for="price"><i class="lni lni-search-alt theme-color"></i></label>
                                        <input type="number" name="price" id="price" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12 p-0">
                                    <div class="search-btn button">
                                        <button class="btn"><i class="lni lni-search-alt"></i>Search</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!-- End Search Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Categories Area -->
    <section class="categories">
        <div class="container">
            <div class="cat-inner">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="category-slider">
                            <?php
                            $query = "SELECT * FROM categories";
                            $result = $conn->query($query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "
                                        <a href='category.php?name=" . $row["name"] . "' class='single-cat'>
                                            <div>
                                                <img src='" . $row["thumbnail"] . "' alt='#' style='width:50px; height:50px'>
                                            </div>
                                            <h3>" . $row["name"] . "</h3>
                                        </a>
                                        ";
                                }
                            } else {
                                header("404.html");
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Categories Area -->

    <!-- Start Items Grid Area -->
    <section class="items-grid section custom-padding" style="background-color: #DCDCDC;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Products</h2>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $item = 1;
                        while ($row = $result->fetch_assoc()) {
                            $query1 = "SELECT * FROM categories JOIN product_categories ON product_categories.categoryId = categories.Id WHERE product_categories.productId = " . $row["Id"];
                            $category = ($conn->query($query1))->fetch_assoc();
                            if (isset($category["name"])) {
                                $element = "
                                    <div class='col-lg-4 col-md-6 col-12'>
                                        <div class='single-grid wow fadeInUp' data-wow-delay='.2s'>
                                            <div class='image'>
                                                <a href='product.php?Id=" . $row["Id"] . "' class='thumbnail'><img src=" . $row["thumbnail"] . " alt='#'></a>
                                            </div>
                                            <div class='content'>
                                                <div class='top-content'>
                                                    <small>" . $category["name"] . "</small>
                                                    <h3 class='title'>
                                                    <a href='product.php?Id=" . $row["Id"] . "'>" . $row["Name"] . "</a>
                                                    </h3>
                                                </div>
                                                <center>
                                                    <div class='btn'>";
                                if(isset($_SESSION["userId"])){
                                    $element .= "<form action='' method='post'>
                                                            <input type='hidden' name='productId' value='" . $row["Id"] . "'>
                                                            <button type='submit' name='btnAddToCart' class='btn btn-primary form-control'>Add to cart</button>
                                                        </form>";
                                } else {
                                    $element .= "<button id='" . $row["Id"] . "," . $row["Name"] . "," . $row["Description"] . "," . $row["Price"] . "," . $row["Quantity"] . "," . $row["thumbnail"] . "' class='btn btn-primary form-control'>Add to cart</button>";
                                }
                                $element .= "</div>
                                                </center>
                                                <div class='bottom-content'>
                                                    <p class='price'>Start From: <span>" . $row["Price"] . " ple</span></p>
                                                    <a href='javascript:void(0)' class='like'><i class='lni lni-heart'></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                    echo $element;
                            } else {
                                header("location:404.html");
                            }
                            $item++;
                        }
                    } else {
                        header("location:404.html");
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Items Grid Area -->

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
    <script type="text/javascript">
        //========= Category Slider 
        tns({
            container: '.category-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: false,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 5,
                },
                1170: {
                    items: 6,
                }
            }
        });
    </script>
</body>

</html>