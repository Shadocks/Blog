<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:50
 */

namespace App\Action;


use FormFactory;

class ActionUpdateArticle
{
    public function index()
    {
        $formBuilder = new FormFactory();
        $form = $formBuilder->buildForm(FormUpdate::class);
    }
}