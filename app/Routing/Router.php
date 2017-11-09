<?php

namespace Core\Routing;

/**
 * Class Router
 * @package Core\Routing
 */
class Router
{
    /**
     * @var array
     */
    private $routes = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->buildRoute();
    }

    /**
     *
     */
    public function buildRoute()
    {
        $routes = require __DIR__ . './../../config/routes.php';

        foreach ($routes as $key => $value) {
            $route [] = new Route(
                $value['path'],
                $value['action']
            );
        }

        $this->routes= $route;
    }

    /**
     * @param $route
     * @param $uri
     */
    public function catchParam($route, $uri)
    {
        $route->match($uri);
    }

    /**
     * @param $action
     * @param $param
     * @return mixed
     */
    public function returnClass($action, $param)
    {
        $class = new $action();
        return $class($param);
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        foreach ($this->routes as $route) {
            $this->catchParam($route, $_SERVER['REQUEST_URI']);
            switch ($_SERVER['REQUEST_URI']) {
                case $route->getPath():
                    return $this->returnClass($route->getAction(), $route->getParam());
                    break;
            }
        }
    }
}
