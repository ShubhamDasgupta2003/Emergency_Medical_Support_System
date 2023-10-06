<?php
    include_once ('connection.php');
    session_start();
    $uid =  $_SESSION['user_id'];
    $e= $_SESSION['user_email'];
    $r=mysqli_query($conn,"select * from cart WHERE user_id='$uid' ");


/*-------------------------DO not change this section as it defines the structure of the pdf---------------------------*/
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


$n=1;
if(mysqli_num_rows($r)>0)
{
  $a  ='<table>';
  $grand_total=0;
  $a .='<tr><td><u>No</u></td><td><u>Product Name</u></td><td><u>Price</u></td><td><u>Quantity</u></td><td><u>Total Price</u></td></tr>';
   while($row=mysqli_fetch_assoc($r))
   {
    $a .='<tr><td>'.$n.'</td><td>'.$row['name'].'</td><td>'. $row['price'].'/- </td><td>'.$row['quantity'].'</td>';
    $subtotal=($row['price']*$row['quantity']);
    $a.='<td>'.$subtotal.'/- </td></tr>';
    $a .='<tr><td> </td><td></td><td> </td><td></td></tr>';
    $n++;
    $grand_total+=($row['price']*$row['quantity']);
   }
  

  $a .='</table>';
  $a .='<u>Grand Total</u>: '.$grand_total.'/-';
}
else
{
   $a="problem";
}







	$pdf->AddPage();
	$html = $a;
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

	$pdf->lastPage();
    

    $pdf_name="Receipt";
	$pdf->Output(dirname(__FILE__).'/pdf/'.$pdf_name.'.pdf', 'F');
    $pdf->Output('example.pdf', 'I');
    












    $filename = 'Receipt.pdf';
    $path = 'C:\xampp\htdocs\Minor Project 5th_Sem\Emergency_Medical_Support_System\Medical Supplies\pdf';
    $file = $path . "/" . $filename;

    $mailto = $e;
    $subject = 'Receipt Of Your Order';
    $message = 'Here is the receipt of your order, hope you enjoyed our services!';

    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));

    // Do not change this content it defines properties for attachment
    $separator = md5(time());
    $eol = "\r\n";
    $headers = "From: emergencymedicalservices23@gmail.com" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
  //                         end 
    




    if (mail($mailto, $subject, $body, $headers)) {
        echo "mail send ... OK"; 
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }

?>*?