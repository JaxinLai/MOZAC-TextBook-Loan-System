<?php
    session_start();
    include "connect.php";
    include "secondHeader.php";

?>


<script language="JavaScript">


	function validateForm() {

    let b = document.forms["myForm"]["id"].value;
	let c = document.forms["myForm"]["i_id"].value;
	let d = document.forms["myForm"]["u_quantity"].value;
    let f = document.forms["myForm"]["u_timePeriod"].value;
    let g = document.forms["myForm"]["u_statusBook"].value;

	if (b == "") {
		alert("Please enter the new Loan ID");
		return false;
  	}
	else if (c == "") {
		alert("Please enter the new ISBN ID");
		return false;
  	}
	else if (d == "") {
		alert("Please enter the new Quantity");
		return false;
  	}
      else if (f == "") {
		alert("Please enter the new Time Period");
		return false;
  	}

	  else if (g == "") {
		alert("Please enter the new Status");
		return false;
  	}


}
</script>

<?php



    $id = $_REQUEST['id'];
    $isID = $_SESSION['isbnID'];
    $loanID = $_SESSION['loanid'];

    $sql = "SELECT *from loan_textbook where LOAN_ID='" . $loanID . "' AND ISBN_ID ='".$id."'";

    $result = $conn->query($sql);   

    if($result->num_rows>0)
    {
    //output data of each row
    while($row = $result->fetch_assoc())
    {   
        echo "<center><h3>Update Loan Detail Information</h3></center>";
        echo "<form method='post' name='myForm' action='a_updateloandetailFinal.php'>";
        echo "<table align ='center' border='1' width='50%'>";
        echo "<tr><th>Loan ID: </th><td><input type='text' name='id' value='".$row['Loan_ID']."'</td></tr>";
        echo "<tr><th>ISBN ID: </th><td><input type='text' name='i_id' value='".$row['ISBN_ID']."'</td></tr>";
        echo "<tr><th>Quantity: </th><td><input type='text' name='u_quantity' value='".$row['Quantity']."'</td></tr>";
        echo "<tr><th>Time Period (month): </th><td><input type='text' name='u_timePeriod' value='".$row['Loan_Period']."'</td></tr>";
        echo "<tr><th>Status Book: </th><td><input type='text' name='u_statusBook' value='".$row['Status_book']."'</td></tr>";

        echo "<tr><td colspan='2'><input type='submit' name='submit' value='UPDATE' class='button' onclick='validateForm()' >";
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