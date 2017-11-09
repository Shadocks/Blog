<?php

namespace App\Action;


use App\Manager\ArticleManager;
use Core\Session;

/**
 * Class ActionDeleteArticle
 * @package App\Action
 */
class ActionDeleteArticle
{
    /**
     * @var ArticleManager
     */
    private $articleManager;

    /**
     * ActionDeleteArticle constructor.
     */
    public function __construct()
    {
        $this->articleManager = new ArticleManager();
    }

    /**
     * @param $id
     */
    public function __invoke($id)
    {
        $this->articleManager->delete($id);
        header('Location: /articles');
    }
}
