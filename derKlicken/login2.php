<?php include('server.php') ?>
<html>
<head>
<style>
*{box-sizing: border-box;
font-family: Verdana;
text-align:center;
background-color: #7be5cb;}
/* https://www.w3schools.com/howto/howto_css_login_form.asp */

form {
  border: 2px solid #5b9184;
}

/* Full-width inputs */
input[type=text], input[type=password]{
  width: 25%;
  padding: 15px 20px;
  margin: auto;
  margin-bottom: 10px;
  display: block;
  border: 1px solid #ccc;
  background: #f1f1f1;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 12px;
  border: none;
  cursor: pointer;
  width: 10%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Add padding to containers */
.container {
  padding: 12px;
  background-color: #7be5cb;
}

/* The "Forgot password" text */
span.psw {
//  float: right;
  padding-top: 16px;
  margin-top: 16px;
  background-color: #7be5cb;
}
/* The "Make an account" text" */
span.accMake {
  text-align: center;
//  padding-left: 80%;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px){
  span.psw {
    display: block;
    float: none;
  }
}        
              
        
        
</style>
    
    </head>
    <body>
	<h1>Login</h1>
        <form method="post" action="login2.php">
	<?php include('errors.php'); ?>
        <div class="container">
            <label><b>Enter your Username</b></label>
            <input type="text" name="username" required>

            <label><b>Enter your Password</b></label>
            <input type="password" name="password" required>

            <button type="submit" name="log_user">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
            
        <div class="container" style="background-color:#7be5cb">
	    <span class="accMake"> <a href="register.php">Make an account here!</a></span>
            <span class="psw"><a href="changepw.html">Forgot password?</a></span>
        </div>
        </form>
    </body>
</html>
