<?php
require 'PHPMailer/PHPMailerAutoload.php';
header('Content-type: application/json');

$mail = new PHPMailer;
//echo !extension_loaded('openssl')?"Not Available":"Available";
$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();  
$mail->Mailer = 'smtp';                                // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'your@gmail.com';                 // SMTP username
$mail->Password = 'yourpassword';                           // SMTP password
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission 465 ssl
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'your@gmail.com';
$mail->FromName = 'yourName';
$mail->addAddress($_POST["email"]);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// 
//if(!$mail->send()) { 
if(1 == 2) { // <= Remove on live server
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
	// Set a 500 (internal server error) response code.
	//header('X-PHP-Response-Code: 500', true, 500);
	echo json_encode(array('status' => '2','message'=> 'Oops! Something went wrong and we couldnt send your message.'));
	//echo "Oops! Something went wrong and we couldn't send your message.";
} else {
	//echo 'Message has been sent';
	// Set a 200 (okay) response code.
    //header('X-PHP-Response-Code: 200', true, 200);
	echo json_encode(array('status' => '1','message'=> 'success'));
}