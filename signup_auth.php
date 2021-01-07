<?php 
    require 'database/connection.php';
        if(isset($_POST['signup'])){

            $email = $_POST['email'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $sql="INSERT into users (email, name, password) values ('$email', '$name', '$password')";
            if($conn->query($sql) === TRUE){
                          header( "refresh:1; url=index.php" );
                         
                          echo ("Created successfully. Please login to continue.!!");;

                        }else{
                            header('location:signup.php');

                        }
                    }
?>