<?php

include "connect.php";
include "secondHeader.php";


?>

<script language="JavaScript">


function valid()
{
    if(!document.getElementById("a_password").value==document.getElementById("a_repassword").value)alert("Passwords do no match");
    return document.getElementById("a_password").value==document.getElementById("a_repassword").value;
   return false;


};



	function validateForm() {

        let b = document.forms["myForm"]["a_email"].value;
	let c = document.forms["myForm"]["a_name"].value;
	let d = document.forms["myForm"]["a_phone"].value;
    let e = document.forms["myForm"]["a_loan"].value;

	if (b == "") {
		alert("Please enter the email value for student");
		return false;
  	}
	else if (c == "") {
		alert("Please enter the name value for student");
		return false;
  	}
	else if (d == "") {
		alert("Please enter the phone value for student");
		return false;
  	}
      else if (e == "") {
		alert("Please enter the time loan textbook for student");
		return false;
  	}


}
</script>

<body bgcolor="wheat">
    <div id="wrapper">

        <section>
            <article>
            <center>
                <table class="tblCenter">
                <form method="post" action="a_registermember.php" name="myForm">
                <h2>Welcome to Register Page </h2><br>

                    <table>
                        <tr><td>Email:</td><td><input type="email" name="a_email" size="40" id="a_email" ></td></tr>
                        <tr><td>Name:</td><td><input type="text" name="a_name" size="40" id="a_name" ></td></tr>
                        <tr><td>Phone:</td><td><input type="text" name="a_phone" size="40" id="a_phone" ></td></tr>
                        <tr><td>TIME LOAN:</td><td><input type="date" name="a_loan" size="40" id="a_loan" ></td></tr>

                       
                
                    <br>
                    
                    <tr >
                        <th colspan='2'>
                            <input type="submit" name="submit" onclick="validateForm()" class="button">
                        <input type="reset" name="reset" class="button">
                        </th>

                    </tr>
                       
                       

                    </table><br>

                

                </tr>
                </table>
                </form>
            </article>
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
    </div>
</body>
</html>

