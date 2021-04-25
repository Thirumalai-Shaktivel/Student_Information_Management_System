<?php 

session_start();
if(isset($_SESSION['uniqueId']) != true)
{
    header("location: ../../index.php");
    exit;
}
$id = trim($_SESSION['uniqueId']);
include "../../config.php";


$selectQuery = "SELECT * FROM `student_details` WHERE `Student ID` = '$id'";
$query1 = mysqli_query($conn, $selectQuery);
$result1 = mysqli_fetch_assoc($query1);

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
    <title>Student Exam Results Page</title>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="../HomePage.php">Student</a>
        
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle fa-lg"></i>
                    <?php 
                        echo($result1['Name']);
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
                        <a href="Announcements.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                            Announcements
                        </a>
                        <a href="SubjectDetails.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                            Subject Details
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            Results
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="Internals.php">
                                    <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></i></div>
                                    Internal Assessment
                                </a>
                                <a class="nav-link" href="Exam.php">
                                    <div class="sb-nav-link-icon"><i class="far fa-clipboard"></i></div>
                                    External Assessment
                                </a>
                            </nav>
                        </div>
                        <a href="Attendence.php" class="nav-link">
                            <div class="sb-nav-link-icon"><i class="far fa-calendar-check"></i></div>
                            Attendence
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php 
                        echo($result1['Name']);
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item ">Results</li>
                        <li class="breadcrumb-item active">External Assessment</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Examination Result</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Subject Code</th>
                                            <th>Subject Name</th>
                                            <th>Internal Marks(20)</th>
                                            <th>External Marks(80)</th>
                                            <th>Total(100)</th>
                                            <!-- <th>Result</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $intSum = $ExtSum = $total = 0;
                                            $selectQuery = "SELECT `Subject Code`, `Subject Name` from subject_details";
                                            $query = mysqli_query($conn, $selectQuery);
                                            while($result = mysqli_fetch_assoc($query)){
                                        ?>
                                            <tr>
                                                <td><?php echo $result['Subject Code']; ?></td>
                                                <td><?php echo $result['Subject Name']; ?></td>
                                            <?php
                                                $code = $result['Subject Code'];
                                                $selectQuery1 = "SELECT * from `exam_marks` WHERE `Student ID`='$id' AND `Subject Code` = '$code'";
                                                $query1 = mysqli_query($conn, $selectQuery1);
                                                $result1 = mysqli_fetch_assoc($query1);
                                                
                                            ?>
                                                <td><?php 
                                                    echo (@$result1['Internals Total'] != null)? $result1['Internals Total'] : "-";
                                                    $intSum += $result1['Internals Total'];
                                                ?></td>
                                                <td><?php 
                                                    echo (@$result1['External Marks'] != null)? $result1['External Marks'] : "-";
                                                    $ExtSum +=  $result1['External Marks'];
                                                ?></td>
                                                <td <?php 
                                                        if(@$result1['Total'] >= 35) { 
                                                    ?>style="background-color: #51f542;"
                                                    <?php } else{ ?> 
                                                        style="background-color: #f54242;" <?php } 
                                                    ?> >
                                                    <?php 
                                                        echo (@$result1['Total'] != null)? $result1['Total'] : "-";
                                                        $total += $result1['Total'];
                                                    ?>
                                                </td>
                                                <!-- <td><?php //echo (@$res['Internals Total'] != null)? $res['Internals Total'] : "-"; ?></td> -->
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Total =    <?php echo "\t".$intSum; ?></th>
                                            <th>Total =    <?php echo "\t".$ExtSum; ?></th>
                                            <th>Total =    <?php echo "\t".$total; ?></th>
                                        </tr>
                                    </tfoot>
                                </table>
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
    <script src="../../js/scripts.js"></script>
</body>
</html>