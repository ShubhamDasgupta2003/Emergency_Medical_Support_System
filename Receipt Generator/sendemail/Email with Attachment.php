<?php
$filename = '[filename]';//specify the filename
    $path = '';//specify the absolute file path
    $file = $path . "/" . $filename;

    $mailto = '[email]';//receiver mail
    $subject = 'Subject';
    $message = 'My message';

    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));//use to make the attachment as well as to split and also encode

    //------- Do not change this content it defines properties for attachment----------------------
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
  //----------------------------------- end--------------------------------------------------------
    




    if (mail($mailto, $subject, $body, $headers)) {
        echo "mail sent "; 
    } else {
        echo "error";
    }
    ?>