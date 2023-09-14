<?php
session_start();

include "connect.php";
include "secondHeader.php";


$id = $_REQUEST['id'];
$_SESSION['studentid']=$_REQUEST['id'];
?>


<script language="JavaScript">


	function validateForm() {

        let b = document.forms["myForm"]["a_email"].value;
	let c = document.forms["myForm"]["a_name"].value;
	let d = document.forms["myForm"]["a_phone"].value;
    let e = document.forms["myForm"]["a_password"].value;
    

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
		alert("Please enter the password value for student");
		return false;
  	}


}
</script>




<body id="bgColor">
    <div id="wrapper">
      
        <section>
            <article>
            <center>
                <h2 class="center">Update Student Info</h2>
                
                        <h1{text-align: center;}</h1>

                        <?php
                        
                        $sql = "SELECT *from account where ACCOUNT_ID='" . $id . "'";
$result = $conn->query($sql);

if($result->num_rows>0){
    //output data of each row

//data id 问题

    while($row=$result->fetch_assoc()){
        echo "<form method='post' action='a_updateFinal.php' name='myForm'>";
        echo "<table>";
        echo "<tr><th>New Name: </th><td><input type='text' name='a_name' value='" . $row['ACCOUNT_NAME'] . "'</td></tr>";
        echo "<tr><th>New Phone: </th><td><input type='text' name='a_phone' value='" . $row['ACCOUNT_PHONE'] . "'</td></tr>";
        echo "<tr><th>New Email: </th><td><input type='text' name='a_email' value='" . $row['ACCOUNT_EMAIL'] . "'</td></tr>";
        echo "<tr><th>New Password: </th><td><input type='text' name='a_password' value='" . $row['ACCOUNT_PASSWORD'] . "'</td></tr>";
        echo "<tr>";
        echo "<tr><td colspan='2'><input type='submit' class='button' name='submit' value='UPDATE' onclick='validateForm()'>";
        echo "<input type='reset' class='button' name='reset' value='RESET'></td>";
    }
    echo "</table>";
    echo "</form>";
}else{
    echo "0 results";
}



$conn->close();

                        ?>
        
                </p>

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


