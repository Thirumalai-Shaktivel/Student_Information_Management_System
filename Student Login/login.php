<?php

@session_start();
if(isset($_SESSION['uniqueId']))
{
  header("location: Student Login/HomePage.php");
  exit;
}

$Unique_ID = $SLoginpassword = "";

if(isset($_POST['StudentLogin'])){
    $Unique_ID = trim($_POST['uniqueId']);
    $SLoginpassword = trim($_POST['password']);

    $sql = "SELECT `Unique_ID`, `password` FROM stud_users WHERE Unique_ID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $SID);
    $SID = $Unique_ID;
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)){
            mysqli_stmt_bind_result($stmt, $Unique_ID, $hashed_password);
            if(mysqli_stmt_fetch($stmt))
            {
                if(password_verify($SLoginpassword, $hashed_password))
                {
                  session_start();
                  $_SESSION["uniqueId"] = $Unique_ID;
                  $_SESSION["Sloggedin"] = true;

                  header("location: Student Login/HomePage.php");
                }
                else{
                  ?>
                  <script>confirm("Wrong Password!!\nCheck the Password Correctly and Re-enter again.");</script> 
                <?php
                }
            }
        }
        else{
          ?>
          <script>confirm("~~~~~~~~~~~~No such User Available!!~~~~~~~~~~~~\nNot an User? Create your Account By clicking Sign Up Button");</script> 
          <?php
        }
    }
}


?>

<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <title>Student Login Page</title>
  </head>
  <body>
    <div class="container">
    <h2>Student Login Page:</h2>
      <form action="" method="post">
        <div class="form-group">
          <label for="Uid">Unique ID:</label>
          <input type="text" name="uniqueId" class="form-control" placeholder="Enter Student Unique ID" required>
        </div>
        <?php if($WrongUser){ ?>
          <div class="d-flex justify-content-around">
            <div class="alert alert-warning alert-dismissible fade show col-9    d-flex justify-content-between" role="alert">
              <div><strong>No such User Available!!</strong></div>
              <div>Not an User?</div>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div>
              <a href="register.php" role="button" class="btn btn-outline-success btn-lg col">Sign Up</a>
            </div>
          </div>
        <?php }?>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
        </div>
        <?php if($wrongPass){ ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Wrong Password!!</strong> Check the Password Correctly and Re-enter again.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>
        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" id="SaveLogin" checked>
          <label class="form-check-label" for="SaveLogin">
            Remember me
          </label>
        </div>
        <div class="form-row">
          <div class="form-group col col-md-2">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <div class="form-group col col-md-2">
            <a href="../select.html" role="button" class="btn btn-outline-danger btn-block">Cancel</a>
          </div>
        </div>
        
      </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html> -->