<?php
session_start();
//$_POST = array ("username" => "calkinsa", "password" => "12345");
//print_r($_POST);
$f = fopen("passwords.txt","r" );
$text = fread($f,filesize("passwords.txt"));
fclose($f);
$lines = explode("\n", $text);
foreach($lines as $line){
    $parts = explode(",", $line);
    $username = $parts[0];
    $password = $parts[1];
    if($username == $_POST["username"]){
        if($password == $_POST["password"]){
            echo "success";
            return;
        }

    }
    echo "failure";
}
session_destroy();
?>
