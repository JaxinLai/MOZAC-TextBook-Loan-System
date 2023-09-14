
<?php

include "connect.php";
include "headstu.php";
error_reporting(0); //turn off error reporting
session_start();
if(!isset($_SESSION['Account_Email']) && !isset($_SESSION['Account_Password']))
{
  $stuemail=$_SESSION['account_email'];
  $stupassword=$_SESSION['account_password'];
  $studentidold=$_SESSION['studentoldid'];
  $_SESSION['loanidget'];

}

?>
        <body id="bgColor">

                <section>
                    <p></p>
                        <center> 
                           
<?php

$sql2 = "SELECT * FROM loan Where account_id = '".$studentidold."'";
            $result2=$conn->query($sql2);

            if (mysqli_num_rows($result2) > 0) {
     
                while($row2= $result2->fetch_assoc()){

                    $loanid=$row2['LOAN_ID'];
                    $_SESSION['loanidget']=$row2['LOAN_ID'];

                }
    echo"</table>";
} else {
}




$sql3 = "SELECT * FROM loan_textbook Where LOAN_ID = '".$loanid."'";
$result3=$conn->query($sql3);

if (mysqli_num_rows($result3) > 0) {
    echo "<p>";
    echo "<p>";

    echo "<center><h2>Loan Information</h2></center>";
    echo "<table>";
    echo "<tr><th>ISBN_ID</th><th>QUANTITY</th><th>TIME_RETURNED</th>
    <th>Status</th><th colspan='2'>Update</th>";

    while($row3= $result3->fetch_assoc()){
        echo "<tr>";
        echo"<td>".$row3['ISBN_ID']."</td>";
        echo"<td>".$row3['Quantity']."</td>";
        echo"<td>".$row3['Loan_Period']."</td>";
        echo"<td>".$row3['Status_book']."</td>";
    ?>
     <td align="center"><a class="btn3" href="s_loan_infoupdate.php?id=<?php echo $row3["ISBN_ID"]; ?>">Update</a></td>
     <?php
    }

echo"</table>";
} else {
}

?>
<br><br><br>
    <h2 class="center">Generate Loan Information Report</h2>
    <a href="printPDF.php"><img class="center" src="img/pdf.png" style="width:300px;height:300px;"></a>
            

                        </center>
                    </section>
                        

        </body>

        <?php
        $conn->close();
?>

<footer>
    <h5 class="right">Copyright &copy; MEE2141@moe.edu.my</h5>
        <p class="right"> Contact us:</p> 
        <p class="right">
            <a href="https://www.instagram.com/explore/locations/422068988211742/sekolah-menengah-sains-muzaffar-syah-melaka-mozac/?hl=en"><img src="img/instagram.png" width="70" height="60"></a>
            <a href="https://ms-my.facebook.com/mee2141/"><img src="img/facebook.png" width="70" height="60"></a><br>
             Tel : +606-232 0833    Fax : +606-232 0833 
            </p>
</footer>