<?php
include "connect.php";
include "headstu.php";
error_reporting(0); //turn off error reporting
session_start();
if(!isset($_SESSION['Account_Email']) && !isset($_SESSION['Account_Password']))
{
  $stuemail=$_SESSION['account_email'];
  $stupassword=$_SESSION['account_password'];
  $_SESSION['stuid'];
  $studentidold=$_SESSION['studentoldid'];

}


?>
       <body id="bgColor">

                <section>
                    <p></p>
                        <center> 
                            <?php
                        $sql = "SELECT * FROM account Where ACCOUNT_ID = '$studentidold'";
            $result=$conn->query($sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<center><h2>View Account</h2></center>";
                echo "<table>";
                echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Passowrd</th>
                <th>Status</th>";
            
                while($row= $result->fetch_assoc()){
                    echo "<tr>";
                    echo"<td>".$row['ACCOUNT_NAME']."</td>";
                    echo"<td>".$row['ACCOUNT_PHONE']."</td>";
                    echo"<td>".$row['ACCOUNT_EMAIL']."</td>";
                    echo"<td>".$row['ACCOUNT_PASSWORD']."</td>";
                    echo"<td>".$row['ACCOUNT_ROW']."</td>";

                    $_SESSION['stuid']=$row['ACCOUNT_ID'];
                }
            
    echo"</table>";
} else {
    echo "0 results";
}


$conn->close();

?>
<br><br>
            <a class="btn1" href="s_update.php">Update Profile</a>


            </form>
        </table>
        </center>
       </section>                     
        </body>
        <footer>
            <h5 class="right">Copyright &copy; MEE2141@moe.edu.my</h5>
            <p class="right"> Contact us:</p> 
            <p class="right">
                <a href="https://www.instagram.com/explore/locations/422068988211742/sekolah-menengah-sains-muzaffar-syah-melaka-mozac/?hl=en"><img src="img/instagram.png" width="70" height="60"></a>
                <a href="https://ms-my.facebook.com/mee2141/"><img src="img/facebook.png" width="70" height="60"></a><br>
                Tel : +606-232 0833    Fax : +606-232 0833 
             </p>
        </footer>
</html>