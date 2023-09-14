<?php
error_reporting(0); //turn off error reporting
session_start();
if (isset($_POST['account_email']) && isset($_POST['account_password'])) {
    $A_Email = $_POST['account_email'];
    $A_password = $_POST['account_password'];

    $_SESSION['account_email']=$_POST['account_email'];
    $_SESSION['account_password']=$_POST['account_password'];
    $_SESSION['studentoldid'];
}

include "connect.php";
?>
<?php

if($A_Email=="" || $A_password=="")
{

        echo "Not Data Entering";
        session_unset();
        echo "<meta http-equiv='refresh' content='3;url=..\FinalProject\index.php'>";
        }

        else{

            $sql = "SELECT * FROM account WHERE ACCOUNT_EMAIL = '$A_Email' AND ACCOUNT_PASSWORD = '$A_password'";
            $result=$conn->query($sql);

            if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_assoc($result);

            $_SESSION['studentoldid']=$rows['ACCOUNT_ID'];

                if($rows['ACCOUNT_ROW']=="student")
                {
            
                    include("s_homepage.php");
                }
                else if($rows['ACCOUNT_ROW']=="admin")
                {
                    include("a_homepage.php");
            
                }
            }
            
                else{
                  echo"Login Fail";
                  session_unset();
                  echo "<meta http-equiv='refresh' content='3;url=..\FinalProject\index.php'>";
                }
            
            
            $conn->close();
        }





?>

