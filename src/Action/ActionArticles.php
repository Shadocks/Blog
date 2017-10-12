<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:53
 */

namespace App\Action;


use App\Manager\ArticleManager;

class ActionArticles
{
    public function index()
    {
        $articlesManager = new ArticleManager();
        $articles = $articlesManager->getAll();

        return $this->twig->render('articles.html.twig', ['articles' => $articles]);
    }
}