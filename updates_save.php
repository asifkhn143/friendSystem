<?php
session_start();
include 'database/connection.php';
if(isset($_POST['submit'])){

$comment=$_POST['comment'];
$user_id=$_SESSION['id'];

$sql = "INSERT INTO updates (user_id, comment) VALUES ('$user_id', '$comment')";
if ($conn->query($sql) === TRUE) {
               echo "Comments done.!!!";
               header( "location:profile.php");
            } else {
               $error= "Error: " . $sql . "<br>" . $conn->error;
                }
        $conn->close();
    }
?>
     