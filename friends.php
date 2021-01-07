<?php
session_start();
require 'database/connection.php';
if(!isset($_SESSION['id'])){
header('location:index.php');
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
  
<nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
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
   
  <?php if(isset($_GET['msg'])) { ?>
  <div class="alert alert-success alert-dismissible fade show mt-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
     <?php echo $_GET['msg'];?> 
  </div>
  <?php }?>

<?php if(isset($_GET['error'])) { ?>
  <div class="alert alert-warning alert-dismissible fade show mt-3">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $_GET['error'];?>
  </div>
<?php }?>

  <div class="row">
      
    <div class="col-md-3 mt-3">
      <table class="table table-borderless">
          <h2 class="mb-3"><u>Friend Requests</u></h2>
          <?php $counter=0;
          $id = $_SESSION['id'];
          $sql = "select friend_requests.*, users.* from friend_requests, users where friend_requests.sender=users.id && status='pending' && receiver='$id'";
            $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo ++$counter.'.';?></td>
          <th> <?php echo $row["name"]; ?></th>
          <th><a href="accept.php?req_id=<?php echo $row['req_id'];?>" class="btn btn-success btn-sm">Accept</a></th>
          <th><a href="remove.php?req_id=<?php echo $row['req_id'];?>" class="btn btn-danger btn-sm">Reject</a></th>
        </tr>
        <?php } ?>
      </table>
    </div>

      <div class="col-md-3 mt-3">
        <table class="table table-borderless ">
        <h2 class="mb-3"><u>Friends</u></h2>
            <?php 
            $counter=0;
            $id = $_SESSION['id'];
            $sql = "select friend_requests.*, users.* from friend_requests, users where (friend_requests.receiver=users.id && sender='$id' && status='accepted') || (friend_requests.sender=users.id && receiver='$id' && status='accepted')";
            $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo ++$counter.'.';?></td>
            <th><?php echo $row["name"]; ?></th>
            <td><a href="remove.php?req_id=<?php echo $row['req_id'];?>" class="btn btn-warning btn-sm">Unfriend</a></td>
          </tr>
        <?php } ?>
        </table>
      </div>
      
      <div class="col-md-3 mt-3">
        <table class="table table-borderless">
        <h2 class="mb-3"><u>User List</u></h2>
            <?php $counter=0;
            $sql="select * from users limit 20";
              $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)) { ?>
          <tr>
            <td><?php echo ++$counter.'.';?></td>
            <th><?php echo $row["name"];?></th>
            <?php $req_id= $row['id'];?>
            <?php $name= $row['name'];?>
            <form action="send_request.php" method="post">
              <input type="hidden" name="req_id" value="<?php echo $req_id; ?>">
              <input type="hidden" name="name" value="<?php echo $name; ?>">
              <td>
                <?php if ($_SESSION['id']==$row['id']) { ?>
                  You
                <?php }  else { ?>
                  <input type="submit" name="request" class="btn btn-sm btn-primary" value="Add friend">
                <?php } ?>
              </td>
            </form>
          </tr>
        <?php } ?>
        </table>
      </div>

      <div class="col-md-3 mb-3 mt-3">
        <table class="table table-borderless">
          <h2 class="mb-3"><u>Sent Requests</u></h2>
          <?php $counter=0; 
          $id = $_SESSION['id'];
          $sql = "select friend_requests.*, users.* from friend_requests, users where friend_requests.receiver=users.id && status='pending' && sender='$id'";
            $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo ++$counter.'.';?></td>
          <th><?php echo $row["name"];?></th>
          <td><a href="remove.php?req_id=<?php echo $row['req_id'];?>" class="btn btn-info btn-sm">Cancel</a></td>
        </tr>
        <?php } ?>
      </table>
      </div>



  </div>
</div>
</body>
</html>
