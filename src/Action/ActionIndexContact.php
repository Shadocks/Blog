<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:48
 */

namespace App\Action;


use App\Form\FormContact;
use Core\FormFactory;
use Core\Twig;

class ActionIndexContact
{
    private $twig;
    private $formFactory;

    public function __construct(
        Twig $twig,
        FormFactory $formFactory
    ) {
        $this->twig = $twig;
        $this->formFactory = $formFactory;
    }

    public function __invoke()
    {
        $form = $this->formFactory->buildForm(FormContact::class);
        echo $this->twig->getTwig()->render('indexContact.html.twig', ['form' => $form]);
    }
}