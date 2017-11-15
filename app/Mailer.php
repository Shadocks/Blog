<?php

namespace Core;

/**
 * Class Mailer
 * @package Core
 */
class Mailer
{
    /**
     * @var \Swift_SmtpTransport
     */
    private $transport;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * @var
     */
    private $message;

    /**
     * Mailer constructor.
     */
    public function __construct()
    {
        $data = require __DIR__ . './../config/mailer.php';

        $this->transport = $this->buildTransport($data);
        $this->mailer = new \Swift_Mailer($this->transport);
    }

    /**
     * @param array $data
     * @return \Swift_SmtpTransport
     */
    public function buildTransport(array $data)
    {
        return (new \Swift_SmtpTransport('smtp.sendgrid.net', 465, 'ssl'))
        ->setUsername($data['username'])->setPassword($data['password']);
    }

    /**
     * @param array $request
     */
    public function request(array $request)
    {
        $form = array($request['mail'] => $request['name']);

        $this->message = (new \Swift_Message('Contact via MB.Blog'))
            ->setFrom($form)
            ->setTo('mickalkoa@gmail.com')
            ->setBody('Nom: ' . $request['name'] . '<br />' . 'Prénom: ' . $request['surname'] . '<br />' . 'Email: ' . $request['mail'] . '<br />' . 'Message: ' . $request['message'] , 'text/html');
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     *
     */
    public function execute()
    {
        $result = $this->mailer->send($this->getMessage());

        if ($result) {
            echo 'Votre message a bien été envoyé. Merci de m\'avoir contacté';
        } else {
            echo 'Désolé, votre message n\'a pas pu être envoyé';
        }
    }
}
