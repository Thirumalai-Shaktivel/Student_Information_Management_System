<?php 

session_start();
if(isset($_SESSION['username']) != true)
{
    header("location: ../../index.php");
    exit;
}
$username = trim($_SESSION['username']);
include "../../config.php";
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
    <title>Students Internals Marks Details Page</title>
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
                        <div id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
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
                        <li class="breadcrumb-item">Student Progress Updation</li>
                        <li class="breadcrumb-item active">Internal Assessment's</li>
                    </ol>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <?php
                            $selectQuery = "SELECT * from subject_details";
                            $query2 = mysqli_query($conn, $selectQuery);
                            $first = mysqli_fetch_assoc($query2);

                            $selectQuery = "SELECT * from subject_details";
                            $query2 = mysqli_query($conn, $selectQuery);
                        while($result = mysqli_fetch_assoc($query2)){
                        ?>
                        <li class="nav-item">
                          <a class="nav-link <?php if($first['Subject Name'] == $result['Subject Name']) { ?> active <?php } ?>" data-toggle="pill" href="#<?php echo $result['Subject Name']; ?>"><?php echo $result['Subject Name']; ?></a>
                        </li>
                        <?php } ?>
                    </ul>

                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Marks Sheet</h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                            <?php
                                $selectQuery = "SELECT * from subject_details";
                                $query2 = mysqli_query($conn, $selectQuery);
                            while($res = mysqli_fetch_assoc($query2)){
                            ?>
                                <div class="tab-pane fade <?php if($first['Subject Name'] == $res['Subject Name']) { ?> show active <?php } ?>" id="<?php echo $res['Subject Name']; ?>">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center" width="100%" cellspacing="0">
                                        <div class="d-flex justify-content-around">
                                           <h3><?php echo "Subject Code : ".$res['Subject Code']; ?></h3>
                                           <h3><?php echo "Subject Name : ".$res['Subject Name']; ?></h3>
                                        </div>
                                            <thead>
                                                <tr>
                                                    <th style=>Students ID</th>
                                                    <th>Students Name</th>
                                                    <th>
                                                        <div class="row">
                                                                <div class="col-8 ">
                                                                    <label> Internal Assessment-01(20)</label>
                                                                </div>
                                                            <div class="col align-self-center">
                                                                <a href="UpdateInternals.php?id=IA1" role="button" class="btn btn-primary btn-block">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="row">
                                                            <div class="col-8 ">
                                                                <label> Internal Assessment-02(20)</label>
                                                            </div>
                                                            <div class="col align-self-center">
                                                                <a href="UpdateInternals.php?id=IA2" role="button" class="btn btn-primary btn-block">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>
                                                        <div class="row">
                                                            <div class="col-8">
                                                                <label> Internal Assessment-03(20)</label>
                                                            </div>
                                                            <div class="col align-self-center">
                                                                <a href="UpdateInternals.php?id=IA3" role="button" class="btn btn-primary btn-block">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </th>
                                                    <th>Average</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                                <?php 
                                                    $selectQuery = "SELECT * from `student_details`";
                                                    $query = mysqli_query($conn, $selectQuery); 
                                                    while($result = mysqli_fetch_assoc($query)){ 
                                                ?>
                                                <tr>
                                                    <td><?php echo $result['Student ID']; ?></td>
                                                    <td><?php echo $result['Name']; ?></td>
                                                <?php
                                                    $ID = $result['Student ID'];
                                                    $code = $res['Subject Code'];

                                                    $selectQuery1 = "SELECT * from `internals_marks` WHERE `Student ID` = '$ID' AND `Subject Code` ='$code'";
                                                    $query1 = mysqli_query($conn, $selectQuery1); 
                                                    $result = mysqli_fetch_assoc($query1);
                                                    ?>
                                                    <td><?php echo (@$result['IA1'] != null)? $result['IA1'] : "-"; ?></td>
                                                    <td><?php echo (@$result['IA2'] != null)? $result['IA2'] : "-"; ?></td>
                                                    <td><?php echo (@$result['IA3'] != null)? $result['IA3'] : "-"; ?></td>
                                                    <td <?php if(@$result['Average'] >= 12) { ?>style="background-color: #51f542;"
                                                    <?php } else{ ?> style="background-color: #f54242;" <?php } ?>
                                                    ><?php echo (@$result['Average'] !=null)?$result['Average']: "-"; ?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php } ?>
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