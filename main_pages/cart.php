<?php
include "../include/header.php";
include "../include/dbini.php";
session_start();
$user=$_SESSION["username"];
$query="SELECT * FROM Cart WHERE User='$user'";
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
            <th>
                <b>
                Price
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
                    echo $res["Quantity"];
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
if($ct!=0)
{
echo "<tr>";
    echo "<th>";    
    echo "<b>Total:</b>";
     echo $total." $";
    echo "</th>";
    echo "<td>";
    ?>
    <a href="redirects/createorder.php">
        <button>Order</button>
    </a>
</td>
<td>
    <a href="redirects/deletecart.php">
        <button>DeleteAll</button>
    </a>
    <?php
    echo "</td>";
echo "</table>";
}
}
else
{
    echo "No items in cart!";
}
include "../include/footer.html";
?>