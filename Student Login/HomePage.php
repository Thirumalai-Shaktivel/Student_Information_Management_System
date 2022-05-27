<?php 

session_start();
if(isset($_SESSION['uniqueId']) != true)
{
    header("location: ../index.php");
    exit;
}
$id = trim($_SESSION['uniqueId']);
include "../config.php";
    $selectQuery = "SELECT * FROM `student_details` WHERE `Student ID` = '$id'";
    $query = mysqli_query($conn, $selectQuery);
    $result = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome (Basic Icons) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
    <title>Student Home Page</title>
    <style>
        .responsive {
          max-width: 100%;
          height: auto;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="HomePage.php">Student</a>
        
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fa-lg"></i>
                    <?php 
                        echo($result['Name']);
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
                        <a href="Academics/Announcements.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                            Announcements
                        </a>
                        <a href="Academics/SubjectDetails.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Subject Details
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            Results
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="Academics/Internals.php">
                                    <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></i></div>
                                    Internal Assessment
                                </a>
                                <a class="nav-link" href="Academics/Exam.php">
                                    <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></div>
                                    External Assessment
                                </a>
                            </nav>
                        </div>
                        <a href="Academics/Attendence.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="far fa-calendar-check"></i></div>
                            Attendence
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php 
                        echo($result['Name']);
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
                        <div class="col-lg-7">
                            <div class="card mb-4">
                                <div class="card-header">
                                    
                                    <h4>Student Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 mb-4 text-center">
                                            <?php if($result['Gender'] == 'Male'){ ?>
                                            <img src="../image/Male.jpg" alt="Student Image" style="width:200px; border-radius: 50%;">
                                            <?php } else { ?>
                                                <img src="../image/Female.jpg" alt="Student Image" style="width:300px; border-radius: 50%;">
                                            <?php } ?>
                                        </div>
                                        <div class="col-xl-8 col-lg-9">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="Basic-tab" data-toggle="tab" href="#Basic" role="tab" aria-controls="Basic" aria-selected="true">Basic Info</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="Personal-tab" data-toggle="tab" href="#Personal" role="tab" aria-controls="Personal" aria-selected="false">Personal Details</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="Parent-tab" data-toggle="tab" href="#Parent" role="tab" aria-controls="Parent" aria-selected="false">Parent Details</a>
                                            </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="Basic" role="tabpanel" aria-labelledby="Basic-tab">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Student ID </td><td><?php echo ":\t".$result['Student ID'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Name </td><td><?php echo ":\t".$result['Name'] ?></td>
                                                                </tr>
                                                                    <tr>
                                                                    <td>Class </td><td><?php echo ":\t".$result['Class'] ?></td>
                                                                </tr>
                                                                    <tr>
                                                                    <td>Gender</td><td><?php echo ":\t".$result['Gender'] ?></td>
                                                                </tr>
                                                                    <tr>
                                                                    <td>E-mail</td> <td><?php echo ":\t".$result['Email'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="Personal" role="tabpanel" aria-labelledby="Personal-tab">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Date Of Birth </td><td><?php echo ":\t".$result['DOB'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Blood Group </td><td><?php echo ":\t".$result['Blood Group'] ?></td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td>Admission Number </td><td><?php echo ":\t".$result['Admission Number'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Admission Date </td><td><?php echo ":\t".$result['Admission Date'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Religion </td><td><?php echo ":\t".$result['Religion'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nationality </td><td><?php echo ":\t".$result['Nationality'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="Parent" role="tabpanel" aria-labelledby="Parent-tab">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless">
                                                            <tbody>
                                                                <tr>
                                                                    <td> Father Name </td><td><?php echo ":\t".$result['Father Name'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Father Occupation</td><td><?php echo ":\t".$result['Father Occupation'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Phone Number</td><td><?php echo ":\t".$result['Father PhoneNum'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Mother Name </td><td><?php echo ":\t".$result['Mother Name'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Mother Occupation</td><td><?php echo ":\t".$result['Mother Occupation'] ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Phone Number</td><td><?php echo ":\t".$result['Mother PhoneNum'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td> Present Address</td><td><?php echo ":\t".$result['Present Address'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="text-center col-12">
                                <img src="../image/students.png" class="responsive" alt="Students">
                            </div>
                        </div>
                        <div class="col">
                            <div>
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
                                                <h2 class="mb-0">
                                                    <a href="Academics/Announcements.php" role="button" class="btn btn-block text-left">
                                                        <h4><?php echo $result['Title']; ?></h4>
                                                        <small class="text-muted">Posted By </small>
                                                        <?php 
                                                            $post = $result['Posted By'];
                                                            echo $post;
                                                            $Code = $result['Subject Code'];
                                                            $selectQuery1 = "SELECT `Subject Name` from `subject_details` WHERE `Subject Code` = '$Code'";
                                                            $query1 = mysqli_query($conn, $selectQuery1);
                                                            $res = mysqli_fetch_assoc($query1);
                                                            echo "(". $res['Subject Name'] .")";
                                                        ?>
                                                        <br>
                                                        <p class="card-text"><small class="text-muted"><?php echo $result['Posted On']; ?><br></small></p>
                                                    </a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>  

    </nav>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="../js/scripts.js"></script>
</body>
</html>