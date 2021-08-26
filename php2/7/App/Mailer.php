<?php

namespace App;

use App\Models\Message;

class Mailer
{
    public static function send(Message $message): bool
    {
        $credentials = include __DIR__ . '/credentials.php';
        $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername($credentials['mail'])->setPassword($credentials['password'])
            ->setStreamOptions(['ssl' => array('allow_self_signed' => true, 'verify_peer' => false)]);

        $mailer = (new \Swift_Mailer($transport));

        $message = (new \Swift_Message($message->getTitle()))
            ->setFrom([$credentials['mail']])
            ->setTo(['givemeinstagram@mail.ru'])
            ->setBody($message->getContent())
            ->setContentType('text/html');

        return $mailer->send($message);
    }
}