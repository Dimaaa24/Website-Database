<?php
$path = $_SERVER['PHP_SELF'];
$path = basename($path, ".php");
$query = "SELECT * FROM Items WHERE Item_name='$path'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $res = mysqli_fetch_assoc($result);
?>
    <table>
        <tr>
            <th>
                <?php
                echo "<img src=" . $res["Pic_Path"] . " width=125 height=200>";
                ?>
            </th>
        </tr>
        <tr>
            <th>
                <h1>
                    <b>
                        <?php
                        echo $res["Item_name"];
                        ?>
                    </b>
                </h1>
            </th>
        </tr>
        <tr>
            <th>
                <h2>
                    <b>
                        <?php
                        echo $res["Price"] . " $";
                        ?>
                    </b>
                </h2>
            </th>
        </tr>
        <tr>
            <th>
                <p>
                    <?php
                    echo $res["Description"];
                    ?>
                </p>
            </th>
        </tr>
    </table>
<?php
}
$path = $path . ".php";
$path = "../crystals/".$path;
echo "<br>";
if ($_SESSION["username"] != "") {
    echo "<form action='" . $path . "' method=POST >";
?>
    <table>
        <tr>
            <th>
                <label name="quantity">Choose how many items to add to cart:</label>
            </th>
            <td>
                <input type="number" id="quantity" name="quantity" min="1" max="10">
            </td>
        </tr>
        <tr>
            <th>
                <input type="submit" value="Add" onClick="window.location.reload(true)">
            </th>
        </tr>
    </table>
    </form>
    <?php
    echo "<form action='" . $path . "' method=POST >";
    ?>
    <table>
        <tr>
            <th>
                <input type="submit" value="Add to Wishlist" name="wishlist">
            </th>
        </tr>
        <tr>
            <th>
                <input type="button" onclick="location.href='../main_pages/Items.php';" value="Back" />
            </th>
        </tr>
        </table>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["wishlist"])) 
        {
            $name = $res["Item_name"];
            $price = $res["Price"];
            $user = $_SESSION["username"];
            $query = "INSERT INTO Wishlist (User,Item_name,Price)
        VALUES ('$user','$name',$price)";
            try {
                mysqli_query($conn, $query);
                echo "Item added to the wishlist!";
            } catch (mysqli_sql_exception) {
                echo "Something went wrong!";
            }
        }
        else
        {
        $name = $res["Item_name"];
        $quantity = $_POST["quantity"];
        $user = $_SESSION["username"];
        $price = $res["Price"];
        $price = $price * $quantity;
        $query = "INSERT INTO Cart (User,Item_name,Quantity,Price)
            VALUES ('$user','$name',$quantity,$price)";
        try {
            mysqli_query($conn, $query);
            echo "Item added to cart!Total:" . $price . " $";
            header('Location:../main_pages/Items.php');
        } catch (mysqli_sql_exception) {
            echo "Something went wrong!";
        }
        }
    }
}
echo "<br>";
include "../include/backbutton.html";
    ?>
    <br>