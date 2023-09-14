<?php
session_start();
include "connect.php";
include "headteac.php";
error_reporting(0); //turn off error reporting
    
    $useremail=$_SESSION['account_email'];
   $userpassword=$_SESSION['account_password'];
   $id=$_GET['id'];
   $ids = strval($_GET['id']);


?>
<script language="JavaScript">

    function process(){

               
            

                var name=document.getElementById("id").value;

                document.getElementById("name").innerHTML="Name : "+name;

               /*?php
        $id=$_GET['id'];

        $sql = "SELECT * FROM account Where ACCOUNT_EMAIL = '".$id."'";
            $result=$conn->query($sql);

            if (mysqli_num_rows($result) > 0) {
   
            
                while($row= $result->fetch_assoc()){
                   
                    $Names=$row['ACCOUNT_NAME']."</td>";
                    $Phones=$row['ACCOUNT_PHONE']."</td>";
                    $Emails=$row['ACCOUNT_EMAIL']."</td>";
                    $Passwords=$row['ACCOUNT_PASSWORD']."</td>";
                    $Rows=$row['ACCOUNT_ROW']."</td>";
                    


                }
            
    echo"</table>";
} else {
    echo "0 results";
}

        ?*/

        
    }


</script>


<body id="bgColor">
    <div id="wrapper">

        <section>
            <article>
            <center>
<?php


$sql = "SELECT * FROM account Where account_row = 'student'";
            $result=$conn->query($sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<center><h3>Student information</h3></center>";
                echo "<table allign = 'center'border ='1' width = '50%'>";
                echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Passowrd</th>
                <th>Status</th>";
            
                while($row= $result->fetch_assoc()){
                    echo "<tr>";
                    echo"<td>".$row['ACCOUNT_NAME']."</td>";
                    echo"<td>".$row['ACCOUNT_PHONE']."</td>";
                    echo"<td>".$row['ACCOUNT_EMAIL']."</td>";
                    echo"<td>".$row['ACCOUNT_PASSWORD']."</td>";
                    echo"<td>".$row['ACCOUNT_ROW']."</td>";
                }
            
    echo"</table>";
} else {
    echo "0 results";
}
?>



<br><br>

    <table>
            <form>
                <tr><h1>Searching the Student Information : </h1></tr>
                <tr><input type="text" name="id" id="id" ></tr>
                <tr><input type="button" name="button" id="button" value="search" onclick="process()" > </tr>
            </form>
    </table>

    <br><br>

    <?php


function alert($message)
{
    echo "<script>alert('$message')</script>";
}



$sql2 = "SELECT * FROM account Where account_email = '".$ids."'";
            $result2=$conn->query($sql2);

            if (mysqli_num_rows($result2) > 0) {
                echo "<center><h3>Student information</h3></center>";
                echo "<table allign = 'center'border ='1' width = '50%'>";
                echo "<tr><th>Name</th><th>Phone</th><th>Email</th><th>Passowrd</th>
                <th>Status</th><th colspan='2'>Update</th>";
            
                while($row2= $result2->fetch_assoc()){
                    echo "<tr>";
                    echo"<td>".$row2['ACCOUNT_NAME']."</td>";
                    echo"<td>".$row2['ACCOUNT_PHONE']."</td>";
                    echo"<td>".$row2['ACCOUNT_EMAIL']."</td>";
                    echo"<td>".$row2['ACCOUNT_PASSWORD']."</td>";
                    echo"<td>".$row2['ACCOUNT_ROW']."</td>";
                ?>
                 <td align="center"><a href="a_update.php?id=<?php echo $row["ACCOUNT_ID"]; ?>">Update</a></td>
                 <td align="center"><a href="a_delete.php?id=<?php echo $row["ACCOUNT_ID"]; ?>">Delete</a></td>
                 <?php
                }
            
    echo"</table>";
} else {
}
?>

            </article>
            </center>
        </section>

    </div>
</body>


<?php
$conn->close();
?>