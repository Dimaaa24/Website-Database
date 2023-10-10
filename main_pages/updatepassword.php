<?php
include "../include/header.php";
include "../include/dbini.php";
session_start();
?>
<form action="updatepassword.php" method="post">
    <table>
        <tr>
            <th>
                <b>
                    New Password:
                </b>
            </th>
            <td>
                <input type="text" name="newp" placeholder="new_password">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Change">
            </td>
        </tr>
    </table>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $newpass = $_POST["newp"];
    $user=$_SESSION["username"];    
    $hash = password_hash($newpass, PASSWORD_DEFAULT);
    $query="UPDATE Users SET Password = '$hash' WHERE Username = '$user'";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        echo "Password was updated successfully.";
    } else 
    {
        echo "Couldn't change password!";
    }
}
include "../include/footer.html";
?>