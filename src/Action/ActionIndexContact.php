<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 09/10/2017
 * Time: 14:48
 */

namespace App\Action;


use FormFactory;

class ActionIndexContact
{
    public function index()
    {
        $formBuilder = new FormFactory();
        $form = $formBuilder->buildForm(FormContact::class);
    }
}