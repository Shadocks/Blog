<?php

namespace App\Action;


use App\Manager\ArticleManager;
use Core\Twig;

/**
 * Class ActionArticles
 * @package App\Action
 */
class ActionArticles
{
    /**
     * @var Twig
     */
    private $twig;

    /**
     * @var ArticleManager
     */
    private $articleManager;

    /**
     * ActionArticles constructor.
     */
    public function __construct() {
        $this->twig = new Twig();
        $this->articleManager = new ArticleManager();
    }

    /**
     *
     */
    public function __invoke()
    {
        $articles = $this->articleManager->getAll();
        echo $this->twig->getTwig()->render('articles.html.twig', ['articles' => $articles]);
    }
}
