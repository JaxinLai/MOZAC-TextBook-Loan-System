<?php
session_start();
if(!isset($_SESSION['Account_Email']))
{
    session_destroy();
    echo "Successful Logout ";
    echo "<meta http-equiv='refresh' content='2;url=..\FinalProject\index.php'>";

}



?>