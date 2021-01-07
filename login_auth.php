<?php
session_start();
    require 'database/connection.php';
    if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * from users where email='$email' and password='$password'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($result);
    if($rows_fetched==0){
        ?>
        <script>
            window.alert("Wrong email or password!");
        </script>
        <meta http-equiv="refresh" content="1;url=index.php"/>
        <?php
    }else{
        $row=mysqli_fetch_array($result);
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        echo "You are successfully logged in.!!!";
        header( "location:profile.php");
    } 
  }
?>