<?php
 include "../include/dbini.php";
 include "../include/header.php";
 session_start();
?>

<!DOCTYPE html>
<head>
    <title>Kristal</title>
    <meta charset="UTF-8">
    <meta name="description" content="Luxury crystals!">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css?v=2">
    <link href="https://fonts.cdnfonts.com/css/sansation" rel="stylesheet">

</head>
<body>
    <form action="login.php" method="post">
        <div class="table">
        <table>
            <caption>
                <h1>
                LogIn
                </h1>
            </caption>
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
            <input type="submit" name="crt"  value="Log In" onClick="window.location.reload(true)">
            </caption>
            <caption style="caption-side:bottom">
            <input type="reset">
            </caption>
             <caption style="caption-side:bottom" id="create">
            <a href="createacc.php">Don't have an account?</a>
            </caption>
            <?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $user=$_POST['user'];
    $pass=$_POST['password'];
    $query="SELECT * FROM Users
            WHERE Username='$user'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
        $hash=mysqli_fetch_assoc($result);
        if(password_verify($pass,$hash["Password"]))
        {
            echo "Logged in!";
            $_SESSION["username"]=$hash["Username"];
            $_SESSION["Password"]=$hash["Password"];
            header("Location: main.php");
            die();
        }
        else
        {
            ?>
            <caption style="caption-side:bottom" id="error">
            Wrong password!
            </caption>
            <?php
        }

        }
        else
        {
            ?>
            <caption style="caption-side:bottom" id="error">
            User not found!
            </caption>
            <?php
        }

        }
        ?>
        </table>
        </div>
    </form>
    <?php
    mysqli_close($conn);
    include "../include/footer.html";
    ?>
</body>