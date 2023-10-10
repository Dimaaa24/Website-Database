<?php
include "../include/header.php";
include "../include/dbini.php";
session_start();
$name = $_SESSION["username"];
$query = "SELECT * FROM Users WHERE Username='$name'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $res = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kristal</title>
    <meta charset="UTF-8">
    <meta name="description" content="Luxury crystals!">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css?v=2">
    <link href="https://fonts.cdnfonts.com/css/sansation" rel="stylesheet">
</head>

<body>
    <div class="main">
        <img src="../images/profile.png" width=150 height=150 id="img">
        
        <a href="updatepassword.php">
            <button>Change Password</button>
        </a>
        <br>
        <a href="orders.php">
            <button>Orders</button>
        </a>
    </div>
    <?php
    mysqli_close($conn);
    include "../include/footer.html";
    ?>
</body>
</html>