<?php
session_start();

include "connect.php";
include "secondHeader.php";
error_reporting(0); //turn off error reporting

$id = $_REQUEST['id'];
$_SESSION['studentid']=$_REQUEST['id'];
?>


<script language="JavaScript">


	function validateForm() {

        let b = document.forms["myForm"]["stock_ID"].value;
	let c = document.forms["myForm"]["stock_name"].value;
	let d = document.forms["myForm"]["stock_pbname"].value;
    let e = document.forms["myForm"]["stock_year"].value;
    let f = document.forms["myForm"]["stock_quantity"].value;
    let g = document.forms["myForm"]["stock_price"].value;


	if (b == "") {
		alert("Please enter the ISBN ID value for student");
		return false;
  	}
	else if (c == "") {
		alert("Please enter the Textbook Name value for student");
		return false;
  	}
	else if (d == "") {
		alert("Please enter the Publisher Name value for student");
		return false;
  	}
      else if (e == "") {
		alert("Please enter the Book Year value for student");
		return false;
  	}  else if (f == "") {
		alert("Please enter the Quantity value for student");
		return false;
  	}  else if (g == "") {
		alert("Please enter the Price value for student");
		return false;
  	}


}
</script>




<body id="bgColor">
    <div id="wrapper">
      
        <section>
            <article>
            <center>
                <h2 class="center">Update Stock Info</h2>
                
                    

                        <?php
                        
                        $sql = "SELECT *from textbook where ISBN_ID='" . $id . "'";
$result = $conn->query($sql);

if($result->num_rows>0){


    while($row=$result->fetch_assoc()){
        echo "<form method='post' action='a_stockupdatefinal.php' name='myForm'>";
        echo "<table>";
        echo "<tr><th>New ISBN ID: </th><td><input type='text' name='stock_ID' value='" . $row['ISBN_ID'] . "'</td></tr>";
        echo "<tr><th>New Name: </th><td><input type='text' name='stock_name' value='" . $row['TEXTBOOK_NAME'] . "'</td></tr>";
        echo "<tr><th>New Publisher Name: </th><td><input type='text' name='stock_pbname' value='" . $row['PUBLISHER_NAME'] . "'</td></tr>";
        echo "<tr><th>New Book Year: </th><td><input type='text' name='stock_year' value='" . $row['BOOK_YEAR'] . "'</td></tr>";
        echo "<tr><th>New Quantity: </th><td><input type='text' name='stock_quantity' value='" . $row['QUANTITY'] . "'</td></tr>";
        echo "<tr><th>New Price: </th><td><input type='text' name='stock_price' value='" . $row['PRICE'] . "'</td></tr>";
        echo "<tr>";
        echo "<tr><td colspan='2'><input type='submit' name='submit' value='UPDATE' class='button' onclick='validateForm()'>";
        echo "<input type='reset' name='reset' class='button' value='RESET'></td>";
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


