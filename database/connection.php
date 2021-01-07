<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "friend_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>