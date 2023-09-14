<?php
session_start();
include("headteac.php");
include("connect.php");



$sid=$_POST['stock_ID'];
$sn=$_POST['stock_name'];
$spbn=$_POST['stock_pbname'];
$sy=$_POST['stock_year'];
$sq=$_POST['stock_quantity'];
$sp=$_POST['stock_price'];



if(!isset($sid) || trim($sid) == ''){
    header("location: a_stockupdate.php");
}
else if(!isset($sn) || trim($sn) == ''){
    header("location: a_stockupdate.php");
}
else if(!isset($spbn) || trim($spbn) == ''){
    header("location: a_stockupdate.php");
}
else if(!isset($sy) || trim($sy) == ''){
    header("location: a_stockupdate.php");
}
else if(!isset($sq) || trim($sq) == ''){
    header("location: a_stockupdate.php");
}
else if(!isset($sp) || trim($sp) == ''){
    header("location: a_stockupdate.php");
}



$sql="UPDATE textbook SET ISBN_ID='".$sid."',TEXTBOOK_NAME='".$sn."',PUBLISHER_NAME='".$spbn."',BOOK_YEAR='".$sy."',QUANTITY='".$sq."',
    PRICE='".$sp."' where ISBN_ID='$sid'";
$result=$conn->query($sql);

if($conn->query($sql)===TRUE){
    echo"<p style='text-align:center'>Data $sid Had Been Updated!";
    echo"<p>";
    echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\a_stockview.php'>";
}else{
    echo"<p>";
    echo"<p style='text-align:center'>Error:".$sql."<br>".$conn->error;
    echo"<p>";
}

$conn->close();
?>