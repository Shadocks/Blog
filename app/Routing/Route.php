<?php

namespace Core\Routing;

/**
 * Class Route
 * @package Core\Routing
 */
class Route
{
    /**
     * @var
     */
    private $path;

    /**
     * @var
     */
    private $action;

    /**
     * @var
     */
    private $param;

    /**
     * Route constructor.
     * @param $path
     * @param $action
     */
    public function __construct(
        $path,
        $action
    ) {
        $this->setPath($path);
        $this->setAction($action);
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @param $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @param $action
     * @return mixed
     */
    public function setAction($action)
    {
        return $this->action = $action;
    }

    /**
     * @param $param
     */
    public function setParam($param)
    {
        $this->param = $param;

        if ($this->param) {
            foreach ($param as $key => $value) {
                if (!is_null($value)) {
                    $path = preg_replace('#:([\w]+)#', $this->param[0], $this->path);
                        $this->path = $path;
                            $this->param = (int) $param[0];
                }
            }
        }
    }

    /**
     * @param $uri
     * @return bool
     */
    public function match($uri)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";

        if (!preg_match($regex, $uri, $match)) {
            return false;
        }

        array_shift($match);

        $this->setParam($match);
    }
}
