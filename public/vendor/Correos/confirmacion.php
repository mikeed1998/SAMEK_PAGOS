<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
// require 'vendor/autoload.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

require "../../conexion.php";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$tipoUser = $_POST['opcion'];
$datosForm = array();

if($tipoUser == 'persona') {
    $datosForm = [
        "nombre" => $_POST['campoNombre'],
        "correo" => $_POST['campoCorreo'],
        "pass" => $_POST['campoPassword'],
        "passConfirm" => $_POST['campoPasswordConfirmacion'],
    ];

    // consultar correos y romper en caso de correo repetido
    // 

    if($datosForm['pass'] != $datosForm["passConfirm"]) {
        echo "CONTRASEÑAS NO VALIDAS";
    } else {

        $longitudCodigo = 16; // Longitud deseada del código
        // Definir los caracteres permitidos para el código
        $caracteresPermitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        // Generar bytes aleatorios
        $bytesAleatorios = random_bytes($longitudCodigo);
        // Convertir bytes en una cadena legible
        $codigoAleatorio = '';
        $indiceCaracteres = strlen($caracteresPermitidos) - 1;
    
        for ($i = 0; $i < $longitudCodigo; $i++) {
            $codigoAleatorio .= $caracteresPermitidos[ord($bytesAleatorios[$i]) % $indiceCaracteres];
        }
        // echo $codigoAleatorio;


        $sqlUser = "INSERT INTO usuario(tipo, nombre, correo, pass, codigo_seguridad, estatu) 
        VALUES ('". $tipoUser ."', '". $datosForm['nombre'] ."', '". $datosForm['correo'] ."', '". $datosForm['pass'] ."', '". $codigoAleatorio ."', '0')";

        mysqli_query($conexion, $sqlUser);

        $sqlCodigo = "INSERT INTO codigos_seguridad(correo_usuario, codigo, estatu, validacion)
                      VALUES ('". $datosForm['correo'] ."', '". $codigoAleatorio ."', '0', '0')";

        mysqli_query($conexion, $sqlCodigo);
    }
}

if($tipoUser == 'empresa') {
    $datosForm = [
        "correo" => $_POST['campoCorreo'],
        "pass" => $_POST['campoPassword'],
        "passConfirm" => $_POST['campoPasswordConfirmacion'],
    ];

    if($datosForm['pass'] != $datosForm["passConfirm"]) {
        header("../../index.php");
    } else {

        $longitudCodigo = 16; // Longitud deseada del código
        // Definir los caracteres permitidos para el código
        $caracteresPermitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        // Generar bytes aleatorios
        $bytesAleatorios = random_bytes($longitudCodigo);
        // Convertir bytes en una cadena legible
        $codigoAleatorio = '';
        $indiceCaracteres = strlen($caracteresPermitidos) - 1;
    
        for ($i = 0; $i < $longitudCodigo; $i++) {
            $codigoAleatorio .= $caracteresPermitidos[ord($bytesAleatorios[$i]) % $indiceCaracteres];
        }
        // echo $codigoAleatorio;


        $sqlUser = "INSERT INTO usuario(tipo, nombre, correo, pass, codigo_seguridad, estatu) 
        VALUES ('". $tipoUser ."', '', '". $datosForm['correo'] ."', '". $datosForm['pass'] ."', '". $codigoAleatorio ."', '0')";

        mysqli_query($conexion, $sqlUser);

        $sqlCodigo = "INSERT INTO codigos_seguridad(correo_usuario, codigo, estatu, validacion)
                      VALUES ('". $datosForm['correo'] ."', '". $codigoAleatorio ."', '0', '0')";

        mysqli_query($conexion, $sqlCodigo);
    }
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
    $mail->addAddress($datosForm['correo'], $datosForm['nombre']);     //Add a recipient
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

    if($tipoUser == 'persona') {
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
                <h5>Correo: '. $datosForm['correo'] .'</h5>
                <h5>Mensaje: Tu código de verificacion es <b> '. $codigoAleatorio .'</b></h5>
            </body>
        </html>';
    } else if($tipoUser == 'empresa') {
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
                <h5>Correo: '. $datosForm['correo'] .'</h5>
                <h5>Mensaje: Tu código de verificacion es <b> '. $codigoAleatorio .'</b></h5>
            </body>
        </html>';
    } else {
        
    }

    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    // header('../../index.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    
// CODIGO MEJORADO USANDO LA BASE DE DATOS
// echo $codigoAleatorio;
//     // Por seguridad almacenar codigos ya existentes y meterlos a la db para hacer comprobaciones y evitar la fuerza bruta

//     $longitudCodigo = 8; // Longitud deseada del código
//     $caracteresPermitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    
//     // Generar un código único
//     do {
//         $codigoAleatorio = '';
//         for ($i = 0; $i < $longitudCodigo; $i++) {
//             $codigoAleatorio .= $caracteresPermitidos[random_int(0, strlen($caracteresPermitidos) - 1)];
//         }
    
//         // Verificar si el código existe en la base de datos
//         $existeCodigo = verificarCodigoExistenteEnBD($codigoAleatorio);
//     } while ($existeCodigo);
    
//     // El código es único, regístralo en la base de datos
//     registrarCodigoEnBD($codigoAleatorio);
    
//     echo $codigoAleatorio;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="vendor/bootstrap-5.3.0/dist/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="vendor/slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="vendor/uikit-3.16.21/css/uikit.min.css">
    
   
    
    <style> 
        html {
            background-color: #1E4A89;
        }

        /* xxl */
        @media (min-width: 1400px) {
            

        }

        /* xl */
        @media (min-width: 1200px) and (max-width: 1400px) {
            

        }

        /* lg */
        @media (min-width: 992px) and (max-width: 1200px) {
            

        }

        /* md */
        @media (min-width: 768px) and (max-width: 992px) {
            

        }

        /* sm */
        @media (min-width: 576px) and (max-width: 768px) {
           

        }

        /* xs */
        @media (min-width: 0px) and (max-width: 576px) {
           
    
        }
    </style>
    
    
</head>



<body style="background-color: #1E4A89;">
    <div class="container-fluid">
        <div class="row rounded py-5">
            <div class="col-6 mx-auto ">
                <div class="row">
                    <div class="col py-5 text-center">
                        <img src="img/inicio/Logo.png" alt="logo" class="img-fluid">
                    </div>
                </div>
                <div class="row" style="background-color: #3378C6; border-radius: 20px 20px 0 0;">
                    <div class="col text-center display-4 fw-bolder py-5">
                        Confirmación pendiente <?php echo $_POST['opcion']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col py-5 bg-white">
                        <div class="row">
                            <div class="col-6 fs-5 mx-auto">
                            Te hemos enviado un código de seguridad al correo: <strong><?php echo $datosForm['correo']; ?></strong>  para que termines de verificar tu cuenta.
                            <p>La primera vez que inicies sesión, se te pedirá dicho codigo para finalizar tu registro.</p>
                        </div>

                        </div>
                    </div>
                </div>
                <div class="row bg-white" style="border-radius: 0 0 20px 20px;">
                    <div class="col py-5 text-center">
                        <a href="index.php" class="btn btn-info fs-3 text-white" style="text-decoration: none;">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- PHPMailer aquí -->
    

    <script src="js/jquery.js"></script>
    <script src="vendor/bootstrap-5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/005ad652c9.js"></script>
    <script src="vendor/slick-1.8.1/slick/slick.min.js"></script>
    <script src="vendor/uikit-3.16.21/js/uikit.min.js"></script>
    <script src="vendor/uikit-3.16.21/js/uikit-icons.min.js"></script>
    
</body>
</html>