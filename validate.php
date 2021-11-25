<?php
require "sqlcontroller.php.";
session_start();

// LOGIN USER
if (isset($_POST['login_user'])) 
{
  $email = mysqli_real_escape_string($crud, $_POST['email']);
  $password = mysqli_real_escape_string($crud, $_POST['password']);

  if (empty($username)) 
  {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) 
  {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
  	$password = password_hash($password, PASSWORD_DEFAULT);
  	$result = validateLogin($email, $password);
  	if ($result != null && $result != false) {
  	    $_SESSION['username'] = $result["Fname"] . " " . $result["Lname"];
        $_SESSION['id'] = $result["Student_id"];
  	    $_SESSION['success'] = "You are now logged in";
  	  header('location: mainpage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>