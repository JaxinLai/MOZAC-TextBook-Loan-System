<?php
session_start();

include ("connect.php");
include ("headteac.php");

$id=$_REQUEST["id"];
$isID = $_SESSION['isbnID'];
$loanID = $_SESSION['loanid'];

$sql = "DELETE from loan_textbook where LOAN_ID='" . $loanID . "' AND ISBN_ID ='".$id."'";



if($conn->query($sql)===TRUE){
    echo "<p style='text-align:center'>Data $id Had Been Delete!";
    echo "<p>";
    echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\a_loan_info.php'>";

}
else
{
    echo "<p>";
    echo "<p style= 'text-align:center'>Erro:".$sql."<br>".$conn->error;
    echo "<p>";

}


$conn->close();


?>