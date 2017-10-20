<?php
/**
 * Created by PhpStorm.
 * User: Mickael
 * Date: 14/10/2017
 * Time: 15:13
 */

namespace Core;


class Twig
{
    public function getTwig()
    {
        $loader = new \Twig_Loader_Filesystem('./../template');
        return new \Twig_Environment($loader);
    }
}