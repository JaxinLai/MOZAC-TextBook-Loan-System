<?php
session_start();

include ("connect.php");
include ("headteac.php");

$id=$_REQUEST["id"];

$sql = "DELETE from account where ACCOUNT_ID='".$id."'";
$sql1 = "DELETE from loan where ACCOUNT_ID='".$id."'";


if($conn->query($sql1)===TRUE && $conn->query($sql)===TRUE){
    echo "<p style='text-align:center'>Data $id Had Been Delete!";
    echo "<p>";
    echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\a_studentinfo.php'>";

}
else
{
    echo "<p>";
    echo "<p style= 'text-align:center'>Erro:".$sql."<br>".$conn->error;
    echo "<p>";

}


$conn->close();


?>