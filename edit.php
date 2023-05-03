<?php


include 'connect.php';
$id=$_GET['editid'];
$sql="Select * from `crud` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

$fname=$row['fname'];
$lname=$row['lname'];
$email=$row['email'];
$password=$row['password'];

if (isset($_POST['submit'])){
  $fname = $_POST['firstname'];
  $lname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "update `crud` set id=$id,fname='$fname',lname='$lname',email='$email',password='$password' where id=$id";
  $result = mysqli_query($conn, $sql);

  if($result){
    // echo "Updated successfully";
    header('location:display.php');
  } else {
    die(mysqli_error($conn));
  }
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container my-5">
       <form method="post">
            <div class="form-group my-2">
              <label>First name</label>
              <input type="text" class="form-control" placeholder="Enter your first name" name="firstname" autocomplete="off" 
                value=<?php
                echo $fname;
                ?>
              >
            </div>

            <div class="form-group my-2">
              <label>Last name</label>
              <input type="text" class="form-control" placeholder="Enter your last name" name="lastname" autocomplete="off"
              value=<?php
                echo $lname;
                ?>
              >
            </div>

            <div class="form-group my-2">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off"
              value=<?php
                echo $email;
                ?>
              >
            </div>

            <div class="form-group my-2">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Enter your password" name="password" autocomplete="off"
              value=<?php
                echo $password;
                ?>
              >
            </div>

          <button type="submit" class="btn btn-primary mt-2" name="submit">Update</button>
       </form>
    </div>



  </body>
</html>
