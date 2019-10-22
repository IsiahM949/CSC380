<?php
//https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('brahe.canisius.edu', 'CSC380b', 'rome73', 'CSC380b_p1');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['realname']);
  $username = mysqli_real_escape_string($db, $_POST['user']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['psw']);
  $password_2 = mysqli_real_escape_string($db, $_POST['psw-repeat']);
  $level      = mysqli_real_escape_string($db, $_POST['level']);
  $classes    = mysqli_real_escape_string($db, $_POST['classes']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  if ($username == "admin"){
	array_push($errors, "Admin is not allowed as username");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM userInfo WHERE username='$username' OR email='$email' LIMIT 1";
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
  	$password_3 = sha1($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO userInfo (name, username, email, password, level, classes) 
  			  VALUES('$name', '$username', '$email', '$password_3', '$level', '$classes' )";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
	$_SESSION['level'] = $level;
  	$_SESSION['success'] = "You are now logged in";

	if($level == "teacher" || $level == "Teacher"){
  		header('location: teacher.php');
	}
	if($level == "student" || $level == "Student"){
		header('location: student.php');
	}
	else{
		array_push($errors, "The level you entered is not allowed only Teacher and Student are permitted");
	}
  }
}

// LOGIN USER
if (isset($_POST['log_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = SHA1($password);
  	$query = "SELECT * FROM userInfo WHERE username='$username' AND password ='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
	  $user1 = mysqli_fetch_assoc($results);
	  if( $user1['level'] == "teacher" || $user1['level'] == "Teacher"){
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: teacher.php');
	  }
	  if( $user1['level'] == "student" || $user1['level'] == "Student"){
	  $_SESSION['username'] = $username;
	  $_SESSION['success'] = "You are now logged in";
	  header('location: student.php');
	  }
	  if( $user1['level'] == "admin"){
	  $_SESSION['username'] = $username;
	  $_SESSION['success'] = "You are now logged in";
	  header('location: adminPage.html');
	  }

  	}
	else {
		array_push($errors, "Wrong username/password combination");
	}
  }
}

?>
