<?php
session_start();
if(!isset($_SESSION['managerEmail'])){
  header("Location: ManagerLoginPage.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update a Book</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="cssFiles/mainCSS.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body style="background-image: url(images/paper.png)">

<div class="jumbotron text-center" id="top" style="background-image: url(images/books.png)"></div>

<div class="col-sm-12">
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="managerPage.php">
      Home
    </a>
    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="addBook.php">Add a Book</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Orders.php">Review Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="DeleteBook.php">Remove a Book</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="resupplyBooks.php">Check Inventory</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="logOut1.php">Log Out</a>
      </li>
    </ul>
  </nav>
</div>
</br>

<?php
$db_host = 'localhost';
$db_username = 'root';
$db_pass = '';
$db_name = 'book store';

$db = new mysqli($db_host, $db_username, $db_pass,$db_name) or die("Can't connect to MySQL Server");

$selectOrder = ("SELECT Book_title, Customer_email, Date, Order_price, Delivery_method, Delivery_id  FROM book_order, book 
                where book.ISBN = book_order.Book_ISBN ORDER BY Date");

$queryOrder = mysqli_query($db, $selectOrder) or die ("Could not work");

if (mysqli_num_rows($queryOrder) > 0){
   	echo "<center><h5> Book Order Summary </h5></center> </br>";				   
    echo "<div style = 'top: 200pt; margin:0 auto; width: 800px; background-color: AntiqueWhite'>\n";
    echo "<table border = '1' style='border-color: white'>";
    echo "<tr> <th style ='padding: 15px; text-align: center'> Book Title </th> <th style ='padding: 15px; text-align: center'> Customer Email </th> 
          <th style ='padding: 15px; text-align: center'> Order Date </th> <th style ='padding: 15px; text-align: center'> Order Price </th>
          <th style ='padding: 15px; text-align: center'> Delivery Method </th> 
          <th style ='padding: 15px; text-align: center'> Delivery Id </th> </tr>\n";	  
    while($row = mysqli_fetch_assoc($queryOrder)){
        echo '<tr><td style ="padding: 15px; text-align: center">'.$row['Book_title'].'</td>';
        echo '<td style ="padding: 15px; text-align: center">'.$row['Customer_email'].'</td>';
        echo '<td style ="padding: 15px; text-align: center">'.$row['Date'].'</td>';
        echo "<td style ='padding: 15px; text-align: center'>$".$row['Order_price']."</td>";
        echo "<td style ='padding: 15px; text-align: center'>".$row['Delivery_method']."</td>";
        echo "<td style ='padding: 15px; text-align: center'>".$row['Delivery_id']."</td></tr>";
    }
    echo "</table>\n";
    echo "</div>";
    
}

else{
	echo "<center> No results! </center>";
}
?>
<br>