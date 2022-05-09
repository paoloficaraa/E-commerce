<?php
include "connection.php";
session_start();

if (isset($_SESSION["cart"])) {
    $insertOrder = $conn->prepare("INSERT INTO order_details (UserId, Total) VALUES (?, ?)");
    if(isset($_SESSION["userId"]))
        $userId = $_SESSION["userId"];
    else
        $userId = 0;
    $total = $_POST["total"];
    $insertOrder->bind_param("si", $userId, $total);

    // if ($insertOrder->execute() === true) {
    //     $query = "SELECT LAST(Id) FROM order_details";
    //     $result = $conn->query($query);
    //     $id = 0;
    //     if ($result->num_rows > 0) {
    //         $id = $result->fetch_assoc();
    //         foreach ($_SESSION["cart"] as $value) {
    //             $insertOrder2 = $conn->prepare("INSERT INTO order_items (OrderId, productId, quantity)");
    //             $insertOrder2->bind_param("iii", $id, $value["productId"], $value["quantity"]);
    //             if ($insertOrder2->execute() === true) {
    //                 header("location:index.php?mess=the order has been successfully");
    //             } else {
    //                 echo "<script>alert('error order 2');</script>";
    //             }
    //         }
    //     } else {
    //         echo "<script>alert('error id');</script>";
    //     }
    // } else {
    //     echo "<script>alert('error order 1');</script>";
    // }
} else {
    echo "<script>alert('error');</script>";
}
