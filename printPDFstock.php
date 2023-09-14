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
$studentidold=$_SESSION['studentoldid'];
$stuemail=$_SESSION['account_email'];
$stupassword=$_SESSION['account_password'];

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
    $this->Cell(80,10,'TEXTBOOK DETAIL',1,1,'C');
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
$display_heading = array('ISBN_ID'=> 'Textbook ID', 'TEXTBOOK_NAME'=> 'Textbook Name','PUBLISHER_NAME'=> 'Publisher Name','QUANTITY'=> 'Quantity');
 
$result = mysqli_query($conn, "SELECT  ISBN_ID, TEXTBOOK_NAME, PUBLISHER_NAME, QUANTITY FROM textbook ");
$header = mysqli_query($conn, "SELECT UCASE(`COLUMN_NAME`) FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='systembookingnew' 
                                AND `TABLE_NAME`='textbook' 
                                and COLUMN_NAME in ('ISBN_ID','TEXTBOOK_NAME','PUBLISHER_NAME','QUANTITY')");



$sql2 = "SELECT COUNT(ISBN_ID) as total , sum(QUANTITY) as plus FROM textbook";
            $result2=$conn->query($sql2);

            if (mysqli_num_rows($result2) > 0) {
                while($row2= $result2->fetch_assoc()){
                    $total=$row2['total'];
                    $total2=$row2['plus'];

                }
} else {
}


 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',10);
$pdf->SetY(50); 

foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(45,12,$column_heading,1);
}

foreach($result as $row) {
$pdf->SetFont('Arial','',10);
$pdf->Ln();

foreach($row as $column)
$pdf->Cell(50,10,$column,10);
}

$total11=250;
$total11=$total11-$total2;

$total333=($total11/$total2)*100;


$pdf->SetAutoPageBreak(false);
$pdf->SetY(150);  // for example ... value will need to be changed of course
$pdf->Cell(10,5,"Total Type Stock : $total",5,'C');
$pdf->Ln();

$pdf->Cell(10,5,"Total Book : $total2",5,'C');
$pdf->Ln();

$pdf->Cell(10,5,"Total Book Borrow: $total11",5,'C');
$pdf->Ln();

$pdf->Cell(10,5,"Total Book Borrow(%): $total333",5,'C');
$pdf->Ln();









$pdf->Output();
?>


