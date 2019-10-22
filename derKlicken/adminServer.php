<?php
//https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('brahe.canisius.edu', 'CSC380b', 'rome73', 'CSC380b_p1');

// CHANGE PASSWORD
if (isset($_POST['changeP'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userInfo WHERE username='$username' AND email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  $newpass = sha1($password);
  
  if ($user) { // if user exists
  	$query = "UPDATE userInfo SET password='$newpass' WHERE username='$username' ";
	mysqli_query($db, $query);
    	header('location: adminPage.html');
  }
}


// Delete User
if (isset($_POST['deleteU'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if ($username == "admin"){
	array_push($errors, "Admin is not allowed as username");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userInfo WHERE username='$username' AND email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
  $query = "DELETE from userInfo WHERE username='$username' ";
  mysqli_query($db, $query);
  header('location: adminPage.html');
  }
}

// CHANGE Role
if (isset($_POST['changeU'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $role = mysqli_real_escape_string($db, $_POST['role']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if ($username == "admin"){
	array_push($errors, "Admin is not allowed as username");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userInfo WHERE username='$username' AND email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
  	$query = "UPDATE userInfo SET level='$role' WHERE username='$username' ";
	mysqli_query($db, $query);
    	header('location: adminPage.html');
  }
}





?>
