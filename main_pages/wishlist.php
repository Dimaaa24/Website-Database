<?php
include "../include/header.php";
include "../include/dbini.php";
session_start();
$user=$_SESSION["username"];
$query="SELECT * FROM Wishlist WHERE User='$user'";
$result=mysqli_query($conn,$query);
$ct=mysqli_num_rows($result);
$total=0;
if($ct!=0)
{
?>
<table>
<tr>
            <th>
                <b>
                Item
                </b>
            </th>
            <th>
                <b>
                Quantity
                </b>
            </th>
        </tr>
<?php
while($ct>0)
{
    $res=mysqli_fetch_assoc($result);
    ?>
        <tr>
            <td>
                <b>
                    <?php
                    echo $res["Item_name"];
                    ?>
                </b>
            </td>
            <td>
                <b>
                <?php
                    echo $res["Price"]." $";
                    ?>
                </b>
            </td>
        </tr>
    <?php
    $total=$total+$res["Price"];
    $ct--;
}
$result=mysqli_query($conn,$query);
$ct=mysqli_num_rows($result);
?>
<tr>
    <td>
    <a href="redirects/deletewishlist.php">
        <button>DeleteAll</button>
    </a>
    </td>
</tr>
<?php
echo "</table>";
}
else
{
    echo "No items in wishlist!";
}
include "../include/footer.html";
?>