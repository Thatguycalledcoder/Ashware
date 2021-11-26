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

    $no_lessons = getLessons($_SESSION["id"]);
    $course_lessons = getLessonCourses($_GET["cid"]);
    $counter = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Course Overview</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" 
    src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <link href="styling/sidebarstyles.css" rel="stylesheet">
    <link href="styling/CourseSelectionstyles.css" rel="stylesheet">
    <link href="styling/ProgressBarstyles.css" rel="stylesheet">
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
                <a href="CourseSelection.php?logout='1'" class="nav-link text-danger mb-2">
                        <img class="me-3" src="courseware-assets/logout-icon.svg">
                        Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- Header -->

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
                            <button type="button" class="btn btn-outline-danger me-5" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever=<?=$_GET["cid"]?>  data-bs-whatever2=<?=$_SESSION["id"]?>>                        
                                Unenroll
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Main Navigation-->
        <div class="card ms-3 mt-3"
             style="width: 75vw; border: none; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <div class="card-body" style="padding-bottom: 10px;">
                <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                    <div class="col d-flex justify-content-center activeCourseNavigation">
                        <a href="#">
                            <span class="activeCourseNavigationLink pb-2">Overview</span>
                        </a>
                    </div>
                    <div class="col d-flex justify-content-center courseNavigation">
                        <a href="#">
                            <span class="courseNavigationLink pb-2">Course Content</span>
                        </a>
                    </div>
                    <div class="col d-flex justify-content-center courseNavigation">
                        <a href="#">
                            <span class="courseNavigationLink pb-2">Tasks</span>
                        </a>
                    </div>
                    <div class="col d-flex justify-content-center courseNavigation">
                        <a href="#">
                            <span class="courseNavigationLink pb-2">Q&A</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="ltstActivity" class="container my-5">
            <?php 
                foreach ($course_lessons as $key => $value) {
                    echo '
                    <h5 class="ms-2 titleCard mb-5">'. "Lesson " . $counter .' </h5>
                        <div class="card mt-3 ms-3"
                            style="width: 950px; border: none; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title headerCard">
                                    '.$value["Lesson_title"] .'
                                </h5>
                                <div class="row">
                                    <div class="col-7" style="border-right: 1px solid #D6D6D6;">
                                        <div class="row mb-4">
                                            <img src="courseware-assets/videocourseicon.svg" class="lessonIcons"
                                                style="margin-left: 235px;">Videos
                                            <!-- Progress bar-->
                                            <div class="progress blue mx-3">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                            </div>
                                            1hr left
                                        </div>
                                        <div class="row mb-4">
                                            <img src="courseware-assets/readingscourseicon.svg" class="pb-1 lessonIcons"
                                                style="margin-left: 220px;">Readings
                                            <div class="progress blue mx-3">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                            </div>
                                            50mins left
                                        </div>
                                        <div class="row mb-4">
                                            <img src="courseware-assets/practicescourseicon.svg" class="pb-1 lessonIcons"
                                                style="margin-left: 165px;">Practice Exercises
                                            <div class="progress blue mx-3">
                                <span class="progress-left">
                                    <span class="progress-bar"></span>
                                </span>
                                                <span class="progress-right">
                                    <span class="progress-bar"></span>
                                </span>
                                            </div>
                                            50mins left
                                        </div>
                                    </div>
                                    <div class="col">
                                <iframe width="350" height="150" 
                                src="https://www.youtube.com/embed/YOXwcbwSEUo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                    $counter++;
                }
            ?>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Unenrollment Alert!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Are you sure you want to unenroll in this course?</label>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="unenroll(event)">Yes</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
        </div>
        </div>
    </div>
    </div>
    <br><br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="js/unenrollpop.js"></script>
</body>
</html>