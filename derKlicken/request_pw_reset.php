<html>
<?php
$db = mysqli_connect('brahe.canisius.edu', 'CSC380b', 'rome73', 'CSC380b_p1');
$username = $_POST["username"];
//$username = "Mark";    // for standalone debugging purposes

if ($username == "") {
    print("<script>alert('Your username is empty')</script>");
    return;
}

$email_query = "SELECT * FROM userInfo WHERE username='$username'";
$result = mysqli_query($db, $email_query);
$email_array = mysqli_fetch_assoc($result);
$email = $email_array['email'];
$start = 1000000000000000;
$refnum =  rand($start, $start*2-1);
$s = "\n" . $username . ";" .  date("Y-m-d h:m", time()) . ";". $refnum;
file_put_contents("requests.txt", $s, FILE_APPEND);

$url = "http://brahe.canisius.edu/~CSC380b/derKlicken/actual_reset_form.php?username=$username&refnum=$refnum";
$mail_message = "Click on the following link.\n" . $url;
mail ($email, "Password reset", $mail_message);
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
Now check your email for a message that has a link to click on.
<br>
Or you can cut and paste that URL into your browser here.
</html>