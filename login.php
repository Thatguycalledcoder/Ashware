<?php include('validate.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to AOPCW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="left-pane">
            <div class="container">
                <img class="logo" src="images/ashesi logo.png" alt="School logo"><br>
                <img class="study" src="images/login.svg" alt="illustration">
            </div>
        </div>
        <div class="right-pane">
            <div class="container">
                <div class="welcome-text">
                    <h1>Welcome back!</h1>
                    <h4>Please login to proceed</h4>
                </div>
                <div class="login-form">
                    <form method="POST" action="">
                    <?php include('errors.php') ?>
                        <input type="email" name="email" placeholder="Email"><br>
                        <input type="password" name="password" placeholder="Password">
                        <a href="#">Forgot Password?</a>
                        <button type="submit" class="login-btn" name="login_user">Login</button>
                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>