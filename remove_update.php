<?php
session_start();
require 'database/connection.php';
$user_id=$_SESSION['id'];
$sql = "DELETE FROM updates WHERE id=' ". $_GET["id"] ."' && user_id ='$user_id'";
if (mysqli_query($conn, $sql)) {
	header('Location:profile.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>