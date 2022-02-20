<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['tokenGoogle'])) {
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        'secret' => "6LdD2qUUAAAAADuZxawgm0y2gLJ2xr7e644QHf4L",
        'response' => $_POST['tokenGoogle'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

    $res = (json_decode($response, true));
    var_dump($res);

    if($res['success'] == true && $res['score'] > 0.7) {
        //Si on a la reponse :

        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'contact.kolabson@gmail.com';                     // SMTP username
            $mail->Password = 'KlabsON@64';                               // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('contact.kolabson@gmail.com', 'Formulaire Contact Kolabson');
            $mail->addAddress('pierro.alex@gmail.com', 'Monkey3');     // Add a recipient
            $mail->addReplyTo('utilisateur@gmail.com', 'Utilisateur');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Contact Kolabson';
            $mail->Body = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Watch out Bots !!!';
    }
}