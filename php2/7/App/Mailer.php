<?php

namespace App;

use App\Models\Message;

class Mailer
{
    /**
     * @param Message $message - передается сообщение
     * @return bool
     */
    public static function send(Message $message): bool
    {
        $transport = (new \Swift_SmtpTransport('smtp.mail.ru', 465))
            ->setUsername('xreloadx')
            ->setPassword('911ddd11lll')
            ->setEncryption('SSL');
        $mailer = new \Swift_Mailer($transport);
        $message = new \Swift_Message();
        $message->setSubject('Уведомление об ошибке');
        $message->setFrom(['xreloadx@mail.ru' => 'Тестовый отправитель']);
        $message->addTo('reloadxx99@mail.ru', 'Тестовый получатель');
        $message->setBody("Произошла ошибка подключения к базе данных 
        \nНужно что-то починить,\nАдмин");
        $result = $mailer->send($message);
        if (!$result) {
            echo 'Не удалось отправить сообщение об ошибке';
        } else {
            echo 'Сообщение об ошибке отправлено '. '<br>';
        }
        return $result;
    }
}