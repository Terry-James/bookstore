<?php
session_start();
//Connect to database
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'book store';
$cookie_name = "user";

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");
//Email/Username
$emailIn = mysqli_real_escape_string($db, $_POST['inputManagerUserName']);

//password
$password = mysqli_real_escape_string($db, $_POST['inputPassword']);


//Using email value passed by POST select user matching this email

$sql = "SELECT * FROM manager WHERE Manager_Email='$emailIn'  AND Password = '$password'";

//Query database
$result = mysqli_query($db, $sql);
//Get associated values
$row = mysqli_fetch_assoc($result);

$dbPass = $row["Password"];
$dbEmail = $row["Manager_Email"];
//Verify password, if it matches
if ($password == $dbPass && $emailIn == $dbEmail){
    $_SESSION['managerEmail'] = $dbEmail;
	header ("Location: managerPage.php");
}
//Otherwise return to index with a failure value set
else
{	
	header("Location: ManagerLoginPage.html");
    exit();
}
?>