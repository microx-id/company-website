<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load 
require '../assets/vendor/phpmailer/src/Exception.php';
require '../assets/vendor/phpmailer/src/PHPMailer.php';
require '../assets/vendor/phpmailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'it.microx@gmail.com';                     //SMTP username
    $mail->Password   = 'bayzedeeppqtkgjm';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Sender and recipient
    $mail->setFrom('it.microx@gmail.com', 'Micro X Indonesia Landing Page');
    $mail->addAddress('head.office@microx-indonesia.com', 'Micro X ID - Head Office');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Investor Enquiry';
    $mail->Body    = 'A Potential Investor is trying to reach you! 
                      <ul>
                          <li>Name: '.$_POST['name'].'</li>
                          <li>Email: '.$_POST['email'].'</li>
                          <li>Phone: '.$_POST['phone'].'</li>
                          <li>Address: '.$_POST['address'].'</li>
                      </ul>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>alert("Message sent successfully!");window.location.href = "https://microx-indonesia.com/pages/collaborate-form.php"</script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
