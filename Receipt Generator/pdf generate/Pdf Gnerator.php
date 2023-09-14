<?php
	$conn=mysqli_connect('localhost','root','','DATABASE_NAME'); /*replace DATABASE_NAME WITH TOUR REQUIRED DATABASE*/
    $r=mysqli_query($conn,"sql command"); /*replace sql command with sql commands to execute ....eg:     SELECT * FROM TABLE*/
   // you can use this to connect to the databse and print the value form the database

/*-------------------------DO not change this section as it defines the structure of the pdf connected to the library of tcpdf---------------------------*/
    require_once('TCPDF/tcpdf.php');
	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('');
	$pdf->SetTitle('PDF file using TCPDF');
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
	$pdf->SetMargins(20, 20, 20);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
/*-----------------------------------end----------------------------*/

//your content





//after the statements
//use this variable to store the data that needs to be printed like <p>name</p>
$a="";



//making of the pdf basic block by block
	$pdf->AddPage();
	$html = $a;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	$pdf->lastPage();
    
//output
    $pdf_name="[Name of the pdf]";
	$pdf->Output(dirname(__FILE__).'/pdf/'.$pdf_name.'.pdf', 'F');
//this output will save the pdf in pdf folder which will work as server
?>