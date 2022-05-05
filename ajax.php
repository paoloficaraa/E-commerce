<?php

require_once("connection.php");
$countQuery = "SELECT count(*) AS c FROM products";
$result = $conn->query($countQuery);
$count = 0;
if($result->num_rows > 0){
    $data = $result->fetch_assoc();
    $count = $data["c"];
}

for($i = 0; $i < $count; $i++){
    if(isset($_POST["selectQuantity$i"])){
        $query = "SELECT * FROM products WHERE Id = $i";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            $product = $result->fetch_assoc();
            echo json_encode($product);
        }
    }
}