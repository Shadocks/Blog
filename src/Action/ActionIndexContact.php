<?php

namespace App\Action;


use App\Form\FormContact;
use Core\FormFactory;
use Core\Mailer;
use Core\Twig;

/**
 * Class ActionIndexContact
 * @package App\Action
 */
class ActionIndexContact
{
    /**
     * @var Twig
     */
    private $twig;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * ActionIndexContact constructor.
     */
    public function __construct() {
        $this->twig = new Twig();
        $this->mailer = new Mailer();
        $this->formFactory = new FormFactory();
    }

    /**
     *
     */
    public function __invoke()
    {
        $form = $this->formFactory->buildForm(FormContact::class);
        echo $this->twig->getTwig()->render('indexContact.html.twig', ['form' => $form]);

        if ($_POST) {
            $this->mailer->request($_POST);
                $this->mailer->execute();
        }
    }
}
