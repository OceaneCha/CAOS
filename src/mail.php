<?php

namespace App\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../vendor/phpmailer/phpmailer/src/SMTP.php';
require_once __DIR__ . '/../vendor/phpmailer/phpmailer/src/Exception.php';

function sendEmail($form)
{
    // Création de l'instance PHPMailer
    $mail = new PHPMailer(true);

    // Paramètres SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    $mail->isSMTP();
    $mail->Host       = 'smtp.mail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'team.caos.report@mail.com';
    $mail->Password   = 'mdp12345.';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 25; //essai port -> 587 et 465;

    // Paramètres de l'e-mail
    $mail->setFrom('team.caos.report@mail.com', 'CAOS Team');
    $mail->addAddress('team.caos.report@mail.com', 'CAOS REPORT'); // adresse e-mail et nom du destinataire(ici notre mail)
    $mail->isHTML(true); // Paramètre pour activer le support HTML

    // Sujet et corps de l'e-mail
    $mail->Subject = 'Nouveau report';
    $mail->Body    = sprintf("Sujet : %s\nMessage :\n%s", $form['about'], $form['message']);

// Envoi de l'e-mail
// if ($mail->send()) {
//     echo 'Merci, votre message a bien été envoyé.';
//     header('refresh:3; url=/items'); //voir pour cacher formulaire après soumission
// } else {
//     $errors[] = "Une erreur est survenue, merci de réessayer ultérieurement.";
// }

//essai différent
    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
// }
}
