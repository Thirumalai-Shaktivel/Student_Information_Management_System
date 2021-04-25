<?php 

$TSignUpUser = $TSignUpPassword = $TSignUpconfirm_password = "";
$TSignUpUser_err = $TSignUpPassword_err = $TSignUpconfirm_password_err = "";

if (isset($_POST['TeacherSignUp'])){

    $sql = "SELECT id FROM 	teacher_user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $User);

        $User = trim($_POST['username']);

        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt))
            {
              ?>
              <script>alert("~~~~~~~~~~~~Username Already exist!!~~~~~~~~~~~~\n Login Instead");</script>
              <?php 
              $TSignUpUser_err = "exist";
            }
            else{
              $TSignUpUser = trim($_POST['username']);
            } 
        }
    }
    mysqli_stmt_close($stmt);
      
    if(strlen(trim($_POST['password'])) < 7){
      ?>
      <script>alert("~~~~~~~~~~~~ Weak Password!! ~~~~~~~~~~~~\n Enter more than 7 characters !!");</script>
      <?php
      $TSignUpPassword_err = "Warning";
    }
    else{
        $TSignUpPassword = trim($_POST['password']);
    }

    if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
      ?>
      <script>alert("~~~~~~~~~~~~ Wrong Match!! ~~~~~~~~~~~~\n New Password and Confirm password must be same.");</script>
      <?php
      $TSignUpconfirm_password_err = "Wrong";
    }

    if(empty($TSignUpUser_err) && empty($TSignUpPassword_err) && empty($TSignUpconfirm_password_err))
    {
        $sql = "INSERT INTO teacher_user (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt)
        {
          mysqli_stmt_bind_param($stmt, "ss", $User, $pass);

          $User = $TSignUpUser;
          $pass = password_hash($TSignUpPassword, PASSWORD_DEFAULT);

          if (mysqli_stmt_execute($stmt))
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

<!doctype html>
<!-- <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Student Registration Page</title>
  </head>
  <body>
    <div class="container">
    <h2>Student Login Page:</h2>
      <form action="" method="post">
        <div class="mb-3">
          <label for="Uid" class="form-label">User Name:</label>
          <input type="text" name="username" class="form-control" placeholder="Enter User Name" required>
        </div>
        <?php if($TSignUpUser_err){ $TSignUpUser_err = false; ?>
          <div class="d-flex justify-content-around">
            <div class="alert alert-warning alert-dismissible fade show col-9" role="alert">
              <strong>Username Already exist!!<strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div>
              <a href="login.php" role="button" class="btn btn-primary col btn-lg">Login</a>
            </div>
          </div>
        <?php }?>
        <div class="mb-3">
          <label for="pwd" class="form-label">New Password:</label>
          <input type="password" name="password" class="form-control" placeholder="Enter New Password" required>
        </div>
        <div class="mb-3">
        <?php if($TSignUpPassword_err){ $TSignUpPassword_err = false; ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Enter more than 7 characters!!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php }?>
          <label for="pwd" class="form-label">Confirm Password:</label>
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm New Password" required>
        </div>
        <?php if($TSignUpconfirm_password_err){ $TSignUpconfirm_password_err = false; ?>
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