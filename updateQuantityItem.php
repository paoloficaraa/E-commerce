<?php
include "connection.php";
session_start();

if(isset($_POST["itemid"]) && isset($_POST["quantity"])){
    $result = $conn->query("UPDATE products SET Quantity = " . $_POST["quantity"] . " WHERE Id = " . $_POST["itemid"]);
    if($result){
        echo json_encode("{'status': 'ok'}");
    } else {
        echo json_encode("{'status': 'error'}");
    }
}