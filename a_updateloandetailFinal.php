<?php
    session_start();
    include "connect.php";
    include "headteac.php";

    $id=$_POST['id'];
    $isbnID=$_POST['i_id'];
    $quantity=$_POST['u_quantity'];
    $loanPeriod=$_POST['u_timePeriod'];
    $statusBook=$_POST['u_statusBook'];

    $sql = "UPDATE loan_textbook set LOAN_ID='$id', ISBN_ID='$isbnID', Quantity='$quantity', Loan_Period='".$loanPeriod."', Status_book='".$statusBook."' WHERE ISBN_ID='$isbnID'";
    $result = $conn->query($sql);   

    if($conn->query($sql)===TRUE)
    {
        echo "<p style='text-align:center'>Data $isbnID Had Been Updated!";
        echo "<p>";
        echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\a_loan_info.php'>";

    }
    else{
        echo"<p>";
        echo"<p style='text-align:center'>Error: ".$sql."<br>".$conn->error;
        echo"<p>";
    }
    $conn->close();
?>