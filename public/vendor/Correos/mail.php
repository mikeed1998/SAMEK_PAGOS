<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// michael@wozial.com
// zCmfxQEz&wTM

//Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$tipoForm = $_POST['tipoForm'];


if($tipoForm == 'inicio') {
    $datosForm = array(
        "nombre" => $_POST["nombre"],
        "whatsapp" => $_POST["whatsapp"],
        "mensaje" => $_POST["mensaje"],
    );
}

if($tipoForm == 'contacto') {
    $datosForm = array(
        "nombre" => $_POST["nombre"],
        "empresa" => $_POST["empresa"],
        "whatsapp" => $_POST["whatsapp"],
        "correo" => $_POST["correo"],
        "mensaje" => $_POST["mensaje"],
    );
}

try {
    //Server settings
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'host.hddpool.net';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'michael@wozial.com';                     //SMTP username
    $mail->Password   = 'zCmfxQEz&wTM';                               //SMTP password
    $mail->SMTPSecure = 'ssl'; //tls; // PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('michael@wozial.com', 'Milertek (Formulario de Contacto)');
    $mail->addAddress('mikeed1998@gmail.com', 'Michael');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';

    if($tipoForm == 'inicio') {
        $mail->Body    = '
        <html>
            <head>
                <style>
                    body { 
                        background-color: blue; 
                    }
                </style>
            </head>
            <body>
                <h1>Nombre: '. $datosForm['nombre'] .'</h1>
                <h5>Whatsapp: '. $datosForm['whatsapp'] .'</h5>
                <h5>Mensaje: '. $datosForm['mensaje'] .'</h5>
            </body>
        </html>';
    } else if($tipoForm == 'contacto') {
        $mail->Body    = '
        <html>
            <head>
                <style>
                    body { 
                        background-color: blue; 
                    }
                </style>
            </head>
            <body>
                <h1>Nombre: '. $datosForm['nombre'] .'</h1>
                <h5>Empresa: '. $datosForm['empresa'] .'</h5>
                <h5>Whatsapp: '. $datosForm['whatsapp'] .'</h5>
                <h5>Correo: '. $datosForm['correo'] .'</h5>
                <h5>Mensaje: '. $datosForm['mensaje'] .'</h5>
            </body>
        </html>';
    } else {
        
    }


    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    header('../../contacto.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}