<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:53
 */

namespace App\Action;


use App\Manager\ArticleManager;
use Core\Twig;
use Core\Session;

class ActionArticles
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
        $articles = $this->articleManager->getAll();
        $session = $this->session;
        echo $this->twig->getTwig()->render('articles.html.twig', ['articles' => $articles, 'session' => $session]);
    }
}