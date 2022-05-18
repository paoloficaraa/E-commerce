<?php
include "connection.php";
session_start();

if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["quantity"]) && isset($_POST["thumbnail"]) && isset($_POST["category"])){
    $stmt = $conn->prepare("INSERT INTO products (Name, Description, Price, Quantity, thumbnail) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiis", $_POST["name"], $_POST["description"], $_POST["price"], $_POST["quantity"], $_POST["thumbnail"]);
    if($stmt->execute() === true){
        $result = $conn->query("SELECT Id FROM products ORDER BY Id DESC LIMIT 1");
        $productId = $result->fetch_assoc()["Id"];
        $stmtCategory = $conn->prepare("INSERT INTO product_categories (productId, categoryId) VALUES (?, ?)");
        $stmtCategory->bind_param("ii", $productId, $_POST["category"]);
        if($stmtCategory->execute() == true){
            header("location:index.php?mess=product added");
        }
    }
} else {
    header("location:insertProduct.php?mess=error");
}
?>