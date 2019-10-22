<?php
//https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database
session_start();

// initializing variables
$errors = array(); 

// connect to the database
$db = mysqli_connect('brahe.canisius.edu', 'CSC380b', 'rome73', 'CSC380b_p1');

// Add Question
if (isset($_POST['newQuestion'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $question = mysqli_real_escape_string($db, $_POST['question']);
  $tags = mysqli_real_escape_string($db, $_POST['tags']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $class = mysqli_real_escape_string($db, $_POST['class']);
  $responses = mysqli_real_escape_string($db, $_POST['responses']);
  $answer    = mysqli_real_escape_string($db, $_POST['answer']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Title is required"); }
  if (empty($question)) { array_push($errors, "Question is required"); }
  if (empty($tags)) { array_push($errors, "Tags are required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM questions WHERE question ='$question'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['question'] === $question) {
      array_push($errors, "Question already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO questions (title, question, tags, type, class, responses, correctAnswer) 
  			  VALUES('$title', '$question', '$tags', '$type', '$class', '$responses', '$answer' )";
  	mysqli_query($db, $query);
  	$_SESSION['title'] = $title;
        header('location: teacher.php');
  }
  else{
	array_push($errors, "error");
  }
}


// Delete Question
if (isset($_POST['delQuestion'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($db, $_POST['title']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Title is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM questions WHERE title='$title' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $question = mysqli_fetch_assoc($result);

  if ($question) { // if user exists
  $query = "DELETE from questions WHERE title='$title' ";
  mysqli_query($db, $query);
  header('location: teacher.php');
  }
}


// Update Question
if (isset($_POST['updateQuestion'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $question = mysqli_real_escape_string($db, $_POST['question']);
  $tags = mysqli_real_escape_string($db, $_POST['tags']);
  $type = mysqli_real_escape_string($db, $_POST['type']);
  $class = mysqli_real_escape_string($db, $_POST['class']);
  $responses = mysqli_real_escape_string($db, $_POST['responses']);
  $answer = mysqli_real_escape_string($db, $_POST['answer']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Username is required"); }
  if (empty($question)) { array_push($errors, "Question is required"); }
  if (empty($tags)) { array_push($errors, "Tags is required"); }
  if (empty($type)) { array_push($errors, "Type is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM questions WHERE title='$title'LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $q = mysqli_fetch_assoc($result);
  
  if ($q) { // if question exists
   // $query1 = "UPDATE questions SET title='$title' WHERE title='$title' ";
    $query2 = "UPDATE questions SET question ='$question' WHERE title='$title' ";
    $query3 = "UPDATE questions SET tags='$tags' WHERE title='$title' ";
    $query4 = "UPDATE questions SET type='$type' WHERE title='$title' ";
    $query5 = "UPDATE questions SET class='$class' WHERE title='$title' ";
    $query6 = "UPDATE questions SET responses='$responses' WHERE title='$title' ";
    $query7 = "UPDATE questions SET correctAnswer='$answer' WHERE title='$title' ";
   // mysqli_query($db, $query1);
    mysqli_query($db, $query2);
    mysqli_query($db, $query3);
    mysqli_query($db, $query4);
    mysqli_query($db, $query5);
    mysqli_query($db, $query6);
    mysqli_query($db, $query7);
    header('location: teacher.php');
  }
}



?>
