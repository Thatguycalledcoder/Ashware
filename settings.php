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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styling/login.css">
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
                    <a href="index.php" class="nav-link text-danger mb-2 pt-1" aria-current="page">
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
                    <a href="Enrollments.php" class="nav-link text-danger mb-2" style="background-color: #FFEBEB;">
                        <img class="me-1" src="courseware-assets/forum-icon.svg">
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
                    <a href="settings.php" class="nav-link active text-danger mb-2" style="background-color: #FFEBEB;">
                        <img class="me-3" src="courseware-assets/settings-icon.svg">
                        Settings
                    </a>
                </li>
                <li>
                    <a href="settings.php?logout='1'" class="nav-link text-danger mb-2">
                        <img class="me-3" src="courseware-assets/logout-icon.svg">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <!-- Dashboard-->
        <div id="mainpage" class="col mt-2">
            <h1>
                This is the <strong>Settings</strong> page.
            </h1>
        </div>
    </div>
</body>
</html>