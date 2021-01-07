<?php
include 'connection.php';
session_start();
if (isset($_SESSION['Username'])) {
    unset($_SESSION['Username']);
}

session_destroy();
header('Location:index.php');
?>