<?php

namespace Core;


use Core\Routing\Router;

/**
 * Class Kernel
 * @package Core
 */
class Kernel
{
    /**
     * @var
     */
    private $router;

    /**
     * Kernel constructor.
     */
    public function __construct()
    {
        $this->getRouter();
    }

    public function getRouter()
    {
        $this->router = new Router();
    }

    /**
     *
     */
    public function start()
    {
        $this->router->execute();
    }
}

