<?php
include "connection.php";
session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
    $query = "SELECT * FROM users WHERE Username LIKE '" . $_POST["username"] . "'";
    $result = $conn->query($query);

    if($result->num_rows > 0){
        $username = $result->fetch_assoc()["Username"];
        $password = $result->fetch_assoc()["Password"];
        echo $username . " " . $password;
        if($username == $_POST["username"] && $password == md5($_POST["password"])){
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            //header("location:index.php?user=$username");
        } else {
            //header("location:login.php?mess=Errore login");
        }
    } else {
        header("location:404.html");
    }
    $conn->close();
} else {
    header("location:login.php?mess=Insert username and password");
}

?>