<?php
class Cart
{
    public $conn = null;

    public function __construct($conn)
    {
        if (!isset($conn)) return null;
        $this->conn = $conn;
    }
    //insert into cart
    public function insertIntoCart($params = null, $table = "cart")
    {
        if ($params != null) {
            $columns = implode(',', array_keys($params));
            $values = implode(',', array_values($params));
            $stmt = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
            $result = $this->conn->query($stmt);
            return $result;
        }
    }

    public function addToCart($userId, $productId, $quantity)
    {
        if (isset($userId) && isset($productId)) {
            if(isset($quantity))
                $params = array("userId" => $userId, "productId" => $productId, "quantity" => $quantity);
            else 
                $params = array("userId" => $userId, "productId" => $productId, "quantity" => 1);
        } else if(!isset($userId)){
            if(isset($quantity))
                $_SESSION["cart"][] = array("productId" => $productId, "quantity" => $quantity);
            else
                $_SESSION["cart"][] = array("productId" => $productId, "quantity" => 1);
        }

        $result = $this->insertIntoCart($params);
        if ($result) {
            header("Location:" . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']);
        }
    }
}

include "connection.php";
$Cart = new Cart($conn);
