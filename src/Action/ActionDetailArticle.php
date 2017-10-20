<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:54
 */

namespace App\Action;


use App\Manager\ArticleManager;
use Core\Session;
use Core\Twig;

class ActionDetailArticle
{
    private $twig;
    private $session;
    private $articleManager;

    public function __construct(
        Twig $twig,
        Session $session,
        ArticleManager $articleManager
    ) {
        $this->twig = $twig;
        $this->session = $session;
        $this->articleManager = $articleManager;
    }

    public function __invoke()
    {
        $article = $this->articleManager->getById($_GET['id']);
        $session = $this->session;
        echo $this->twig->getTwig()->render('articleDetail.html.twig', ['article' => $article, 'session' => $session]);
    }

}