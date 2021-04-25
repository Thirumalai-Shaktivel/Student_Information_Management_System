<?php 

session_start();
if(isset($_SESSION['username']) != true)
{
    header("location: ../../index.php");
    exit;
}
$update = $del = false;
$username = trim($_SESSION['username']);
require_once "../../config.php";
if(isset($_SESSION['UpdatedStudents']))
        $update = true;
else if(isset($_SESSION['DeletedStudent']))
        $del = true;
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
    <title>Students Information Page</title>
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
                        <li class="breadcrumb-item active">All Students</li>
                    </ol>
                    <?php if($update){ 
                        unset($_SESSION["UpdatedStudents"]);
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Student Details Updated Successfully</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } else if($del){ 
                        unset($_SESSION["DeletedStudent"]);
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Student Details Deleted Successfully</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users"></i>
                            Students List
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Students ID</th>
                                            <th>Students Name</th>
                                            <th>Parent Name</th>
                                            <th>Class</th>
                                            <!-- <th>Section</th> -->
                                            <th>Date Of Birth</th>
                                            <th>Phone Number</th>
                                            <th>E-mail</th>
                                            <th colspan="2" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $selectQuery = "SELECT * from `student_details`";
                                            $query = mysqli_query($conn, $selectQuery); 
                                            while($result = mysqli_fetch_assoc($query)){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $result['Student ID']; ?></td>
                                            <td><?php echo $result['Name']; ?></td>
                                            <td><?php echo $result['Father Name']; ?></td>
                                            <td><?php echo $result['Class']; ?></td>
                                            <td><?php echo $result['DOB']; ?></td>
                                            <td><?php echo $result['Father PhoneNum']; ?></td>
                                            <td><?php echo $result['Email']; ?></td>
                                            <td>
                                                <div class="row">
                                                    <div class="col py-2">
                                                        <a href="StudentDetails.php?id=<?php echo $result['Student ID']; ?>" role="button" class="btn btn-success btn-block">
                                                        <i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <div class="col">
                                                        <a href="UpdateStudents.php?id=<?php echo $result['Student ID']; ?>" role="button" class="btn btn-primary btn-block">
                                                        <i class="fas fa-edit"></i></a>
                                                    </div>
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