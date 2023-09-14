<?php
session_start();
include("headteac.php");
include("connect.php");



$id=$_SESSION['studentid'];
$aname=$_POST['a_name'];
$aphone=$_POST['a_phone'];
$aemail=$_POST['a_email'];
$apassword=$_POST['a_password'];


if(!isset($aname) || trim($aname) == ''){
    header("location: a_studentinfo.php");
}
else if(!isset($aphone) || trim($aphone) == ''){
    header("location: a_studentinfo.php");
}
else if(!isset($aemail) || trim($aemail) == ''){
    header("location: a_studentinfo.php");
}
else if(!isset($apassword) || trim($apassword) == ''){
    header("location: a_studentinfo.php");
}



$sql="UPDATE account SET ACCOUNT_NAME='".$aname."',ACCOUNT_PHONE='".$aphone."',ACCOUNT_PASSWORD='".$apassword."',
    ACCOUNT_EMAIL='".$aemail."' where ACCOUNT_ID='$id'";
$result=$conn->query($sql);

if($conn->query($sql)===TRUE){
    echo"<p style='text-align:center'>Data $id Had Been Updated!";
    echo"<p>";
    echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\a_studentinfo.php'>";
}else{
    echo"<p>";
    echo"<p style='text-align:center'>Error:".$sql."<br>".$conn->error;
    echo"<p>";
}

$conn->close();
?>