  <?php
    require 'database/connection.php';
    session_start();
    $req_id=$_GET['req_id'];
	$status = "accepted";
	$sql = "update friend_requests SET status = '$status' WHERE req_id = '$req_id'";
    if (mysqli_query($conn, $sql)) {
	$msg="You have accepted the request.";
	header("location:friends.php?msg=".$msg );
    } else {
    $error= "Error changing status: " . mysqli_error($conn);
    header("location:friends.php?error=".$error );
    }
    mysqli_close($conn);
?>