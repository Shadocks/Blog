<?php

namespace App\Action;


use App\Manager\ArticleManager;
use Core\Twig;

/**
 * Class ActionDetailArticle
 * @package App\Action
 */
class ActionDetailArticle
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
     * ActionDetailArticle constructor.
     */
    public function __construct() {
        $this->twig = new Twig();
        $this->articleManager = new ArticleManager();
    }

    /**
     * @param $id
     */
    public function __invoke($id)
    {
        $article = $this->articleManager->getById($id);
        echo $this->twig->getTwig()->render('articleDetail.html.twig', ['article' => $article]);
    }
}
