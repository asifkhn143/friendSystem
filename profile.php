<?php
session_start();
include "database/connection.php";
if(!isset($_SESSION['id'])){
header('location:index.php');
}else{
  $sql="select updates.*, users.name from updates, users where updates.user_id=users.id LIMIT 20";
      $result = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Friend System | <?php echo $_SESSION['name']; ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="cssfiles/profile.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="body">
  
<nav class="navbar navbar-expand-md bg-secondary navbar-dark">
<div class="container">
<a class="navbar-brand" href="profile.php"><h3>FriendSystem </h3> </a>
<span class="fa fa-user" style="font-size: 1.5em;"> <?php echo $_SESSION['name']; ?></span> 

    <ul class="navbar-nav ml-auto">
      <li class="nav-item mb-2">
        <a href="friends.php" class="btn btn-info">Friends</a>
      </li>
      <li class="nav-item">
        <a href="logout.php" class="btn btn-danger" >Logout</a>
      </li>
    </ul>
    <style>
      .nav-item{
        padding-left: 20px;
      }
    </style>
 </div>   
</nav>

<div class="container">
  <div class="row">
  <div class="col-md-6">
    <h3 class="mt-3 mb-3"><u>Post a new Update</u></h3>
    <form action="updates_save.php" method="post" class="pull-left">
       <textarea  rows="8" cols="50" name="comment" placeholder="Type your update here..." required="" class="form-control"></textarea><br>
        <input type="submit" name="submit" class="btn btn-info pull-right">
    </form>
   </div>

    <div class="col-md-6 mb-5">
      <h3 class="mt-3 mb-3"><u>Updates</u></h3>
     <?php while($row = mysqli_fetch_array($result)) { ?>
      <div class="card mb-1"> 
        <div class="card-header">Update from <b><?php echo $row["name"]; ?></b>
        </div>
        <div class="card-body"><?php echo $row["comment"];?>
          <?php if ($_SESSION['id']==$row['user_id']) { ?>
          <a href="remove_update.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger float-right">Delete</a>
          <?php }  else { ?>
            
          <?php } ?>
        </div>
      </div>
   <?php } ?>
  </div>

  </div>
</div>

</body>
</html>

