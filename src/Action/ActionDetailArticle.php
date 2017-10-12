<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:54
 */

namespace App\Action;


use App\Manager\ArticleManager;

class ActionDetailArticle
{
    public function __invoke()
    {
        $articleManager = new ArticleManager();
        $article = $articleManager->getById($_GET['$id']);

        return $this->twig()->render('detailArticle.html.twig', ['article' => $article]);
    }

}