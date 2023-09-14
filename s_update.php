<?php
session_start();
include "connect.php";
include "secondStu.php";

if(!isset($_SESSION['Account_Email']) && !isset($_SESSION['Account_Password']))
{
  $stuemail=$_SESSION['account_email'];
  $stupassword=$_SESSION['account_password'];
  $_SESSION['stuid'];

}





?>
    


<script language="JavaScript">


	function validateForm() {

        let b = document.forms["myForm"]["a_email"].value;
	let c = document.forms["myForm"]["a_name"].value;
	let d = document.forms["myForm"]["a_phone"].value;
    let e = document.forms["myForm"]["a_password"].value;
    let f = document.forms["myForm"]["a_cpassword"].value;


	if (b == "") {
		alert("Please enter the email value");
		return false;
  	}
	else if (c == "") {
		alert("Please enter the name value");
		return false;
  	}
	else if (d == "") {
		alert("Please enter the phone value ");
		return false;
  	}
      else if (e == "") {
		alert("Please enter the password value");
		return false;
  	}
      else if (f == "") {
		alert("Please enter the confirm password value");
		return false;
  	}
      else if (e != f) {
		alert("Please enter the same password  value");
        header("location: s_update.php");
      	}

}
</script>
    
        <body id="bgColor">

                <section>
                    <p></p>
                        <center> 

                        <?php
                        $sql = "SELECT *from account where ACCOUNT_EmAIL='" . $stuemail . "'";
                            $result = $conn->query($sql);

                            if($result->num_rows>0){
                                //output data of each row

                            //data id 问题

                                while($row=$result->fetch_assoc()){
                                    echo "<center><h2>Update Account Profile</h2></center>";
                                    echo "<form method='post' action='s_updateFinal.php' name='myForm'>";
                                    echo "<table align='center' border='1' width='50%'>";
                                    echo "<tr><th>New Name: </th><td><input type='text' name='a_name' value='" . $row['ACCOUNT_NAME'] . "'</td></tr>";
                                    echo "<tr><th>New Phone: </th><td><input type='text' name='a_phone' value='" . $row['ACCOUNT_PHONE'] . "'</td></tr>";
                                    echo "<tr><th>New Email: </th><td><input type='text' name='a_email' value='" . $row['ACCOUNT_EMAIL'] . "'</td></tr>";
                                    echo "<tr><th>New Password: </th><td><input type='text' name='a_password' value='" . $row['ACCOUNT_PASSWORD'] . "'</td></tr>";
                                    echo "<tr><th>New Confirm Password: </th><td><input type='text' name='a_cpassword' value='" . $row['ACCOUNT_PASSWORD'] . "'</td></tr>";
                                    echo "<tr>";
                                    
                                    echo "<tr><td colspan='2'><input type='submit' name='submit' value='UPDATE' onclick='validateForm()' class='button'>";
                                    echo "<input type='reset' name='reset' value='RESET' class='button'></td>";


                                }
                                echo "</table>";
                                echo "</form>";
                            }else{
                                echo "0 results";
                            }


                            $conn->close();

?>
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
