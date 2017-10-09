<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 27/09/2017
 * Time: 13:47
 */

namespace Core;


class FormFactory
{
    public function buildForm($form)
    {
        return new $form();
    }
}