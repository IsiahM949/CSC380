<?php
$db = mysqli_connect('brahe.canisius.edu', 'CSC380b', 'rome73', 'CSC380b_p1');

$username = $_POST["username"];
$refnum = $_POST["refnum"];
$pw1 = $_POST["password1"];
$pw2 = $_POST["password2"];

/*
$username = "Mark";
$refnum = "2891404146328568";
$pw1 = "cats";
$pw2 = "cats";
*/

//print("username=$username from the get line");
//print("refnum=$refnum from the get line");

if ($pw1 != $pw2) {
     echo "Passwords do not match.  Nothing changed.";
     return;
}
$text = file_get_contents("requests.txt");

$lastline = "";


foreach (explode("\n", $text) as $line) {
    $pieces = explode(";", $line);
    if ($username == $pieces[0]) {
         $lastline = $line;
         //print("\nFound in line = $lastline");
    }
}

if ($lastline == "") {
    print ("Didn't find a request for this username: $username");
    return;
}

$pieces = explode(";", $lastline);
//echo "\npieces[2] = ". $pieces[2];
if ($refnum != $pieces[2]) {
    echo "Refnum is illegal or expired.  Try again.";
    return;
}
$newPass = sha1($pw1);
$change_query = "UPDATE userInfo SET password='$newPass' WHERE username='$username'";
if (mysqli_query($db, $change_query)){
	echo "Your password has been changed. Thank you!";
} else {
	echo "An error has occured.";
}
?>
