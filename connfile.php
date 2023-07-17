<?php
$mysql_hostname = "127.0.0.1";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "bankingdata";
//create DB
$conn = new  mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database);
//check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

