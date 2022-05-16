<?php
include "connection.php";
session_start();

if (isset($_SESSION["cart"])) {
    $insertOrder = $conn->prepare("INSERT INTO order_details (UserId, Total) VALUES (?, ?)");
    $userId = 0;
    if(isset($_SESSION["userId"]))
        $userId = $_SESSION["userId"];
    
    if($userId == 0){
        echo "<script>alert('You have to log in');</script>";
        header("location:index.php?mess=error_user");
        exit;
    }

    $total = $_POST["total"];
    $insertOrder->bind_param("si", $userId, $total);

    if ($insertOrder->execute() === true) {
        $query = "SELECT Id FROM order_details ORDER BY Id DESC LIMIT 1;";
        $result = $conn->query($query);
        $id = 0;
        if ($result->num_rows > 0) {
            $id = $result->fetch_assoc()["Id"];
            foreach ($_SESSION["cart"] as $value) {
                $insertOrder2 = $conn->prepare("INSERT INTO order_items (OrderId, productId, quantity) VALUES (?, ?, ?)");
                $insertOrder2->bind_param("iii", $id, $value["productId"], $value["quantity"]);
                if ($insertOrder2->execute() === true) {
                    $conn->query("UPDATE products SET Quantity = Quantity - " . $value["quantity"] . " WHERE Id = " . $value["productId"]);
                    $conn->query("DELETE FROM cart WHERE userId = " . $_SESSION["userId"]);
                    header("location:index.php?mess=the order has been successfully");
                } else {
                    echo "<script>alert('error order 2');</script>";
                }
            }
        } else {
            echo "<script>alert('error id');</script>";
        }
    } else {
        echo "<script>alert('error order 1');</script>";
    }
} else {
    echo "<script>alert('error');</script>";
}
