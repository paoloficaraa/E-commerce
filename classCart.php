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
    private function insertIntoCart($params = null, $table = "cart")
    {
        if ($params != null) {
            $columns = implode(',', array_keys($params));
            $values = implode(',', array_values($params));
            $stmt = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
            $result = $this->conn->query($stmt);
            return $result;
        }
    }

    private function alreadyIn($userId, $productId, $table = "cart")
    {
        $query = "SELECT * FROM $table WHERE userId = $userId";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($productId == $row["productId"])
                    return true;
            }
        }
        return false;
    }

    public function addToCart($userId, $productId, $quantity)
    {
        if (isset($userId) && isset($productId)) {
            if($this->alreadyIn($userId, $productId)){
                $query = "SELECT * FROM cart WHERE userId = $userId AND productId = $productId";
                $result = $this->conn->query($query);
                if($result->num_rows > 0){
                    $product = $result->fetch_assoc();
                    $quantity1 = $product["quantity"];
                    if(isset($quantity)){
                        $newQuantity = $quantity1 + $quantity; 
                    } else {
                        $newQuantity = $quantity1 + 1;
                    }
                    $update = "UPDATE cart SET quantity = $newQuantity WHERE userId = $userId AND productId = $productId";
                    $this->conn->query($update);
                }
            } else {
                if(isset($quantity))
                    $params = array("userId" => $userId, "productId" => $productId, "quantity" => $quantity);
                else 
                    $params = array("userId" => $userId, "productId" => $productId, "quantity" => 1);
                $result = $this->insertIntoCart($params);
            }
            
            if ($result) {
                header("Location:" . $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING']);
            }
        }
    }

    public function deleteProduct($userId, $productId = null, $table = "cart"){
        if($productId != null && isset($userId)){
            $result = $this->conn->query("DELETE FROM $table WHERE productId = $productId AND userId = $userId");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        } else if(!isset($userId) && $productId != null){
            setcookie("item[$productId]", NULL, 0, "/");
            header("Location:" . $_SERVER['PHP_SELF']);
        }
    }
}

include "connection.php";
$Cart = new Cart($conn);
