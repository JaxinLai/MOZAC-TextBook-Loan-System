<?php
session_start();
include "connect.php";
include "headteac.php";

$isbnID = $_POST['ISBN_ID'];
$textbookName = $_POST['TEXTBOOK_NAME'];
$publisherName = $_POST['PUBLISHER_NAME'];
$bookYear = $_POST['BOOK_YEAR'];
$quantity = $_POST['Quantity'];
$price = $_POST['Price'];

if(!isset($isbnID) || trim($isbnID) == ''){
    header("location: a_addstock.php");
}
else if(!isset($textbookName) || trim($textbookName) == ''){
    header("location: a_addstock.php");
}
else if(!isset($publisherName) || trim($publisherName) == ''){
    header("location: a_addstock.php");
}
else if(!isset($bookYear) || trim($bookYear) == ''){
    header("location: a_addstock.php");
}

else if(!isset($quantity) || trim($quantity) == ''){
    header("location: a_addstock.php");
}

else if(!isset($price) || trim($price) == ''){
    header("location: a_addstock.php");
}
else{
$sql = "INSERT INTO textbook (ISBN_ID,TEXTBOOK_NAME,PUBLISHER_NAME,BOOK_YEAR,Quantity,Price)
VALUES ('$isbnID', '$textbookName', '$publisherName', '$bookYear', '$quantity', '$price')"
or die ("Error inserting data into table");

if($conn->query($sql)===TRUE)
{
    echo "<p style = 'text-align:center'>New record created successfully";
}

else
{
    echo "<p style = 'text-align:center'>Error: " . $sql . "<br>" . $conn->error;
}
}
//Closes specified connection
$conn->close();

?>