<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kristal</title>
    <meta charset="UTF-8">
    <meta name="description" content="Luxury crystals!">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css?v=1">
    <link href="https://fonts.cdnfonts.com/css/sansation" rel="stylesheet">
    <link rel="stylesheet" href="../css/footer.css?v=1">
</head>

<body>
    <header>
        <div class="head">
            <div class="main_img">
                <a href="main.php">
                    <img src="../images/logo.png" width=300 height=150>
                </a>
            </div>
            <div class="navmenu">
            <a href="../main_pages/items.php">
                Collection
            </a>
            <a href="../main_pages/cart.php">
                Cart
            </a>
            <a href="../main_pages/wishlist.php">
                Wishlist
            </a>
            <?php
            if ($_SESSION["username"] == "") {
                echo "<th> <a href=" . "../main_pages/login.php" . ">Login</a> </th>";
            ?>
            <?php
            } else {
            ?>
                <div class="profile">
                <a href="../main_pages/profile.php"><?php
                echo $_SESSION["username"];
                ?></a>
                <div class="logout">
                <a href="../main_pages/profile.php">Profile</a>
                <a href="../main_pages/orders.php">Orders</a>
                <a href="../main_pages/redirects/logout.php">LogOut</a>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
    </header>
</body>
</html>