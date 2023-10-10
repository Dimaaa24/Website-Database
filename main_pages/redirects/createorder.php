<?php
include "../../include/dbini.php";
session_start();
$user = $_SESSION["username"];
$query = "SELECT * FROM Cart
         WHERE User='$user'";
$result = mysqli_query($conn, $query);
$ct = mysqli_num_rows($result);
$total = 0;
$items = "";
while ($ct > 0) {
    $res = mysqli_fetch_assoc($result);
    $total = $total + $res["Price"];
    $item = $res["Item_name"] . " x " . $res["Quantity"] . "<br>";
    $items = $items . $item;
    $ct--;
}
$rand = $total * 11.5;
$query1 = "INSERT INTO Orders (Id,User,Items,total) 
        VALUES ($rand,'$user','$items',$total)";
$query2 = "DELETE FROM Cart WHERE User='$user'";
$res1=mysqli_query($conn, $query1);
$res2=mysqli_query($conn, $query2);
include "redirect.php";
?>
