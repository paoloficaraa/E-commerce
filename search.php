<?php
include "connection.php";
session_start();

if(isset($_GET["product"])){
    $result = $conn->query("SELECT Id FROM products WHERE products.Name LIKE '" . $_GET["product"] . "'");
    if($result->num_rows > 0){
        header("location:product.php?Id=" . $result->fetch_assoc()["Id"]);
    }
} else {
    header("location:index.php?mess=error");
}
?>