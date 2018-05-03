<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'book store';
$postName = $_POST['Title'];
$postISBN = $_POST['ISBN'];
$postAuthor = $_POST['Author'];
$postPublisher = $_POST['Publisher'];
$postEdition = $_POST['Edition'];
$postPrice = $_POST['Price'];
$postOnHand = $_POST['OnHand'];
$postImage = $_POST['bookImage'];


$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");
$dbAdd = ("INSERT INTO book (Book_title, ISBN, Author_name, Publishier, Edition, Book_price, Book_number, Book_image) VALUES ('$postName','$postISBN','$postAuthor','$postPublisher','$postEdition','$postPrice','$postOnHand','$postImage')");
if(mysqli_query($db,$dbAdd)){
    echo ("Book has been added successfully!");
}
else{
    echo ("Could not do it!");
}

    
?>