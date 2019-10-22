<?php
$username = $_GET["username"];
$refnum = $_GET["refnum"];
?>

<form method="post" action="accept_change.php">
<input type="hidden" name="username" value="<?php echo $username;?>"/>
<input type="hidden" name="refnum" value="<?php echo $refnum;?>"/>
<label>Username:</label>
<input type="text" value="<?php echo $username;?>" name="username"/>
<br>
<label>New password:</label>
<input type="text" name="password1"/>
<br>
<label>New password (again):</label>
<input type="text" name="password2"/>
<p>
<input type="submit" value="Submit change"/>
</form>
