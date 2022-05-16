<?php
include "connection.php";
//session_start();

if(isset($_POST["username"]) && isset($_POST["password"])){
    if($_POST["username"] == "admin"){
        echo "<script>alert('Username not valid')</script>";
        header("location:registration.php");
    }
    $query = "SELECT * FROM users WHERE Username LIKE '" . $_POST["username"] . "'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        //ob_start();
        //echo "esiste di già";
        header("location:registration.php?mess=username already exists", true);
        //echo "<script>window.top.location='registration.php?mess=username already exists'</script>";
        //ob_end_flush();
    } else {
        if($_POST["username"] == "admin"){
            header("location:registration.php?error=username not valid");
        }
        $stmt = $conn->prepare("INSERT INTO users (Username, Password) VALUES (?, ?)");
        $password = md5($_POST["password"]);
        $stmt->bind_param("ss", $_POST["username"], $password);
        if($stmt->execute() === true){
            header("location:login.php?mess=registration was successfull", true);
            //ob_end_flush();
        } else {
            echo "no";
            echo "%d row inserted.\n", $stmt->affected_rows;
            echo "<form action='registration.php?error=registration error' method='get'>
                <input type='submit' value='go'>
            </form>";
            //header("registration.php?mess=registration error", true);   
        }
    }
    $conn->close();
}
?>