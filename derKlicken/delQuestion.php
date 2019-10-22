<?php include('teacherServer.php') ?>
<html>
<head>
<style>
* {box-sizing: border-box;
font-family: Verdana;
text-align: center;
background-color: #ea8181;}


/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 25%;
  padding: 15px;
  margin: auto;
  display: block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}  
    
</style>        

</head>
<body>
<script>
function validate() {
	var x = document.forms["myForm"]["title"].value;
	if( x == ""){
		alert("Title must be filled out");
		return false:
	}
	else{
	return true;
	}
}
</script>    
    

<form name="myForm" method="post" onsubmit="return validateForm()" action="delQuestion.php">
<?php include('errors.php'); ?> 
 <div class="container">
    <h1>Delete Question</h1>
    <p>Please fill in this form to delete question.</p>
    <hr>

    <label for="Title"><b>Title</b></label>
    <input type="text" placeholder="Enter Title" name="title" required>
    <hr>
    
    <button type="submit" name="delQuestion" class="registerbtn">Delete</button>
  </div>
</body>
</html>
