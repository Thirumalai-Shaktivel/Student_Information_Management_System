<?php 

session_start();
if(isset($_SESSION['username']) != true)
{
    header("location: ../index.php");
    exit;
}
$username = trim($_SESSION['username']);
include "../config.php";
include "../function.php";

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
    <link href="../css/styles.css" rel="stylesheet" />
    <style>
        .responsive {
          max-width: 100%;
          height: auto;
        }
    </style>
    <title>Teachers Home Page</title>
</head>
<body class="sb-nav-fixed imag">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="HomePage.php">Teacher</a>
        
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
                    <a class="dropdown-item" href="logout.php">Logout</a>
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
                        <a href="HomePage.php" class="nav-link">
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
                                <a class="nav-link" href="Students/StudentsList.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-friends"></i>
                                    </div>
                                    All Students
                                </a>
                                <a class="nav-link" href="Students/StudentDetails.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                    Student Details
                                </a>
                                <a class="nav-link" href="Students/AdmitStudents.php">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    Admit Students
                                </a>
                            </nav>
                        </div>
                        <a href="Academics/SubjectDetails.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Subject Details
                        </a>
                        <a href="Academics/Announcements.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                            Announce Upcoming Events
                        </a>
                        <a href="Academics/Attendence.php" class="nav-link">
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
                                <a class="nav-link" href="Academics/Internals.php">
                                    Internal Assessment's
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                                </a>
                                <a class="nav-link" href="Academics/Exam.php">
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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $selectQuery = "SELECT COUNT(`Student ID`) as total from student_details";
                                    $query = mysqli_query($conn, $selectQuery);
                                    $result = mysqli_fetch_assoc($query);?>
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body"><h4>Total Students</h4></div>
                                        <div class="card-footer align-items-center">
                                        <h1 class="display-4"><?php echo $result['total']; ?></h1>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $selectQuery = "SELECT COUNT(`Instructor Name`) as total from subject_details";
                                $query = mysqli_query($conn, $selectQuery);
                                $result = mysqli_fetch_assoc($query);?>
                                <div class=" col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body"><h4>Total Subject Teachers</h4></div>
                                        <div class="card-footer align-items-center">
                                            <h1 class="display-4"><?php echo $result['total']; ?></h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center col-12">
                                    <img src="../image/TeacherStudents.jpg" class="responsive" width="510" height="340" alt="Classroom">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Notice Board</h5>
                                </div>
                                <?php
                                    $selectQuery = "SELECT * from announcements ORDER BY ID DESC";
                                    $query = mysqli_query($conn, $selectQuery);
                                ?>
                                <div class="card-body">
                                    <?php while($result = mysqli_fetch_assoc($query)){ ?>
                                    <div class="accordion" id="NoticeBody">
                                        <div class="card">
                                            <div class="card-header">
                                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#Body<?php echo $result['ID']; ?>">
                                                    <h3><?php echo $result['Title']; ?></h3>
                                                    <small class="text-muted">Posted By </small>
                                                    <?php 
                                                        $post = $result['Posted By'];
                                                        echo $post;
                                                        $selectQuery1 = "SELECT `Subject Name` from `subject_details` WHERE `Instructor Name` = '$post'";
                                                        $query1 = mysqli_query($conn, $selectQuery1);
                                                        $res = mysqli_fetch_assoc($query1);
                                                        echo "(". $res['Subject Name'] .")";
                                                    ?>
                                                    <br>
                                                    <small class="text-muted">
                                                    <?php 
                                                        echo get_time_ago($result['Posted time']); 
                                                    ?>
                                                    </small>
                                                </button>
                                            </div>

                                            <div id="Body<?php echo $result['ID']; ?>" class="collapse" data-parent="#NoticeBody">
                                                <div class="card-body">
                                                    <?php echo $result['Description']; ?>
                                                    <p class="card-text"><small class="text-muted"><?php echo $result['Posted On']; ?><br></small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
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
    <!-- JavaScript -->
    <script src="../js/scripts.js"></script>
</body>
</html>