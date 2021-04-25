<?php 

    session_start();
    if(isset($_SESSION['username']) != true)
    {
        header("location: ../../index.php");
        exit;
    }

    $username = trim($_SESSION['username']);
    include "../../config.php";
    include "../../function.php";

    $sent = $sel = false;
    $select = true;
    
    if(isset($_SESSION['Sent']))
        $sent = true;
    if(isset($_SESSION['SelectSender']))
        $sel = true;

    if(isset($_POST['Send'])){
        $Title = format($_POST['title']);
        $Des = format($_POST['Description']);
        if ($_POST['postedBy'] == 'Please Select Teacher Name'){
                $_SESSION['SelectSender']  = $select = false;
                header("location: Announcements.php");
        }
        $By = format($_POST['postedBy']);
        $selectQuery1 = "SELECT `Subject Code` from `subject_details` WHERE `Instructor Name` = '$By'";
        $query1 = mysqli_query($conn, $selectQuery1);
        $res = mysqli_fetch_assoc($query1);
        $Code = $res['Subject Code'];

        date_default_timezone_set('Asia/Kolkata');
        $Date = date("d M, Y") ." ". date("h:ia"); 
        
        $time = time();
        
        $Des = mysqli_real_escape_string($conn, $Des);

        if($select){
            $insertQuery = "INSERT INTO `announcements`(`Title`, `Description`, `Posted By`, `Subject Code`, `Posted On`, `Posted time`) VALUES ('$Title', '$Des', '$By', '$Code', '$Date', '$time')";
            $query = mysqli_query($conn, $insertQuery);
            if($query){
                $_SESSION['Sent'] = true;
                header("location: Announcements.php");
            }    
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
    <title>Teacher Circular Creation Page</title>
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
                        <li class="breadcrumb-item active">Announcements</li>
                    </ol>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5>Create A Circular</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="form-group col-sm">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" class="form-control" id="title" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm">
                                                <label for="Description">Description</label>
                                                <textarea type="text" name="Description" class="form-control" id="Description" rows="3" required> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-8">
                                                <label for="inputState">Posted By</label>
                                                <select name="postedBy" class="form-control" >
                                                    <option selected>Please Select Teacher Name</option>
                                                    <?php
                                                        $selectQuery = "SELECT `Instructor Name` from subject_details";
                                                        $query = mysqli_query($conn, $selectQuery);
                                                        while($result = mysqli_fetch_assoc($query)){
                                                    ?>
                                                    <option value="<?php echo $result['Instructor Name']; ?>"><?php echo $result['Instructor Name']; ?></option>
                                                    <?php } ?>    
                                                </select>
                                            </div>
                                        </div>
                                        <?php if($sent){ unset($_SESSION['Sent']); ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Cicular Broadcasting to All</strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php }?>
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-sm-6">
                                                    <button type="submit" name="Send" class="btn btn-primary btn-lg btn-block">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                                <?php if($sel){ 
                                    unset($_SESSION["SelectSender"]);
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Please Select the Teacher!!</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
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
                                                    <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#Body<?php echo $result['ID']; ?>">
                                                        <h3><?php echo $result['Title']; ?></h3>
                                                        <small class="text-muted">Posted By </small>
                                                        <?php 
                                                            $post = $result['Posted By'];
                                                            echo $post;
                                                            $Code = $result['Subject Code'];
                                                            $selectQuery1 = "SELECT `Subject Name` from `subject_details` WHERE `Subject Code` = '$Code'";
                                                            $query1 = mysqli_query($conn, $selectQuery1);
                                                            $res = mysqli_fetch_assoc($query1);
                                                            echo "(". @$res['Subject Name'] .")";
                                                        ?>
                                                        <br>
                                                        <small class="text-muted">
                                                        <?php 
                                                            echo get_time_ago($result['Posted time']); 
                                                        ?>
                                                        </small>
                                                    </button>
                                                </h2>
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
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="../../js/scripts.js"></script>
</body>
</html>