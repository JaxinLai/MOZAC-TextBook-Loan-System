<?php
        //session_start();
        $host="localhost:3301";
        $username="root";
        $pass="";
        $db="systembookingnew";

        
        $conn=mysqli_connect($host,$username,$pass,$db);
        if(!$conn){
            die("Database connection error");
}   
?>
 
 <?php
//include connection file 
include_once('fpdf185/fpdf.php');
session_start();
/*
$studentidold=$_SESSION['studentoldid'];
$h=$_SESSION['loanidget'];
$stuemail=$_SESSION['account_email'];
$stupassword=$_SESSION['account_password'];
$date=$_SESSION['date'];
*/

class PDF extends FPDF
{
// Page header
function Header()
{
    $this->Image('img/Logo.png',10,6,30);

    $this->SetFont('Arial','B', 10);
    // Move to the right
    $this->Cell(100);
    // Title
    $this->Cell(80,10,'Loan Details',1,1,'C');
    // Line break
    $this->Ln(5);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial', 'B' ,8);

    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'I');
}
}

$result = mysqli_query($conn, "SELECT  * FROM loan ");
$header = mysqli_query($conn, "SELECT UCASE(`COLUMN_NAME`) FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='systembookingnew' 
                                AND `TABLE_NAME`='loan'
                                and COLUMN_NAME in ('LOAN_ID','ACCOUNT_ID','TIME_LOAN','TIME_RETURNED', 'STATUS')");

$result2 = mysqli_query($conn, "SELECT  * FROM loan_textbook ");
$header2 = mysqli_query($conn, "SELECT UCASE(`COLUMN_NAME`) FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='systembookingnew' 
                                AND `TABLE_NAME`='loan_textbook'
                                and COLUMN_NAME in ('LOAN_ID','ISBN_ID','QUANTITY','Loan_Period', 'Status_book')");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
$pdf->SetY(50);

foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(40,12,$column_heading,1);
}

foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();

foreach($row as $column)
$pdf->Cell(40,10,$column,10);
}

$pdf->Ln();
$pdf->Ln();




/*
$pdf->SetAutoPageBreak(false);
$pdf->SetY(100);  // for example ... value will need to be changed of course
$pdf->Cell(10,5,"Student Email : $stuemail",5,'C');
$pdf->Cell(10,5,"Loan ID : $h",5,'C');
$pdf->Cell(10,5,"Time Loan: $date",5,'C');
$pdf->Cell(10,5,"Total Book Borrow: $total",5,'C');
*/





$pdf->Output();
?>


