<?php
    session_start();
    include "connect.php";
    include "headteac.php";

    $id=$_REQUEST['id'];
    $_SESSION['loanid']=$_REQUEST['id'];


    $sql = "SELECT *from loan_textbook where LOAN_ID='" . $id . "'";

    $result = $conn->query($sql);
    
    
    if (mysqli_num_rows($result) > 0) {
        echo "<center><h3>Loan textbook information</h3>";
        echo "<table>";
        echo "<tr><th>Loan ID</th> <th>ISBN ID</th> <th>Quantity</th> <th>Loan_Period</th> <th>Status_book</th> 
              <th colspan='2'>Update</th></tr>";
     
        while($row= $result->fetch_assoc()){

            $_SESSION['isbnID'] = $row['ISBN_ID'];
            echo "<tr>";
            echo "<td align='center'> ".$row['Loan_ID']."</td>";
            echo "<td align='center'> ".$row['ISBN_ID']."</td>";
            echo "<td align='center'> ".$row['Quantity']."</td>";
            echo "<td align='center'> ".$row['Loan_Period']."</td>";
            echo "<td align='center'> ".$row['Status_book']."</td>"
                   
    ?>
            <td align="center"><a class="btn3" href="a_updateloandetail.php?id=<?php echo $row["ISBN_ID"];?>">Edit</a></td>
            <td align="center"><a class="btn2" href="a_deleteLoanDetail.php?id=<?php echo $row["ISBN_ID"]; ?>">Delete</a></td>

            <?php
            echo "</tr>"; 


        }
        echo"</table>";
        } else {
            echo "0 results.";
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