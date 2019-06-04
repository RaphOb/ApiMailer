<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

function sendMail(Request $request)
{
//    $email = $request->getAttribute('email');
    $data = $request->getParsedBody();
    $email = $data['email'];
    $type = $data['type'];
    $subject = NULL;
    $bodyMail = NULL;

    switch ($type) {
        case 0:
            $subject = "Changement D'email?";
            $bodyMail = "Une demande de changement de mot de passe a ete demandé";
            break;

        case 1:
            $subject = "Success";
            $bodyMail = "Votre mot de passe a bien ete changé";
            break;

        case 2:
            $subject = "Votre video a ete chargé";
            $bodyMail = "upload de votre video s' est deroulé avec succès";
            break;

        default:
            $subject = "JFF";
            $bodyMail = "On envoit des rdm mails parcequ'on a rien à faire";
            break;
    }
    if ($email != NULL && $type != NULL) {
        if (!valid_email($email)) {
            displayErrorJSON('Bad Request', 10001, "L'email n'est pas au bon format");
        } else {
            mail($email, $subject, $bodyMail);
        }
    } else {
        displayErrorJSON('Bad Request', 10001, "Pas d'email");
    }
}