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
  padding: 10px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 25%;
  padding: 15px;
  margin: auto;
  margin-bottom: 10px;
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
    var x1 = document.forms["myForm"]["question"].value;
    var x2 = document.forms["myForm"]["tags"].value;
    var x3 = document.forms["myForm"]["type"].value;
    var x4 = document.forms["myForm"]["answer"].value;
	if( x == ""){
		alert("Name must be filled out");
		return false:
	}
    if( x1 == ""){
		alert("Name must be filled out");
		return false:
	}
    if( x2 == ""){
		alert("Name must be filled out");
		return false:
	}
    if( x3 == ""){
		alert("Name must be filled out");
		return false:
	}
    if( x4 == ""){
		alert("Answer must be filled out");
		return false:
	}
	else{
	return true;
	}
}
</script>
    
<form name="myForm" method="post" onsubmit="return validateForm()" action="updateQuestion.php">
<?php include('errors.php'); ?> 
 <div class="container">
    <h1>Update Question</h1>
    <p>Please fill in this form to update a question.</p>
    <hr>

    <label for="Title"><b>Title</b></label>
    <input type="text" placeholder="Enter Title" name="title" required>

    <label for="Question Text"><b>Actual Question</b></label>
    <input type="text" placeholder="Enter Question" name="question" required>

    <label for="Tags"><b>Tags (Seperate by Commas</b></label>
    <input type="text" placeholder="Enter tags" name="tags" required>

    <label for="Type"><b>Type (Either Text or MC)</b></label>
    <input type="text" placeholder="Enter type" name="type" required>

    <label for="Class"><b>Enter Class</b></label>
    <input type="text" placeholder="Enter Class" name="class" >
      
    <label for="Responses"><b>Enter Responses (Only do if Type is MC)</b></label>
    <input type="text" placeholder="Enter Responses" name="responses" >
    
    <label for="Answer"><b>Enter Answer</b></label>
    <input type="text" placeholder="Enter Answer" name="answer" >
    <hr>
    
    <button type="submit" name="updateQuestion" class="registerbtn">Update</button>
  </div>
</body>
</html>
