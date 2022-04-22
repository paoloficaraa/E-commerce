<?php
include "connection.php";
session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
    $query = "SELECT * FROM users WHERE Username LIKE '" . $_POST["username"] . "'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        $array = $result->fetch_assoc();
        if($array["Username"] == $_POST["username"] && $array["Password"] == md5($_POST["password"])){
            $_SESSION["userId"] = $array["Id"];
            $_SESSION["username"] = $array["Username"];
            $_SESSION["password"] = $array["Password"];
            header("location:index.php?user=" . $array["Username"]);
        } else {
            header("location:login.php?mess=Errore login");
        }
    } else {
        header("location:404.html");
    }
    $conn->close();
} else {
    header("location:login.php?mess=Insert username and password");
}

?>