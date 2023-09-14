<?php
include "connect.php";
include "headstu.php";

session_start();
if(!isset($_SESSION['Account_Email']) && !isset($_SESSION['Account_Password']))
{
  $stuemail=$_SESSION['account_email'];
  $stupassword=$_SESSION['account_password'];
  $studentidold=$_SESSION['studentoldid'];

}
?>

        <body id="bgColor">
                                               
                <section>
                    <p></p>
                        <center>
                        <form id="myForm" name="myForm" method="post" action="s_loanfinal.php">

                        <?php
                        
$sql4 = "SELECT * FROM loan Where ACCOUNT_ID = '".$studentidold."'";
$result4=$conn->query($sql4);

if (mysqli_num_rows($result4) > 0) {
    echo "<center><h2>Loan Making</h2></center>";
    echo "<table>";
    echo "<tr><th>Loan ID</th><th>Time Loan</th><th>Time Returned</th><th>Status</th>";

    while($row4= $result4->fetch_assoc()){
        echo "<tr>";
        echo"<td>".$row4['LOAN_ID']."</td>";
        echo"<td>".$row4['TIME_LOAN']."</td>";
        echo"<td>".$row4['TIME_RETURNED']."</td>";
        echo"<td>".$row4['STATUS']."</td>";

        $_SESSION['lloo']=$row4['LOAN_ID'];

        $_SESSION['date']=$row4['TIME_LOAN'];
    ?>
     <?php
    }

echo"</table>";
} else {
}

$conn->close();


?>
<br><br>
                            <h2>Judul Buku</h2>
                            <table style="width:30%;margin:10px;">
                            <tr colspan="2">
                                <th colspan="2">
                                    <input type="checkbox" name="book_bm" value="BAHASA_MELAYU"> Bahasa Melayu <br> <br>
                                    <input type="checkbox" name="book_bi" value="BAHASA_ENGLISH"> Bahasa Inggeris <br><br>
                                    <input type="checkbox" name="book_mat" value="MATEMATIK"> Matematik <br><br>
                                    <input type="checkbox" name="book_sains" value="SAINS"> Sains <br><br>
                                    <input type="checkbox" name="book_sjr" value="SEJARAH"> Sejarah <br>
                                    </select>   

 
                                </th>    

                            </tr>
                            </table>                                
                                <input type="submit" name="submit" value="Save" class="button">
                                <input type="reset" name="clear" value="Clear" class="button">

                        </form>
                        </center>                        
                    </section>
                    <footer>
                        <h5 class="right">Copyright &copy; MEE2141@moe.edu.my</h5>
                        <p class="right"> Contact us:</p> 
                        <p class="right">
                            <a href="https://www.instagram.com/explore/locations/422068988211742/sekolah-menengah-sains-muzaffar-syah-melaka-mozac/?hl=en"><img src="img/instagram.png" width="70" height="60"></a>
                            <a href="https://ms-my.facebook.com/mee2141/"><img src="img/facebook.png" width="70" height="60"></a><br>
                             Tel : +606-232 0833    Fax : +606-232 0833 
                        </p>
                    </footer>
        </body>
