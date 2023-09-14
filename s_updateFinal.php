<?php
session_start();
include("secondStu.php");
include("connect.php");


if(!isset($_SESSION['Account_Email']) && !isset($_SESSION['Account_Password']))
{
  $stuemail=$_SESSION['account_email'];
  $stupassword=$_SESSION['account_password'];
$_SESSION['stuid'];
}

$id=$_SESSION['stuid'];
$aname=$_POST['a_name'];
$aphone=$_POST['a_phone'];
$aemail=$_POST['a_email'];
$apassword=$_POST['a_password'];
$acpassword=$_POST['a_cpassword'];




if(!isset($aname) || trim($aname) == ''){
    header("location: s_update.php");
}
else if(!isset($aphone) || trim($aphone) == ''){
    header("location: s_update.php");
}
else if(!isset($aemail) || trim($aemail) == ''){
    header("location: s_update.php");
}
else if(!isset($apassword) || trim($apassword) == ''){
    header("location: s_update.php");
}
else if(!isset($acpassword) || trim($acpassword) == ''){
    header("location: s_update.php");
}



if($apassword==$acpassword){

$sql="UPDATE account SET ACCOUNT_NAME='".$aname."',ACCOUNT_PHONE='".$aphone."',ACCOUNT_PASSWORD='".$apassword."',
    ACCOUNT_EMAIL='".$aemail."' where ACCOUNT_ID='$id'";
$result=$conn->query($sql);

if($conn->query($sql)===TRUE){
    echo"<p style='text-align:center'>Data $id Had Been Updated!";
    echo"<p>";
    echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\s_view_acc.php'>";
}else{
    echo"<p>";
    echo"<p style='text-align:center'>Error:".$sql."<br>".$conn->error;
    echo"<p>";
}

}
else{

    echo "<p style='text-align:center'>False to update because password and confirm paswword not same";
    echo "<meta http-equiv='refresh' content='4;url=..\FinalProject\s_update.php'>";

}

$conn->close();
?>