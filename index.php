<?php require_once("connection.php");
session_start(); 

require_once "cart.php";

ob_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $Cart->addToCart($_SESSION["userId"], $_POST["productId"],1);
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
                                    <img src="assets/images/cart.jpg" style="width: 40px; height:30px;">
                                </a>

                                <a href="wishList.php" class="navbar-brand">
                                    <img src="assets/images/heart.png" style="width: 30px; height:20px;">
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
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">Benvenuti sul nuovo e-commerce</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">All'interno è possibile comprare qualsiasi prodotto un cliente abbia bisogno</p>
                        </div>
                        <!-- End Hero Text -->
                        <!-- Start Search Form -->
                        <form action="" class="search-form wow fadeInUp" method="get" data-wow-delay=".7s">

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 p-0">
                                    <div class="search-input">
                                        <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                        <input type="text" name="keyword" id="keyword" placeholder="Prodotto">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 p-0">
                                    <div class="search-input">
                                        <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                                        <select name="category" id="category">
                                            <option value="none" selected disabled>Categorie</option>
                                            <!--da aggiungere dinamicamente con phpp-->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 p-0">
                                    <div class="search-input">
                                        <label for="price"><i class="lni lni-search-alt theme-color"></i></label>
                                        <input type="number" name="price" id="price" placeholder="Prezzo">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12 p-0">
                                    <div class="search-btn button">
                                        <button class="btn"><i class="lni lni-search-alt"></i> Cerca </button>
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
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Prodotti</h2>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
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
                                                    <div class='btn'>
                                                        <form action='' method='post'>
                                                        <input type='hidden' name='productId' value='<?php echo" . $row["Id"] . "?>'>
                                                        <button type='submit' name='addToCart' class='btn btn-primary form-control'>Add to cart</button>
                                                        </form>
                                                    </div>
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
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Locations</h3>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-6">
                                    <ul>
                                        <li><a href="https://www.google.it/maps/place/22033+Asso+CO/@45.8625664,9.252113,14z/data=!3m1!4b1!4m5!3m4!1s0x47841e4d12da606f:0x56be7a35673a6fe5!8m2!3d45.8615294!4d9.2696622?hl=it">Asso</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="">Login</a></li>
                                <li><a href="">Signup</a></li>
                                <li><a href="">Help & Support</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>Contact</h3>
                            <ul>
                                <li>Via per caslino 11, Asso</li>
                                <li>Tel. 111 1111 1111 <br> Mail. ecommerce@gmail.com</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
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
        <!-- End Footer Middle -->
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