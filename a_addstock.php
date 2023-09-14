<?php
include "connect.php";
include "secondHeader.php";
?>

<script language="JavaScript">


	function validateForm() {

    let b = document.forms["myForm"]["ISBN_ID"].value;
	let c = document.forms["myForm"]["TEXTBOOK_NAME"].value;
	let d = document.forms["myForm"]["PUBLISHER_NAME"].value;
    let e = document.forms["myForm"]["BOOK_YEAR"].value;
    let f = document.forms["myForm"]["Quantity"].value;
    let g = document.forms["myForm"]["Price"].value;

	if (b == "") {
		alert("Please enter the ISBN ID");
		return false;
  	}
	else if (c == "") {
		alert("Please enter the Textbook Name");
		return false;
  	}
	else if (d == "") {
		alert("Please enter the Publisher Name");
		return false;
  	}
      else if (e == "") {
		alert("Please enter the Book Year");
		return false;
  	}

	  else if (e == "") {
		alert("Please enter the Quantity");
		return false;
  	}

	  else if (e == "") {
		alert("Please enter the Price");
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
		
			<form method="POST" name="myForm" action="a_addstockFinal.php">
			<h3>Add Stock</h3>
			<table>
			<tr> 
				<td>ISBN ID</td>
				<td> <input type="text" name="ISBN_ID" size="30"></td>
			</tr>
			<tr> 
				<td>Textbook Name</td>
				<td> <input type="text" name="TEXTBOOK_NAME" size="30"></td>
			</tr>
			<tr> 
				<td>Publisher Name</td>
				<td> <input type="text" name="PUBLISHER_NAME" size="30"></td>
			</tr>
			<tr> 
				<td>Book Year</td>
				<td><input type="text" name="BOOK_YEAR" size="30"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td> <input type="number" name="Quantity" size="30"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td> <input type="text" name="Price" size="30"></td>
			</tr>
			<tr> 
				<th colspan="2"> 
					<input type="submit" value="Insert Results" name="submit" onclick="validateForm()" class="button"> 	
					<input type="reset" value="Clear Results" name="clear" class="button"></td>
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
