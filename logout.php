<?php
session_start();
unset($_SESSION["userId"]);
unset($_SESSION["username"]);
unset($_SESSION["password"]);
//echo "fatto";
header("location:index.php");
?>