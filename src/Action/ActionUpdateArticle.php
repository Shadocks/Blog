<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:50
 */

namespace App\Action;


use App\Form\FormUpdate;
use App\Manager\ArticleManager;
use Core\FormFactory;
use Core\Session;
use Core\Twig;

class ActionUpdateArticle
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
        $form = $this->formFactory->buildForm(FormUpdate::class);
        $article = $this->articleManager->getById($_GET['id']);
        echo $this->twig->getTwig()->render('articleUpdate.html.twig', ['form' => $form, 'article' => $article]);

        $this->formFactory->data($article);
        $this->formFactory->request($_POST);
        $this->articleManager->update($this->formFactory->getData());

        $this->session->start();
        $this->session->addMessage('SuccessfulUpdate', 'L\'article a bien été modifié');
        header('Location: /article/detail');
    }
}