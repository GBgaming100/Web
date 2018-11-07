<?php	

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// use class.phpmailer.php\PHPMailer;
// use class.phpmailer.php\Exception;

use phpmailer.php/PHPmailer;
use phpmailer.php/Exception;

//Load composer's autoloader
require 'class.smtp.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  					  // Specify main 
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'maxvdboom1@gmail.com';                 // SMTP username
    $mail->Password = 'zoodokter';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('maxvdboom1@outlook.com', 'max van den Boom');
    $mail->addAddress('maxvdboom1@gmail.com', 'Max van den Boom');     // Add a recipient
//  $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('maxvdboom1@noreply.com', 'Information');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

    //Attachments
//  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>