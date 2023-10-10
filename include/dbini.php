<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "Kristal";
   try{
   $conn=mysqli_connect($servername,$username,$password,$dbname);
   }
   catch(mysqli_sql_exception)
   {
    echo "No connection!";
   }
?>