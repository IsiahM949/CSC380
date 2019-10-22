<?php include('server.php') ?>
<html>
<head>
<style>
* {box-sizing: border-box;
font-family: Verdana;
text-align: center;
background-color: #7be5cb;}
/* https://www.w3schools.com/howto/howto_css_signup_form.asp */

/* Add padding to containers */
.container {
  padding: 8px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 25%;
  padding: 20px;
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
  border: 1px solid #5b9184;
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
  width: 50%;
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
  background-color:#7be5cb;
  text-align: center;
}  
    
</style>        
    
</head>
<body>
<script>
function validate() {
	var x = document.forms["myForm"]["realname"].value;
    var x1 = document.forms["myForm"]["email"].value;
    var x2 = document.forms["myForm"]["user"].value;
    var x3 = document.forms["myForm"]["level"].value;
    var x4 = document.forms["myForm"]["classes"].value;
    var x5 = document.forms["myForm"]["psw"].value;
    var x6 = document.forms["myForm"]["psw-repeat"].value;
	if( x == ""){
		alert("Name must be filled out");
		return false:
	}
    if( x1 == ""){
		alert("Email must be filled out");
		return false:
	}
    if( x2 == ""){
		alert("User must be filled out");
		return false:
	}
    if( x3 == ""){
		alert("Level must be filled out");
		return false:
	}
    if( x4 == ""){
		alert("Classes must be filled out");
		return false:
	}
    if(x5 != x6)
        alert("The passwords do not match");
        return false;
	else{
	return true;
	}
}
</script>
    
    
<form name="myForm" method="post" onsubmit="return validateForm()" action="register.php" >
<?php include('errors.php'); ?>
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="realname"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="realname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
      
    <label for="level"><b>Level</b></label>
    <input type="text" placeholder="Enter Level" name="level" required>
     
    <label for="classes"><b>Classes</b></label>
    <input type="text" placeholder="Enter Classes(Seperated By Commas)" name="classes" required>

    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" name="reg_user" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="login2.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html>
