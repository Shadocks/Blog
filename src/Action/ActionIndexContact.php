<?php

namespace App\Action;


use App\Form\FormContact;
use Core\FormFactory;
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
     * ActionIndexContact constructor.
     */
    public function __construct() {
        $this->twig = new Twig();
        $this->formFactory = new FormFactory();
    }

    /**
     *
     */
    public function __invoke()
    {
        $form = $this->formFactory->buildForm(FormContact::class);
        echo $this->twig->getTwig()->render('indexContact.html.twig', ['form' => $form]);
    }
}
