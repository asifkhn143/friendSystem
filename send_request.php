<?php
session_start(); 
require 'database/connection.php';
	if(isset($_POST['request'])){
		$sid = $_SESSION['id'];
		$rid = $_POST['req_id'];
		$name = $_POST['name'];
		$check_data = mysqli_query($conn, "SELECT req_id FROM friend_requests where (
			(sender='$sid' && receiver='$rid' || sender='$rid' && receiver='$sid') &&
			(status='pending' || status='accepted'))");
		if(mysqli_num_rows($check_data) > 0){
			$error= 'You have already requested to '.'<b>'.$name .'</b>'.' or got request by this person or you both are friends.';
			header( "location:friends.php?error=".$error );
}else{
        $sql="INSERT INTO friend_requests (sender, receiver) VALUES ('$sid', '$rid')";
		if ($conn->query($sql) === TRUE) {
			$msg = 'You have requested to '.'<b>'.$name.'</b>';
			header( "location:friends.php?msg=".$msg);
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:friends.php?error=".$error );
		}
		$conn->close();
	}
}
?>