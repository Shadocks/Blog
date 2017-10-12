<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:50
 */

namespace App\Action;


use App\Manager\ArticleManager;
use Core\FormFactory;
use App\Form\FormAdd;

class ActionAddArticle
{
    public function index()
    {
        $formBuilder = new FormFactory();
        $form = $formBuilder->buildForm(FormAdd::class);

        $articleManager = new ArticleManager();
        $articleManager->add($_POST);

        return $this->twig()->render('addArticle.html.twig', ['form' => $form]);
    }
}