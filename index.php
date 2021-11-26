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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Courseware</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--        <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <link href="styling/sidebarstyles.css" rel="stylesheet">
    <link href="styling/mainstyles.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="nav flex-column flex-shrink-0 p-3 text-black mx-3"
         style="width: 185px; background-color: #F8F8F8; border-right: 1px solid #D7D7D7;">
          <span class="fs-4 mb-2">
              <img class="usericon mb-3" src="courseware-assets/usericon2.png" alt="usericon">
              <div class="username"><?php echo $_SESSION["username"]?></div>
            </span>
        <ul class="nav nav-pills flex-column mb-auto mt-5">
            <li class="nav-item">
                <a href="#" class="nav-link active text-danger mb-2 pt-1" aria-current="page"
                   style="background-color: #FFEBEB;">
                    <img class="me-3" src="courseware-assets/dashboard-icon.svg">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="Coursespage.php" class="nav-link text-danger mb-2">
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
                <a href="help.php" class="nav-link text-danger mb-2">
                    <img class="me-3" src="courseware-assets/help-icon.svg">
                    Help
                </a>
            </li>
            <li class="spacedsideicon">
                <a href="settings.php" class="nav-link text-danger mb-2">
                    <img class="me-3" src="courseware-assets/settings-icon.svg">
                    Settings
                </a>
            </li>
            <li>
                <a href="index.php?logout='1'" class="nav-link text-danger mb-2">
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
                        <label class="form-control me-2"
                               style="background-color: #F2F2F2;border-radius: 7px;border: none; width: 504px; height: 45px;">
                            <i class="fa fa-search me-3 pt-2 p-lg-2"></i>
                            <input class="me-2" type="search" placeholder="Search..."
                                   style="border: none; outline: none; background-color: transparent;">
                        </label>
                    </form>
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
                            <button class="btn btn-outline-danger me-5" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Latest Activity Card -->
        <div id="ltstActivity" class="container mb-5">
            <h5 class="ms-2 titlecard">Latest Activity</h5>
            <div class="card mt-3"
                 style="width: 75vw; border: none; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title">
                        <img src="courseware-assets/Activity-icon.svg" class="me-5">Web Technologies</h5>
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                        <div class="col-9">
                            <p class="card-text mt-3 mb-4" style="margin-left: 67px; color: #9B9B9B;">In web
                                technologies, you'll learn the history of the Internet and World Wide Web.<br>You will also
                                learn web scripting languages and the basics of cloud computing.</p>
                        </div>
                        <div class="col ">
                            <button type="button" class="btn btn-danger btn-sm mt-3">Start<img
                                    src="courseware-assets/continue-arrow.svg" style="width: 20px; padding-left: 5px; margin-left: 10px;">
                            </button>
                        </div>
                    </div>
                    <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
                        <div class="col">
                            <img src="courseware-assets/lectures-icon.svg" class="pb-2" style="margin-left: 66px;"><span
                                id="lecturesnos" class="Activity-info">16 lectures</span>
                        </div>
                        <div class="col">
                            <img src="courseware-assets/lessons-icon.svg" class="pb-1" style="margin-left: 45px;"><span
                                id="lessonsnos" class="Activity-info">12 lessons</span>
                        </div>
                        <div class="col-5">
                  <span class="progress" style="height: 4px; width: 380px; margin-top: 10px;">
                    <div class="progress-bar" role="progressbar" style="width: 0%; background-color: #1CC600"
                         aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  </span>
                        </div>
                        <div class="col-1" style="color: #858585; font-size: 13px;">
                            <span>0% </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Courses Card -->
        <div class="container">
            <h5 class="ms-2 titlecard">Popular Courses</h5>
            <div class="row">
                <div class="col">
                    <div class="card mb-3 cardsize">
                        <a class="coursess" href="Enrollments.php">
                        <img src="courseware-assets/DSA.png" class="card-img-top" alt="Data Structures and Allgorithms">
                        <div class="card-body">
                            <h5 class="card-title coursetitle">Data Structures and Algorithms</h5>
                            <p class="card-text coursecontent">Introduces you to higher level programming efficiencies
                                through application of data structures such us stacks, queues, etc.</p>
                            <p class="card-text">
                                <img src="courseware-assets/lessons-icon.svg" class="pe-2"><small
                                    class="text-muted me-3 coursestatus">12 lessons</small>
                                <img src="courseware-assets/no-enrollment-icon.svg" class="pe-2"><small
                                    class="text-muted coursestatus">40 enrolled</small>
                            </p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 cardsize">
                    <a class="coursess" href="Enrollments.php">
                        <img src="courseware-assets/AI.png" class="card-img-top" alt="Artifical Intelligence">
                        <div class="card-body">
                            <h5 class="card-title coursetitle">Artifical Intelligence</h5>
                            <p class="card-text coursecontent">It is the science and engineering of making intelligent
                                machines, especially intelligent computer programs, for the automation of processes.</p>
                            <p class="card-text">
                                <img src="courseware-assets/lessons-icon.svg" class="pe-2"><small
                                    class="text-muted me-3 coursestatus">23 lessons</small>
                                <img src="courseware-assets/no-enrollment-icon.svg" class="pe-2"><small
                                    class="text-muted coursestatus">16 enrolled</small>
                            </p>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 cardsize">
                    <a class="coursess" href="Enrollments.php">
                        <img src="courseware-assets/EthHack.png" class="card-img-top" alt="Ethical Hacking">
                        <div class="card-body">
                            <h5 class="card-title coursetitle">Ethical Hacking</h5>
                            <p class="card-text coursecontent">The course reviews topics such as conceptual data
                                modelling, relational datamodel, relational query languages, relational database
                                design.</p>
                            <p class="card-text">
                                <img src="courseware-assets/lessons-icon.svg" class="pe-2"><small
                                    class="text-muted me-3 coursestatus">12 lessons</small>
                                <img src="courseware-assets/no-enrollment-icon.svg" class="pe-2"><small
                                    class="text-muted coursestatus">40 enrolled</small>
                            </p>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 cardsize align-text-bottom">
                    <a class="coursess" href="Enrollments.php">
                        <img src="courseware-assets/HCI.png" class="card-img-top" alt="Human Computer Interaction">
                        <div class="card-body">
                            <h5 class="card-title coursetitle">Human Computer Interaction</h5>
                            <p class="card-text coursecontent">Introduces you to higher level design approaches through
                                application of design principles for efficient solutions.</p>
                            <p class="card-text">
                                <img src="courseware-assets/lessons-icon.svg" class="pe-2"><small
                                    class="text-muted me-3 coursestatus">12 lessons</small>
                                <img src="courseware-assets/no-enrollment-icon.svg" class="pe-2"><small
                                    class="text-muted coursestatus">40 enrolled</small>
                            </p>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">

</script>
</body>
</html>