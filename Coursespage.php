<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
  	header("location: login.php");
  }
?>

<?php
    include "sqlcontroller.php";
    $enrollments = getEnrollments($_SESSION["id"]); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Courses</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <link href="styling/sidebarstyles.css" rel="stylesheet">
    <link href="styling/mainstyles.css" rel="stylesheet">
</head>
<body>
<!-- Navigation bar-->
<div class="row">
    <div class="nav flex-column flex-shrink-0 p-3 text-black mx-3"
         style="width: 185px; background-color: #F8F8F8; border-right: 1px solid #D7D7D7;">
          <span class="fs-4 mb-2">
              <img class="usericon mb-3" src="courseware-assets/usericon2.png" alt="usericon">
              <div class="username"><?php echo $_SESSION["username"]?></div>
            </span>
        <ul class="nav nav-pills flex-column mb-auto mt-5">
            <li class="nav-item">
                <a href="index.php" class="nav-link text-danger mb-2 pt-1" aria-current="page">
                    <img class="me-3" src="courseware-assets/dashboard-icon.svg">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="Coursespage.php" class="nav-link active text-danger mb-2" style="background-color: #FFEBEB;">
                    <img class="me-3" src="courseware-assets/courses-icon.svg">
                    Courses
                </a>
            </li>
            <li>
                <a href="Enrollments.php" class="nav-link text-danger mb-2">
                    <img class="me-2" src="courseware-assets/forum-icon.svg">
                    Enrollments
                </a>
            </li>
            <li class="">
                <a href="#" class="nav-link text-danger mb-2">
                    <img class="me-3" src="courseware-assets/help-icon.svg">
                    Help
                </a>
            </li>
            <li class="spacedsideicon">
                <a href="#" class="nav-link text-danger mb-2">
                    <img class="me-3" src="courseware-assets/settings-icon.svg">
                    Settings
                </a>
            </li>
            <li>
            <a href="Coursespage.php?logout='1'" class="nav-link text-danger mb-2">
                    <img class="me-3" src="courseware-assets/logout-icon.svg">
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- Dashboard-->
    <div id="mainpage" class="col mt-2">
        <div class="row mb-4">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex">
                        <!-- Search area-->
                        <label class="form-control me-2"
                               style="background-color: #F2F2F2;border-radius: 7px;border: none; width: 504px; height: 45px;">
                            <i class="fa fa-search me-3 pt-2 p-lg-2"></i>
                            <input class="me-2" type="search" placeholder="Search..."
                                   style="border: none; outline: none; background-color: transparent;">
                        </label>
                    </form>
                    <!-- Notification icon-->
                    <div class="row">
                        <div class="col">
                            <div class="dropdown">
                                <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="false" style="outline: none;">
                                    <img src="courseware-assets/notification-bell-active.svg">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col">
                            <a href="Enrollments.php">
                            <button class="btn btn-outline-success me-5" type="button">Enroll</button>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <h5 class="ms-2 titlecard">Enrolled Courses</h5>
            <div class="row">
            <?php
                if ($enrollments == false) {
                    echo "<h5>No enrollments yet. Click <a href='Enrollments.php'><strong>here</strong></a> to enroll in some courses</h5>";
                }
                else{
                    foreach ($enrollments as $key => $value) 
                    {        
                    echo '     
                        <div class="col">
                            <div class="card mb-3 cardsize" style="text-decoration: none;">
                                <a href=CourseSelection.php?cid='.$value["Course_id"].' class="coursess" style="text-decoration: none; color: initial;">
                                    <img src='. $value["Course_image"].' class="card-img-top" alt=' . $value["Course_name"] .'>
                                    <div class="card-body">                              
                                        <h5 class="card-title coursetitle">' . $value["Course_name"] . '</h5>
                                        <p class="card-text coursecontent">' . $value["Course_desc"] . '<br>By: ' . $value["Fname"] .' ' . $value["Lname"] .'</p>      
                                    </div>
                                </a>
                            </div> 
                        </div> ';
                    }
                }
                ?>       
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>