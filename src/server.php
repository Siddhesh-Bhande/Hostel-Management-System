<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'HMSystem');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['userId']);
  $email = mysqli_real_escape_string($db, $_POST['userEmail']);
  $password = mysqli_real_escape_string($db, $_POST['userPassword']);
  $FirstName = mysqli_real_escape_string($db, $_POST['userFirstName']);
  $LastName = mysqli_real_escape_string($db, $_POST['userLastName']);
  $age = mysqli_real_escape_string($db, $_POST['userAge']);
  $Education = mysqli_real_escape_string($db, $_POST['educationLevel']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM Student_Info WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO Student_Info (First_Name, Last_Name, User_Id, Password, Email, Age, Education) VALUES ('$FirstName', '$LastName','$username', '$password', '$email', '$age', '$Education')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: welcomePageStudent.php');
  }
}
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['userId']);
  $password = mysqli_real_escape_string($db, $_POST['userPassword']);
  //$answer = mysqli_real_escape_string($db, $_POST['answer']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  


  if (count($errors) == 0) {
  	$password = md5($password_1);
  	$query = "SELECT * FROM players_info WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: welcomePageStudent.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>