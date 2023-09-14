<?php
    session_start();
    include "connect.php";
    include "secondHeader.php";


?>


<script language="JavaScript">


	function validateForm() {

    let b = document.forms["myForm"]["id"].value;
	let c = document.forms["myForm"]["a_account"].value;
	let d = document.forms["myForm"]["a_timeloan"].value;
    let f = document.forms["myForm"]["a_timereturned"].value;
    let g = document.forms["myForm"]["a_status"].value;

	if (b == "") {
		alert("Please enter the new Loan ID");
		return false;
  	}
	else if (c == "") {
		alert("Please enter the new ACCOUNT ID");
		return false;
  	}
	else if (d == "") {
		alert("Please enter the new Time Loan");
		return false;
  	}
      else if (f == "") {
		alert("Please enter the new Time Returned");
		return false;
  	}

	  else if (g == "") {
		alert("Please enter the new Status");
		return false;
  	}


}
</script>


<?php

    $id=$_REQUEST['id'];
    $_SESSION['loanid']=$_REQUEST['id'];

    $sql = "SELECT *from loan where LOAN_ID='" . $id . "'";

    $result = $conn->query($sql);   

    if($result->num_rows>0)
    {
    //output data of each row
    while($row = $result->fetch_assoc())
    {   
        echo "<center><h3>Loan Information</h3></center>";
        echo "<form method='post' name='myForm' action='a_updateloanFinal.php'>";
        echo "<table align ='center' border='1' width='50%'>";
        echo "<tr><th>LOAN_ID: </th><td><input type='text' name='id' value='".$row['LOAN_ID']."'readonly></td></tr>";
        echo "<tr><th>ACCOUNT_ID: </th><td><input type='text' name='a_account' value='".$row['ACCOUNT_ID']."'readonly></td></tr>";
        echo "<tr><th>TIME_LOAN: </th><td><input type='text' name='a_timeloan' value='".$row['TIME_LOAN']."'></td></tr>";
        echo "<tr><th>TIME_RETURNED: </th><td><input type='text' name='a_timereturned' value='".$row['TIME_RETURNED']."'></td></tr>";
        echo "<tr><th>STATUS: </th><td><input type='text' name='a_status' value='".$row['STATUS']."'></td></tr>";


        echo "<tr><td colspan='2'><input type='submit' name='submit' value='UPDATE' class='button' onclick='validateForm()'>";
        echo "<input type='reset' name='reset' value='RESET' class='button'></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
    }
    else{
        echo "0 results";
    }
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