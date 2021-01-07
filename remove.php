<?php
session_start();
require 'database/connection.php';
    $id=$_GET['req_id'];
	$sql = "DELETE FROM friend_requests WHERE req_id = '$id'";
	if (mysqli_query($conn, $sql)) {
	$msg="You have removed successfully.";
	header("location:friends.php?msg=".$msg );
    } else {
    $error="Error deleting record: " . mysqli_error($conn);
    header("location:friends.php?error=".$error );
    }
    mysqli_close($conn);
?>