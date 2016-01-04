<?php 

$usename="root";
$password="";
$databaseName="wordpress";
$server="localhost";


$db_connection=mysql_connect($server,$usename,$password);

if (!$db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

mysql_select_db($databaseName);





 ?>