<?php
include "../include/header.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Kristal</title>
    <meta charset="UTF-8">
    <meta name="description" content="Luxury crystals!">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="../css/main2.css?v=1">
    <link href="https://fonts.cdnfonts.com/css/sansation" rel="stylesheet">
</head>

<body>
    <div class="body">
        <h1 id="text">
            MAIN PAGE
        </h1>

        <br>

        <?php
        if ($_SESSION["username"] == "") {
        ?>
            <a href="createacc.php" id="join">
                <button id="bttn">
                    Join Now!
                </button>
            </a>
        <?php
        }

        ?>
    </div>
    <?php
    include "../include/footer.html";
    ?>
</body>

</html>

<?php
mysqli_close($conn);
?>