<?php

namespace Core;


/**
 * Class Twig
 * @package Core
 */
class Twig
{
    /**
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        $loader = new \Twig_Loader_Filesystem('./../template');
        return new \Twig_Environment($loader);
    }
}
