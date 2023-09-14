<?php
session_start();
include "connect.php";
include "headteac.php";
?>
<?php

 
if(isset($_POST['search']))
{
$valueToSearch = $_POST['searchtext'];
$query = "SELECT * FROM `loan` WHERE `LOAN_ID` LIKE '%".$valueToSearch."%'";
$search_result = filterTable($query);

}
else {
    $query = "SELECT * FROM `loan`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost:3301", "root", "", "systembookingnew");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


?>

<body id="bgColor">
    <div id="wrapper">

        <section>
            <article>
            <center>
                <h2>Loan Information</h2>
            <table>
            <form method="POST" action="a_loan_info.php">
            <?php
                echo "<table allign = 'center'>";
                echo "<tr><th>Loan ID</th><th>Account ID</th><th>Time Loan</th><th>Time Returned</th>
                <th>Status</th><th colspan=3>Action</th>";

                while($row = mysqli_fetch_array($search_result)){
                    echo "<tr>";
                    echo"<td>".$row['LOAN_ID']."</td>";
                    echo"<td>".$row['ACCOUNT_ID']."</td>";
                    echo"<td>".$row['TIME_LOAN']."</td>";
                    echo"<td>".$row['TIME_RETURNED']."</td>";
                    echo"<td>".$row['STATUS']."</td>";

                    ?>
                    <td align="center"><a class="btn1" href="a_loandetail.php?id=<?php echo $row["LOAN_ID"]; ?>">Detail</a></td>
                    <td align="center"><a class="btn3" href="a_updateloan.php?id=<?php echo $row["LOAN_ID"]; ?>">Update</a></td>
                    <?php
                }
        

            
            
                echo"</table>";
                ?>


<br><br>
                <tr><h1>Searching the Loan Information : </h1></tr>
                <tr><input type="text" name="searchtext" id="searchtext" ></tr>
                <tr><input class="button1" type="submit" name="search" id="search" value="search"  > </tr>
            </form>
    </table>

    <br><br>

    <?php


function alert($message)
{
    echo "<script>alert('$message')</script>";
}


?>
<br><br><br><br><br><br>
    <h2 class="center">Generate Loan Information Report</h2>
    <a href="printPDF_teacher_loan.php"><img class="center" src="img/pdf.png" style="width:300px;height:300px;"></a>
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


<?php
$conn->close();
?>

