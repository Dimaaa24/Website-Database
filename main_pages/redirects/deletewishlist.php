<?php
include "../../include/dbini.php";
session_start();
$user=$_SESSION["username"];
$query="DELETE FROM Wishlist
WHERE User='$user'";
mysqli_query($conn,$query);
include "redirect.php";
?>