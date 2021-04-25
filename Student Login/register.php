<?php 

$Unique_ID = $SSignUpPassword = $SSignUpconfirm_password = "";
$Unique_ID_err = $SSignUpPassword_err = $SSignUpconfirm_password_err = "";

if (isset($_POST['StudentSignUp'])){

        $sql = "SELECT `password` FROM `stud_users` WHERE Unique_ID = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $ID);

            $ID = trim($_POST['uniqueId']);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt, $pass);
                mysqli_stmt_fetch($stmt);
                if($pass != NULL)
                {
                  ?>
                  <script>
                    if (confirm("~~~~~~~~~~~~Student ID Already exist!!~~~~~~~~~~~~\n Login Instead")) {
                      location.replace("index.php");
                    }
                    else{
                      location.replace("index.php");
                    }
                  </script>
                  <?php 
                  exit();
                }
                else 
                  $Unique_ID = trim($_POST['uniqueId']);
            }
        }
        mysqli_stmt_close($stmt);


    if(strlen(trim($_POST['password'])) < 7){
      ?>
      <script>alert("~~~~~~~~~~~~ Weak Password!! ~~~~~~~~~~~~\n Enter more than 7 characters !!");</script>
      <?php
      $SSignUpPassword_err = "true";
    }
    else{
        $SSignUpPassword = trim($_POST['password']);
    }

    if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
      ?>
      <script>alert("~~~~~~~~~~~~ Wrong Match!! ~~~~~~~~~~~~\n New Password and Confirm password must be same.");</script>
      <?php
      $SSignUpconfirm_password_err = "true";
    }


    if(empty($Unique_ID_err) && empty($SSignUpPassword_err) && empty($SSignUpconfirm_password_err))
    {
        $sql = "UPDATE `stud_users` SET `password`=(?) WHERE Unique_ID = '$Unique_ID'";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $pass);

            $pass = password_hash($SSignUpPassword, PASSWORD_DEFAULT);
            $exe = mysqli_stmt_execute($stmt);
            if(!mysqli_stmt_affected_rows($stmt)){
              ?>
              <script>confirm("~~~~~~~~~~~~ Sorry ~~~~~~~~~~~~\n You are not allowed to Sign Up \n Since Your Student ID is Not Created Yet!!");</script> 
            <?php
            }
            else if ($exe)
            {
              ?>
              <script>confirm("~~~~~~~~~~~~ Thank You ~~~~~~~~~~~~\n We are Glad You joined us!! Account Created Sucessfully\nPlease Log into your Account, to get started!!");</script> 
            <?php
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}

?>

<!-- <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Student Registration Page</title>
  </head>
  <body>
    <div class="container">
    <h2>Student Register Page:</h2>
      <form action="" method="post">
        <div class="mb-3">
          <label for="Uid" class="form-label">Unique ID:</label>
          <input type="text" name="uniqueId" class="form-control" placeholder="Enter Student Unique ID" required>
        </div>
        <?php if($Unique_ID_err){ ?>
          <div class="d-flex justify-content-around">
            <div class="alert alert-warning alert-dismissible fade show col-9" role="alert">
              <strong>Unique ID, Already has an Account!!<strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <a href="login.php" role="button" class="btn btn-primary col btn-lg">Login</a>
          </div>
        <?php }?>
        <div class="mb-3">
          <label for="pwd" class="form-label">Password:</label>
          <input type="password" name="password" class="form-control" placeholder="Enter New Password" required>
        </div>
        <?php if($SSignUpPassword_err){ ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Enter more than 7 characters!!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>
        <div class="mb-3">
          <label for="pwd" class="form-label">Confirm Password:</label>
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
        </div>
        <?php if($SSignUpconfirm_password_err){ ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Wrong Match!!</strong> New Password and Confirm password must be same.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>
        <div class="form-row">
          <div class="form-group col col-md-2">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
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