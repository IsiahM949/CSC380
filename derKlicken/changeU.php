<?php include('adminServer.php') ?>
<html>
<head>
<style>
*  {box-sizing: border-box;
 font-family: Verdana;
 text-align:center;
 background-color: #f2d97d;}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
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
	var x = document.forms["myForm"]["user"].value;
    var x1 = document.forms["myForm"]["email"].value;
    var x2 = document.forms["myForm"]["role"].value;
	if( x == ""){
		alert("User must be filled out");
		return false:
	}
    if( x1 == ""){
		alert("Email must be filled out");
		return false:
	}
    if( x2 == ""){
		alert("Role must be filled out");
		return false:
	}
	else{
	return true;
	}
}
</script>
    
    
<form name="myForm" method="post" onsubmit="return validateForm()" action="changeU.php">
<?php include('errors.php'); ?> 
 <div class="container">
    <h1>Change User Role</h1>
    <p>Enter Username and Email of Account to change role of account</p>
    <hr>

    <label for="Username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>

    <label for="Email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="Role"><b>Role</b></label>
    <input type="text" placeholder="Enter New Role" name="role" required>
    <hr>
    
    <button type="submit" name="changeU" class="registerbtn">Add</button>
  </div>
</body>
</html>
