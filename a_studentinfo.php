<?php
session_start();
include "connect.php";
include "headteac.php";
    
    $useremail=$_SESSION['account_email'];
   $userpassword=$_SESSION['account_password'];


?>
<?php


if(isset($_POST['search']))
{
$valueToSearch = $_POST['searchtext'];
$query = "SELECT * FROM `account` WHERE `account_email` LIKE '%".$valueToSearch."%'";
$search_result = filterTable($query);

}
else {
    $query = "SELECT * FROM `account` where account_row='student'";
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
            <h2>Student information</h2>
<table>
            <form method="POST" action="a_studentinfo.php">
<?php
                echo "<table>";
                echo "<tr><th>ID</th><tr><th>Name</th><th>Phone</th><th>Email</th><th>Password</th>
                <th>Status</th><th colspan=2>Action</th>";
            
                while($row = mysqli_fetch_array($search_result)){
                    echo "<tr>";
                    echo"<td>".$row['ACCOUNT_ID']."</td>";
                    echo"<td>".$row['ACCOUNT_NAME']."</td>";
                    echo"<td>".$row['ACCOUNT_PHONE']."</td>";
                    echo"<td>".$row['ACCOUNT_EMAIL']."</td>";
                    echo"<td>".$row['ACCOUNT_PASSWORD']."</td>";
                    echo"<td>".$row['ACCOUNT_ROW']."</td>";

                    ?>
                    <td align="center"><a class="btn3" href="a_update.php?id=<?php echo $row["ACCOUNT_ID"]; ?>">Update</a></td>
                    <td align="center"><a class="btn2" href="a_delete.php?id=<?php echo $row["ACCOUNT_ID"]; ?>">Delete</a></td>
                    <?php
                }

               
            
    echo"</table>";
?>

<br><br>
                <tr><h1>Searching the Student Information : </h1></tr>
                <tr><input type="text" name="searchtext" id="searchtext"></tr>
                <tr><input type="submit"  name="search" id="search" value="search" class="button1" > </tr>
            </form>
    </table>

    <br><br>

    <?php


function alert($message)
{
    echo "<script>alert('$message')</script>";
}


?>

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