<?php
session_start();
include("headteac.php");
include("connect.php");



$id=$_SESSION['loanid'];
$aloanid=$_POST['id'];
$aaccount=$_POST['a_account'];
$atimeloan=$_POST['a_timeloan'];
$atimereturned=$_POST['a_timereturned'];
$astatus = $_POST['a_status'];


$sql="UPDATE loan SET LOAN_ID='".$aloanid."',ACCOUNT_ID='".$aaccount."',TIME_LOAN='".$atimeloan."',
    TIME_RETURNED='".$atimereturned."', STATUS = '".$astatus."' where LOAN_ID='$id'";
$result=$conn->query($sql);

if($conn->query($sql)===TRUE){
    echo"<p style='text-align:center'>Data $id Had Been Updated!";
    echo"<p>";
    echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\a_loan_info.php'>";
}else{
    echo"<p>";
    echo"<p style='text-align:center'>Error:".$sql."<br>".$conn->error;
    echo"<p>";
}

$conn->close();
?>