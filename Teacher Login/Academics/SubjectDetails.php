<?php 

    session_start();
    if(isset($_SESSION['username']) != true)
    {
        header("location: ../../index.php");
        exit;
    }
    require_once "../../config.php";
    include "../../function.php";
    
    $username = trim($_SESSION['username']);
    $success = $update = $del = $sub = false;
    
    if(isset($_SESSION['UpdatedSubDetails']))
        $update = true;
    else if(isset($_SESSION['DeletedSubDetails']))
        $del = true;    
    if(isset($_SESSION['DuplicateSub']))
        $sub = true;


    if(isset($_POST['add'])){
        $SubCode = format($_POST['SubCode']);
        $SubName = format($_POST['SubName']);
        
        $check = "SELECT * FROM subject_details WHERE `Subject Code` = '$SubCode' OR `Subject Name` =  '$SubName'";
        $query = mysqli_query($conn, $check);
        $res = mysqli_fetch_assoc($query);
        if(!$res){
            $InstructorName = format($_POST['InstrName']);
            $InstructorEmail = format($_POST['InstrEmail']);

            $insertQuery = "INSERT iNTO subject_details(`Subject Code`, `Subject Name`, `Instructor Name`, `Instructor Email`) VALUES ('$SubCode', '$SubName', '$InstructorName', '$InstructorEmail')";

            $query1 = mysqli_query($conn, $insertQuery);
            if($query1){
                $success = true;
            }
            
            $selectQuery = "SELECT `Student ID` from student_details";
            $query = mysqli_query($conn, $selectQuery);
            while($res = mysqli_fetch_assoc($query)){
                $id = $res['Student ID'];
                $insertQuery = "INSERT INTO `internals_marks`(`Student ID`, `Subject Code`) VALUES ('$id','$SubCode')";
                $query2 = mysqli_query($conn, $insertQuery);
            }

            $selectQuery = "SELECT `Student ID` from student_details";
            $query = mysqli_query($conn, $selectQuery);
            while($res = mysqli_fetch_assoc($query)){
                $id = $res['Student ID'];
                $insertQuery = "INSERT INTO `exam_marks`(`Student ID`, `Subject Code`) VALUES ('$id','$SubCode')";
                $query2 = mysqli_query($conn, $insertQuery);
            } 
        }
        else {
            $_SESSION['DuplicateSub'] = true;
            header("location: SubjectDetails.php");
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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous"> -->
    <link href="../../css/styles.css" rel="stylesheet" />
    <title>Academics Subject Details Page</title>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="../HomePage.php">Teacher</a>
        
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ml-auto ml-md-0">
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
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../Students/StudentsList.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-friends"></i>
                                    </div>
                                    All Students
                                </a>
                                <a class="nav-link" href="../Students/StudentDetails.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                    Student Details
                                </a>
                                <a class="nav-link" href="../Students/AdmitStudents.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    Admit Students
                                </a>
                            </nav>
                        </div>
                        <a href="SubjectDetails.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Subject Details
                        </a>
                        <a href="Announcements.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                            Announce Upcoming Events
                        </a>
                        <a href="Attendence.php" class="nav-link">
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
                                <a class="nav-link" href="Internals.php">
                                    Internal Assessment's
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                                </a>
                                <a class="nav-link" href="Exam.php">
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
                        <li class="breadcrumb-item active">Subject Details</li>
                    </ol>
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Add Subject Details</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-sm-4">
                                                <label for="SubCode">Subject Code</label>
                                                <input type="text" name="SubCode" class="form-control" required>
                                            </div>
                                            <div class="form-group col-sm-8">
                                                <label for="SubName">Subject Name</label>
                                                <input type="text" name="SubName" class="form-control">
                                           </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm">
                                                <label for="InstrName">Instructor Name</label>
                                                <input type="text" name="InstrName" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm">
                                                <label for="InstrEmail">Instructor Email ID</label>
                                                <input type="email" name="InstrEmail" class="form-control">
                                            </div>
                                        </div>
                                        <?php if($success){ ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Subject Details Added Successfully</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php }?>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-sm-4">
                                                    <button type="submit" name="add" class="btn btn-primary btn-lg btn-block">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <div>
                                 <?php if($update){ 
                                    unset($_SESSION["UpdatedSubDetails"]);
                                ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Subject Details Updated Successfully</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } else if($del){ 
                                    unset($_SESSION["DeletedSubDetails"]);
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Subject Details Deleted Successfully</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } else if($sub){ 
                                    unset($_SESSION['DuplicateSub']);
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Subject Code and Subject Name Has to Be Unique!</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
                                
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5>Subject Details</h5>
                                    </div>
                                    <div class="card-body">
                                        
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Subject Code</th>
                                                        <th>Subject Name</th>
                                                        <th>Instructor Name</th>
                                                        <th>Instructor Email ID</th>
                                                        <th>Make Changes</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                        $selectQuery = "SELECT * from subject_details";
                                                        $query2 = mysqli_query($conn, $selectQuery);
                                                    while($result = mysqli_fetch_assoc($query2)){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $result['Subject Code']; ?></td>
                                                            <td><?php echo $result['Subject Name']; ?></td>
                                                            <td><?php echo $result['Instructor Name']; ?></td>
                                                            <td><?php echo $result['Instructor Email']; ?></td>
                                                            <td>
                                                                <div>
                                                                    <a class="btn btn-success btn-block" role="button" href="EditSubjectDetails.php?id=<?php echo $result['Subject Code']; ?>">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>  
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="../../js/scripts.js"></script>
</body>
</html>