<?php
include "connection.php";

if (isset($_POST["itemid"])) {
    $query = "SELECT * FROM products WHERE Id = " . $_POST["itemid"];
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        echo json_encode($product);
    }
} else {
    echo "no";
}
