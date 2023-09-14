<?php
$resultsame=array();
$resultfinal=array();

error_reporting(0); //turn off error reporting

session_start();
if(!isset($_SESSION['Account_Email']) && !isset($_SESSION['Account_Password']))
{
  $stuemail=$_SESSION['account_email'];
  $stupassword=$_SESSION['account_password'];
}



include "connect.php";
include "headstu.php";

$Final;

$_SESSION['time']=$_POST['time_loan'];

$bm=$_POST['book_bm'];
$bi=$_POST['book_bi'];
$mat=$_POST['book_mat'];
$sains=$_POST['book_sains'];
$sjr=$_POST['book_sjr'];

$_SESSION['Dateloan']=$_POST['time_loan'];


$totalbook=array("$bm","$bi","$mat","$sains","$sjr");

$sql1 = "SELECT * FROM account Where account_email = '".$stuemail."'";
$result1=$conn->query($sql1);

            if (mysqli_num_rows($result1) > 0) {
     
                while($row1= $result1->fetch_assoc()){
                    $id=$row1['ACCOUNT_ID'];
                }
    echo"</table>";
} else {
}


$sql2 = "SELECT * FROM loan Where account_id = '".$id."'";
            $result2=$conn->query($sql2);

            if (mysqli_num_rows($result2) > 0) {
     
                while($row2= $result2->fetch_assoc()){

                    $loanid=$row2['LOAN_ID'];

                }
    echo"</table>";
} else {
}



$sql4 = "SELECT * FROM textbook ";
    $result4=$conn->query($sql4);

    if (mysqli_num_rows($result4) > 0) {
     
        while($row4= $result4->fetch_assoc()){

            $textbookid=$row4['ISBN_ID'];
            $textbookname=array();

            array_push($textbookname, $row4['TEXTBOOK_NAME']);
           $resultsame=array_intersect($totalbook,$textbookname);

                        foreach ($resultsame as $view3) {

                            if($view3!=""){
                            $sql7 = "SELECT ISBN_ID FROM textbook WHERE TEXTBOOK_NAME='$view3'";
                            $result7=$conn->query($sql7);
                        
                            if (mysqli_num_rows($result7) > 0) {
                            
                                while($row7= $result7->fetch_assoc())
                                {
                                                            
                                    $sql3 = "INSERT INTO loan_textbook (LOAN_ID, ISBN_ID, QUANTITY, LOAN_PERIOD, STATUS_BOOK) 
                                    VALUES ('$loanid','$row7[ISBN_ID]','1','','borrow')";
                                    if($conn->query($sql3)===TRUE){
                                    }

                                  
                                    $sql8="UPDATE textbook SET QUANTITY=QUANTITY-1 WHERE TEXTBOOK_NAME='$view3'";
                                    $resul8=$conn->query($sql8);

                                    $sql10="UPDATE LOAN SET STATUS='IN BORROWED', TIME_RETURNED='' WHERE ACCOUNT_ID='$id'";
                                    $resul10=$conn->query($sql10);



                                }
                                }

                            }
                                else
                                {
                                    echo "no adat again";
                                } 
            
           }
                 
        }
} else {
}

echo"<p style='text-align:center'>SUCESSFUL TO LOAN TEXTBOOK";
echo"<p>";
echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\s_loan.php'>";

$conn->close();

?>