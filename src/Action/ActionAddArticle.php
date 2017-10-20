<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:50
 */

namespace App\Action;

use App\Form\FormAdd;
use App\Model\Article;
use App\Manager\ArticleManager;
use Core\FormFactory;
use Core\Session;
use Core\Twig;

class ActionAddArticle
{
    private $twig;
    private $session;
    private $formFactory;
    private $articleManager;

    public function __construct(
        Twig $twig,
        Session $session,
        FormFactory $formFactory,
        ArticleManager $articleManager
    ) {
        $this->twig = $twig;
        $this->session = $session;
        $this->formFactory = $formFactory;
        $this->articleManager = $articleManager;
    }

    public function __invoke()
    {
        $form = $this->formFactory->buildForm(FormAdd::class);
        echo $this->twig->getTwig()->render('articleAdd.html.twig', ['form' => $form]);

        $this->formFactory->data(['class' => Article::class]);
        $this->formFactory->request($_POST);
        $this->articleManager->add($this->formFactory->getEntity());

        $this->session->start();
        $this->session->addMessage('SuccessfulAdd', 'L\'article a bien été posté');
        header('Location: /articles');
    }
}