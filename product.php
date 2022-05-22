<?php
session_start();
require_once("connection.php");
require_once "classCart.php";
ob_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["btnAddToCart"]))
        $Cart->addToCart($_SESSION["userId"], $_POST["productId"], $_POST["quantity"]);
    if (isset($_POST["btnDeleteItem"])) {
        $conn->query("DELETE FROM products WHERE Id = " . $_POST["productId"]);
    }
    if (isset($_POST["btnSave"])) {
        header("Location:" . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']);
    }
}

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Product</title>
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
                                        <a class=" dd-menu collapsed" href="index.php" data-bs-toggle="collapse" data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="category.php" aria-label="Toggle navigation">Categories</a>
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
                            <div class="button">
                                <a href="cart.php" class="navbar-brand">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </a>

                                <!-- <a href="wishList.php" class="navbar-brand">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                    </svg>
                                </a> -->
                            </div>
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
                        <h1 class="page-title">Pricing Table</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.php">Home</a></li>
                        <li>Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start product Table Area -->
    <section class="py-3">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".4s">
                <div class="col-sm-6">
                    <?php
                    $query = "SELECT * FROM products WHERE Id = " . $_GET["Id"];
                    $result = $conn->query($query);
                    $record;
                    if ($result->num_rows > 0) {
                        $record = $result->fetch_assoc();
                        $thumbnail = $record["thumbnail"];
                        $name = $record["Name"];
                        echo "<img src='$thumbnail' class='img-fluid'>";
                    }
                    ?>
                </div>
                <div class="col-sm-6 py-5">
                    <?php if (isset($_SESSION["userId"])) {
                        echo "<form action='product.php?Id=" . $_GET["Id"] . "' method='post'>";
                    } ?>
                    <h4 class="font-baloo font-size-20">
                        <?php if ($result->num_rows > 0) echo $name; ?>
                    </h4>
                    <small>by Jean Monnet</small>
                    <hr class="m-0">

                    <table class="my-3">
                        <tr class="font-rale font-size-14">
                            <td>Deal price:</td>
                            <td class="font-size-20 text-danger">ple <span><?php echo $record["Price"] ?></span></td>
                        </tr>
                        <tr class="font-size-14">
                            <label for="quantity">Quantity</label>
                            <?php
                            if (isset($_SESSION["username"]) && $_SESSION["username"] == "admin") {
                                echo "<input type='number' id='updateQuantity' data-id='" . $record["Id"] . "' class='form-control w-25'>";
                            } else {
                                $select = "<select name='quantity' id='selectedQuantity' class='w-25 form-select'>";
                                if ($record["Quantity"] > 0) {
                                    $select .= "<option selected value='1'>1</option>";
                                    if ($record["Quantity"] > 1) {
                                        for ($i = 2; $i <= $record["Quantity"]; $i++) {
                                            $select .= "<option value='$i'>$i</option>";
                                        }
                                    }
                                }
                                $select .= "</select>";
                                echo $select;
                            }
                            ?>

                        </tr>
                        <tr class="font-baloo font-size-18">
                            <td>
                                <h6>Description</h6>
                                <?php echo "<p>" . $record["Description"] . "</p>"; ?>
                            </td>
                        </tr>
                    </table>
                    <center>
                        <div class="form w-50 pt-4 font-size-16 font-baloo">
                            <div class="col">
                                <?php
                                if (isset($_SESSION["username"]) && $_SESSION["username"] != "admin") {
                                    echo "<button type='submit' name='btnBuyNow' class='btn btn-dark form-control'>Buy now</button>";
                                } else {
                                    echo "<button type='submit' name='btnSave' class='btn btn-dark form-control'>Save</button>";
                                }
                                ?>
                                <br>
                                <br>
                                <input type='hidden' name='productId' value='<?php echo $record["Id"]; ?>'>
                                <?php
                                if (isset($_SESSION["userId"])) {
                                    if (isset($_SESSION["username"]) && $_SESSION["username"] == "admin") {
                                        echo "<button type='submit' name='btnDeleteItem' class='btn btn-danger form-control'>Delete</button>";
                                    } else {
                                        echo "<button type='submit' name='btnAddToCart' class='btn btn-primary form-control'>Add to cart</button>";
                                    }
                                } else
                                    echo "<button id='" . $record["Id"] . "' class='btn btn-primary form-control'>Add to cart</button>"; ?>
                            </div>
                        </div>
                    </center>
                    <?php if (isset($_SESSION["userId"])) echo "</form>"; ?>
                </div>
            </div>
        </div>
    </section>
    <!--/ End product Table Area -->

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