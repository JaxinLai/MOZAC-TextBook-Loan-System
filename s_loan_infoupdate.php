
<?php

include "connect.php";
include "headstu.php";

session_start();
if(!isset($_SESSION['Account_Email']) && !isset($_SESSION['Account_Password']))
{
  $stuemail=$_SESSION['account_email'];
  $stupassword=$_SESSION['account_password'];
  $id = $_REQUEST['id'];
  $lli=$_SESSION['loanidget'];
  $studentidold=$_SESSION['studentoldid'];


}

?>
        <body id="bgColor">

                <section>
                    <p></p>
                        <center> 
                           
<?php


$sql="UPDATE loan_textbook SET Status_book	='Returned' where ISBN_ID='$id'";
$result=$conn->query($sql);

if($conn->query($sql)===TRUE){
    echo"<p style='text-align:center'>Data $id Had Been Updated!";
    echo"<p>";



    $sql8="UPDATE textbook SET QUANTITY=QUANTITY+1 WHERE ISBN_ID='$id'";
    $resul8=$conn->query($sql8);
    echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\s_loan_info.php'>";

}else{
    echo"<p>";
    echo"<p style='text-align:center'>Error:".$sql."<br>".$conn->error;
    echo"<p>";
}



$sql12 = "SELECT * FROM loan_textbook where LOAN_ID='$lli'";
$result12=$conn->query($sql12);

if (mysqli_num_rows($result12) > 0) {
 
    while($row12= $result12->fetch_assoc()){

        $textbookid12=$row12['Status_book'];
        $textbookid12=array();


        array_push($textbookid12, $row12['Status_book']);         
             
    }
} else {
}



$a2=array("RETURNED");
$resultdifferent=array_diff($textbookid12,$a2);

foreach($resultdifferent as $nn)
{ echo $nn; }

if($nn!="borrow"){
    $sql10="UPDATE LOAN SET STATUS='Done' WHERE ACCOUNT_ID='$studentidold'";
    $resul10=$conn->query($sql10);



   }


?>
                        </center>
                    </section>
                        

        </body>

        <?php
        $conn->close();
?>