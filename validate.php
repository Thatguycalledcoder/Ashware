<?php
require "sqlcontroller.php";
session_start();
$password = "";
$email    = "";
$errors = array(); 
$crud = new CRUD;
$db = $crud->database; 

$db = mysqli_connect('localhost', 'root', '', 'ashware');
// LOGIN USER
if (isset($_POST['login_user'])) 
{
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  if (empty($email)) 
  {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) 
  {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) 
  {
  	$password = base64_encode($password);
  	$result = validateLogin($email, $password);
  	if ($result["Email"] == $email) {
  	    $_SESSION['username'] = $result["Fname"] . " " . $result["Lname"];
        $_SESSION['id'] = $result["Student_id"];
  	    $_SESSION['success'] = "You are now logged in";
  	    header('location: index.php');
  	}else {
      array_push($errors, sizeof($result));
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>