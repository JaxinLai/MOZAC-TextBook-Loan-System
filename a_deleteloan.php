<?php
session_start();

include ("connect.php");
include ("headteac.php");

$id=$_REQUEST["id"];

$sql = "DELETE from loan where LOAN_ID='".$id."'";


if($conn->query($sql)===TRUE){
    echo "<p style='text-align:center'>Data $id Had Been Delete!";
    echo "<p>";
}
else
{
    echo "<p>";
    echo "<p style= 'text-align:center'>Erro:".$sql."<br>".$conn->error;
    echo "<p>";

}


$conn->close();


?>