<?php 

    session_start();
    if(isset($_SESSION['username']) != true)
    {
        header("location: ../../index.php");
        exit;
    }
    include "../../config.php";
    include "../../function.php";
    
    $username = trim($_SESSION['username']);
    $insert = false;

    $id = $_GET['id'];
    $select = "SELECT * FROM `student_details` WHERE `Student ID` = '$id'";
    $query = mysqli_query($conn, $select);

    if(isset($_POST['save'])){
        $name = format($_POST['Firstname']) ." ". format($_POST['Lastname']);
        $class = format($_POST['class']) ." ". format($_POST['section']);
        $gender = format($_POST['gender']);
        $blood = format($_POST['Blood']);
        $input = format($_POST['DOB']);
        $dob = date("d M, Y",strtotime($input));
        $email = format($_POST['Email']);
        $admNum = format($_POST['AdmNum']);
        $input = format($_POST['AdmDate']);
        $addDate= date("Y-m-d",strtotime($input));
        $religion = format($_POST['religion']);
        $nationality = format($_POST['Nationality']);
        $fatherName = format($_POST['FatherName']);
        $fatherOcc = format($_POST['FatherOccupation']);
        $fatherNum = format($_POST['FatherPhoneNum']);
        $motherName = format($_POST['MotherName']);
        $motherOcc = format($_POST['MotherOccupation']);
        $motherNum = format($_POST['MotherPhoneNum']);
        $prstAdd = mysqli_real_escape_string($conn, format($_POST['PresentAdd']));
        $permAdd = mysqli_real_escape_string($conn, format($_POST['PmtAdd']));

        $insertQuery = "UPDATE `student_details` SET `Name`='$name', `Class`='$class', `Gender`='$gender', `Blood Group`='$blood', `DOB`='$dob', `Email`='$email', `Admission Number`=$admNum, `Admission Date`='$addDate', `Religion`='$religion', `Nationality`='$nationality', `Father Name`='$fatherName', `Father Occupation`='$fatherOcc', `Father PhoneNum`='$fatherNum', `Mother Name`='$motherName', `Mother Occupation`='$motherOcc', `Mother PhoneNum`='$motherNum', `Present Address`='$prstAdd', `Permanent Address`='$permAdd' WHERE `Student ID` = '$id'";

        $query = mysqli_query($conn, $insertQuery);

        if($query){
            $_SESSION["UpdatedStudents"] = true;
            header("location: StudentsList.php");
        }
        else{
            ?>
            <script> alert("Sorry");</script>
            <?php
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome (Basic Icons) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <link href="../../css/styles.css" rel="stylesheet" />
    <title>Student Details Updation Page</title>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="../HomePage.php">Teacher</a>
        
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fa-lg"></i>
                    <?php 
                        echo($username)
                    ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
 
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a href="../HomePage.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Academics</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Students Info
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="StudentsList.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-friends"></i>
                                    </div>
                                    All Students
                                </a>
                                <a class="nav-link" href="StudentDetails.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                    Student Details
                                </a>
                                <a class="nav-link" href="AdmitStudents.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    Admit Students
                                </a>
                            </nav>
                        </div>
                        <a href="../Academics/SubjectDetails.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Subject Details
                        </a>
                        <a href="../Academics/Announcements.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                            Announce Upcoming Events
                        </a>
                        <a href="../Academics/Attendence.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="far fa-calendar-check"></i></div>
                            Update Attendence
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            Student Progress Updation
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../Academics/Internals.php">
                                    Internal Assessment's
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                                </a>
                                <a class="nav-link" href="../Academics/Exam.php">
                                    External Assessment
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php 
                        echo($username)
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Students Info</li>
                        <li class="breadcrumb-item active">Admit Students</li>
                    </ol>
                    <?php if($insert){ ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Student Details Admitted Successfully</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php }?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4>Admit Students</h4>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body">
                                <h5>Student Information</h5>
                                <?php   
                                    $select = "SELECT * FROM `student_details` WHERE `Student ID` = '$id'";
                                    $query = mysqli_query($conn, $select);
                                    $res = mysqli_fetch_assoc($query);
                                ?>
                                <hr>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                    <?php $arr = explode(" ", $res['Name']);?>
                                        <label for="StudId">Student ID</label>
                                        <input type="text" name="StudID" class="form-control" id="StudID" value="<?php echo $id; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Name">First Name</label>
                                        <input type="text" name="Firstname" class="form-control" id="firstname" value="<?php echo $arr[0]; ?>" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Name">Last Name</label>
                                        <input type="text" name="Lastname" class="form-control" id="lastname" value="<?php echo $arr[1]; ?>">
                                    </div>
                                </div>
                                <?php $arr = explode(" ", $res['Class']);?>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Class</label>
                                        <select id="inputState" name="class" class="form-control">
                                            <option>Please Select Class</option>
                                            <option <?php if($arr[0]=='I'){?> selected <?php } ?>value="I">I</option>
                                            <option <?php if($arr[0]=='II'){?> selected <?php } ?>value="II">II</option>
                                            <option <?php if($arr[0]=='III'){?> selected <?php } ?>value="III">III</option>
                                            <option <?php if($arr[0]=='IV'){?> selected <?php } ?>value="IV">IV</option>
                                            <option <?php if($arr[0]=='V'){?> selected <?php } ?>value="V">V</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Section</label>
                                        <select id="inputState" name="section" class="form-control">
                                            <option>Please Select Section</option>
                                            <option <?php if($arr[1]=='A'){?> selected <?php } ?>value="A">A</option>
                                            <option <?php if($arr[1]=='B'){?> selected <?php } ?>value="B">B</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Gender</label>
                                        <select id="inputState" name="gender" class="form-control">
                                            <option>Please Select Gender</opstion>
                                            <option <?php if($res['Gender']=='Male'){?> selected <?php } ?>value="Male">Male</option>
                                            <option <?php if($res['Gender']=='Female'){?> selected <?php } ?>value="Female">Female</option>
                                            <option <?php if($res['Gender']=='Other'){?> selected <?php } ?>value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputState">Blood Group</label>
                                        <select id="inputState" name="Blood" class="form-control">
                                            <option>Please Select Section</option>
                                            <option <?php if($res['Blood Group']=='A+'){?> selected <?php } ?>value="A+">A+</option>
                                            <option <?php if($res['Blood Group']=='A-'){?> selected <?php } ?>value="A-">A-</option>
                                            <option <?php if($res['Blood Group']=='B+'){?> selected <?php } ?>value="B+">B+</option>
                                            <option <?php if($res['Blood Group']=='B-'){?> selected <?php } ?>value="B-">B-</option>
                                            <option <?php if($res['Blood Group']=='AB+'){?> selected <?php } ?>value="AB+">AB+</option>
                                            <option <?php if($res['Blood Group']=='AB-'){?> selected <?php } ?>value="AB-">AB-</option>
                                            <option <?php if($res['Blood Group']=='O+'){?> selected <?php } ?>value="O+">O+</option>
                                            <option <?php if($res['Blood Group']=='O-'){?> selected <?php } ?>value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="DOB">Date Of Birth</label>
                                        <input type="date" name="DOB" class="form-control" id="Dob" value="<?php echo date("Y-m-d",strtotime($res['DOB'])); ?>" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="Email">E-mail</label>
                                        <input type="email" name="Email" class="form-control" id="Email" value="<?php echo $res['Email']; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="AdmissionNum">Admission Number</label>
                                        <input type="number" name="AdmNum" class="form-control" id="AdmNum" value="<?php echo $res['Admission Number']; ?>" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="AdmissionDate">Admission Date</label>
                                        <input type="date" name="AdmDate" class="form-control" id="AdmDate" value="<?php echo $res['Admission Date']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="relgion">Religion</label>
                                        <input type="text" name="religion" class="form-control" id="religion" value="<?php echo $res['Religion']; ?>" required>
                                    </div>
                                    <!-- <div class="form-group col-md-3">
                                        <label for="Caste">Caste</label>
                                        <input type="text" name="caste" class="form-control" id="caste">
                                    </div> -->
                                    <div class="form-group col-md-3">
                                        <label for="Nation">Nationality</label>
                                        <input type="text" name="Nationality" value="<?php echo $res['Nationality']; ?>" class="form-control" id="Nation" required>
                                    </div>
                                </div>
                                <h5>Parents / Guardians Information</h5>
                                <hr  class="my-4">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="FatherName">Father Name</label>
                                            <input type="text" name="FatherName" class="form-control" id="FatherName" value="<?php echo $res['Father Name']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="FatherOccupation">Father Occupation</label>
                                            <input type="text" name="FatherOccupation" class="form-control" id="FatherOccupation" value="<?php echo $res['Father Occupation']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="FatherPhNum">Phone Number</label>
                                            <input type="text" name="FatherPhoneNum" class="form-control" id="FatherPhNum" value="<?php echo $res['Father PhoneNum']; ?>" required> 
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="MotherName">Mother Name</label>
                                            <input type="text" name="MotherName" class="form-control" id="MotherName" value="<?php echo $res['Mother Name']; ?>" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="MotherOccupation">Mother Occupation</label>
                                            <input type="text" name="MotherOccupation" class="form-control" id="MotherOccupation" value="<?php echo $res['Mother Occupation']; ?>">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="MotherPhNum">Phone Number</label>
                                            <input type="text" name="MotherPhoneNum" class="form-control" id="MotherPhNum" value="<?php echo $res['Mother PhoneNum']; ?>"> 
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="presentAddress">Present Address</label>
                                            <textarea type="text" name="PresentAdd" class="form-control" id="presentAddress" rows="3" required><?php echo $res['Present Address']; ?></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="permAddress">Permanent Address</label>
                                            <textarea type="text" name="PmtAdd" class="form-control" id="permAddress" rows="3"><?php echo $res['Permanent Address']; ?></textarea>
                                        </div>
                                    </div>
                                    <!-- <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="City">City</label>
                                            <input type="text" name="city" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="City">State / Province</label>
                                            <input type="text" name="state" class="form-control" id="State">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="Zip">Postal / Zip Code</label>
                                            <input type="text" name="zip" class="form-control" id="Zip">
                                        </div>
                                    </div> -->
                                <div class="form-row">
                                    <div class="form-group col-sm-2">
                                        <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Save</button>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <a href="StudentsList.php" role="button" class="btn btn-outline-warning btn-lg btn-block">Cancel</a>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <a href="DeleteStudent.php?id2=<?php echo $id ?>" role="button" class="btn btn-danger btn-lg btn-block">Delete</a>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>  
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="../../js/scripts.js"></script>
</body>
</html>