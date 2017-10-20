<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 17/10/2017
 * Time: 09:59
 */

namespace App\Action;


use App\Manager\ArticleManager;
use Core\Session;

class ActionDeleteArticle
{
    private $session;
    private $articleManager;

    public function __construct(
        Session $session,
        ArticleManager $articleManager
    ) {
        $this->session = $session;
        $this->articleManager = $articleManager;
    }

    public function __invoke()
    {
        $this->articleManager->delete($_GET['id']);

        $this->session->start();
        $this->session->addMessage('SuccessfulDeletion', 'L\'article a bien été supprimé');
        header('Location: /articles');
    }
}