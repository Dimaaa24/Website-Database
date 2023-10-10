<?php
include "../include/header.php";
include "../include/dbini.php";
session_start();
echo "<h1>ORDERS</h1>";
$user=$_SESSION["username"];
$query="SELECT * FROM Orders WHERE User='$user'";
$result=mysqli_query($conn,$query);
$ct=mysqli_num_rows($result);
if($ct!=0)
{
?>
<table>
    <tr>
        <th>
            <b>
                ID
            </b>
        </th>
        <th>
            <b>
                Date
            </b>
        </th>
        <th>
            <b>
                Items
            </b>
        </th>
        <th>
            <b>
                Total
            </b>
        </th>
    </tr>
<?php
while($ct>0)
{
    echo "<tr>";
        $row=mysqli_fetch_assoc($result);
          $id=$row["Id"];
          $date=$row["Date"];
          $items=$row["Items"];
          $total=$row["total"];
          echo "<td>";
          echo $id;
          echo "</td>";
          echo "<td>";
          echo $date;
          echo "</td>";
          echo "<td>";
          echo $items;
          echo "</td>";
          echo "<td>";
          echo $total." $";
          echo "</td>";
        $ct--;
    echo "</tr>";
}
echo "</table>";
}
else
{
    echo "No orders!";
}
include "../include/footer.html";
?>