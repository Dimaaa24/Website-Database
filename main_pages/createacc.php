<?php
include "../include/dbini.php";
include "../include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kristal</title>
    <meta charset="UTF-8">
    <meta name="description" content="Luxury crystals!">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="../css/createacc.css?v=1">
    <link href="https://fonts.cdnfonts.com/css/sansation" rel="stylesheet">

</head>

<body>
    <form action="createacc.php" method="post">
        <div class="table">
            <table>
                <div id="title_style">
                <caption>
                    <h1>
                        Create Account
                    </h1>
                </caption>
                </div>
                <tr>
                    <th id="details">
                        <label for="email"><b>Email:</b></label>
                    </th>
                    <td>
                        <input type="email" name="email" placeholder="example@example.com" required>
                    </td>
                </tr>
                <tr>
                    <th id="details">
                        <label for="user"><b>Username:</b></label>
                    </th>
                    <td>
                        <input type="text" name="user" placeholder="Name123" required>
                    </td>
                </tr>
                <tr>
                    <th id="details">
                        <label for="password"><b>Password:</b></label>
                    </th>
                    <td>
                        <input type="password" name="password" placeholder="example123" required>
                    </td>
                </tr>
                <caption style="caption-side:bottom">
                <input type="submit" name="crt" value="Create Account" onClick="window.location.reload(true)">
                </caption>
                <caption style="caption-side:bottom">
                    <input type="reset">
                </caption>
                <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        if (empty($user) || empty($email) || empty($password)) {
         echo "Invalid Credentials!";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO Users (Username,Email,Password)
                VALUES ('$user','$email','$hash')";
        try {
            mysqli_query($conn, $query);
            ?>
            <caption style="caption-side:bottom" class="error">
            Account created succsesfully!
            </caption>
            <?php
        } catch (mysqli_sql_exception) {
            ?>
            <caption style="caption-side:bottom" class="error">
            User or Email already in use!
            </caption>
            <?php
        }
        }
        mysqli_close($conn);
        }
        ?>
        <caption style="caption-side:bottom" id="login">
        <a href="login.php">
            Already have an account?Log in!
        </a>
        </caption>
            </table>
        </div>
    </form>
    <?php
    include "../include/footer.html";
    ?>
</body>
</html>