<html>
<?php
$db = mysqli_connect('brahe.canisius.edu', 'CSC380b', 'rome73', 'CSC380b_p1');
$username = $_POST["username"];

if ($username == "") {
    print("<script>alert('Your username is empty')</script>");
    return;
}

$email_query = "SELECT * FROM userInfo WHERE username='admin'";
$result = mysqli_query($db, $email_query);
$email_array = mysqli_fetch_assoc($result);
$email = $email_array['email'];

$mail_message = "The user " . $username . " has requested to have their password given to them or changed. Please contact them and help them with their password.";
mail ($email, "User password request", $mail_message);
?>
<head>
<style>
*{box-sizing: border-box;
font-family: Verdana;
text-align:center;
background-color: #7be5cb;}
</style>
</head>
<p>
The admin has been notified that you have forgotten your password or want to change it. 
<br>
They should be in contact with you momentarily.
</html>
