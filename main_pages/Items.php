<?php
include "../include/header.php";
include "../include/dbini.php";
session_start();
?>
<table>
        <?php
        $query="SELECT * FROM Items";
        $result=mysqli_query($conn,$query);
        $ct=mysqli_num_rows($result);
        echo "<tr>";
        while($ct>0)
        {
            $row=mysqli_fetch_assoc($result);
            $image=$row["Pic_Path"];
            $name=$row["Item_name"];
            echo "<th>";
            echo "<a href='../crystals/".$name.".php'>";
             echo "<img src=".$image." width='40' height='100'>";
            echo "</a>";
            echo "</th>";
            $ct--;
        }
        echo "</tr>";
        $result=mysqli_query($conn,$query);
        $ct=mysqli_num_rows($result);
        echo "<tr>";
        while($ct>0)
        {
            $row=mysqli_fetch_assoc($result);
            $name=$row["Item_name"];
            echo "<th>";
             echo $name;
            echo "</th>";
            $ct--;
        }
        echo "</tr>";
        ?>
</table>
<?php
include "../include/footer.html";
mysqli_close($conn);
?>
