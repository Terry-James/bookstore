<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'bookstore';

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

if (isset($_POST['Title']) && isset($_POST['ISBN'])){
    $bookInput = $_POST['Title'];
    $ISBNInput = $_POST['ISBN'];
    $bookTitle = ("DELETE FROM book WHERE Book_title = '$bookInput' AND ISBN = '$ISBNInput'");
    if (mysqli_query($db, $bookTitle)) {
        echo ("Book Removed");  
    } 
}
else{
    header("Location:managerPage.html");
    exit();
}