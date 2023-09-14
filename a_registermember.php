<?php

include ("headteac.php");
include "connect.php";
$nm=$_POST['a_name'];
$pass="STUDENTPASS";
$eml=$_POST['a_email'];
$phone=$_POST['a_phone'];
$date=$_POST['a_loan'];

if(!isset($nm) || trim($nm) == ''){
    header("location: a_account_register.php");
}
else if(!isset($eml) || trim($eml) == ''){
    header("location: a_account_register.php");
}
else if(!isset($phone) || trim($phone) == ''){
    header("location: a_account_register.php");
}
else{



$sql = "INSERT INTO account (account_name, account_password, account_phone, account_email, account_row) 
VALUES ('$nm','$pass','$phone','$eml','student')";
if($conn->query($sql)===TRUE){
echo "New record created successfully";
echo "<meta http-equiv='refresh' content='2; url=..\FinalProject\a_account_register.php'>";

}
else{
    echo "Error:". $sql."<br>". $conn->error;
}


$sql12 = "SELECT * FROM account Where ACCOUNT_EMAIL = '$eml' and ACCOUNT_PASSWORD='$pass'";
$result12=$conn->query($sql12);

if (mysqli_num_rows($result12) > 0) {

    while($row= $result12->fetch_assoc()){
     
        $adad=$row['ACCOUNT_ID'];
    }

echo"</table>";
} else {
echo "0 results";
}

function getID($n) { 
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
    for ($i = 0; $i < $n; $i++) { 
      $index = rand(0, strlen($characters) - 1); 
      $randomString .= $characters[$index]; 
    } 
    return $randomString; 
    }

$loanidauto='C'.getID(9);

$sql1 = "INSERT INTO loan (LOAN_ID, ACCOUNT_ID, TIME_LOAN, TIME_RETURNED, STATUS) 
VALUES ('$loanidauto','$adad','$date','','New')";
if($conn->query($sql1)===TRUE){

}
else{
    echo "Error:". $sql1."<br>". $conn->error;
}

}
$conn->close();
?>