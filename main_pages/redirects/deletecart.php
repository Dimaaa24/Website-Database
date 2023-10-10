<?php
include "../../include/dbini.php";
session_start();
$user=$_SESSION["username"];
$query="DELETE FROM Cart
WHERE User='$user'";
mysqli_query($conn,$query);
include "redirect.php";
?>
