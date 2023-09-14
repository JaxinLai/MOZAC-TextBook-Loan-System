<?php

include "connect.php";
include "headteac.php";

?>


<body id="bgColor">
    <div id="wrapper">

        <section>
            <article>
            <center>
                <h2 class="center">Textbook Information</h2>
                
            <table>
            <form method="POST" action="a_loan_info.php">
            <?php
           
$sql3 = "SELECT * FROM textbook ";
$result3=$conn->query($sql3);

if (mysqli_num_rows($result3) > 0) {
    echo "<p>";
    echo "<p>";

    echo "<table>";
    echo "<tr><th>ISBN_ID</th><th>TEXTBOOK_NAME</th><th>PUBLISHER_NAME</th>
    <th>BOOK_YEAR</th><th>QUANTITY</th><th>PRICE</th><th colspan='2'>Action</th>";

    while($row3= $result3->fetch_assoc()){
        echo "<tr>";
        echo"<td>".$row3['ISBN_ID']."</td>";
        echo"<td>".$row3['TEXTBOOK_NAME']."</td>";
        echo"<td>".$row3['PUBLISHER_NAME']."</td>";
        echo"<td>".$row3['BOOK_YEAR']."</td>";
        echo"<td>".$row3['QUANTITY']."</td>";
        echo"<td>".$row3['PRICE']."</td>";

    ?>
     <td align="center"><a class="btn3" href="a_stockupdate.php?id=<?php echo $row3["ISBN_ID"]; ?>">Update</a></td>
     <td align="center"><a class="btn2" href="a_stockdelete.php?id=<?php echo $row3["ISBN_ID"]; ?>">Delete</a></td>
     <?php
    }
?> <tr><td colspan='8' class="right"><a class="btn4" href="a_addstock.php">Add</a></td></tr>
<?php
echo"</table>";
} else {
}

$conn->close();

?>

<br><br>
               
            </form>
    </table>
    <h2 class="center">Generate Textbook Report</h2>
    <a href="printPDFstock.php"><img class="center" src="img/pdf.png" style="width:300px;height:300px;"></a>
    <br><br>

 


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