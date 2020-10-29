<?php

namespace app\core;

/**
 * Class Router
 *
 * @author Denis Feliciano <denisf.salles@gmail.com>
 * @package ${NAMESPACE}
 */
class Router
{
    protected array  $routes = [];
    public Request $request;

    /**
     * Router constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get(string $path, callable $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            echo '404 Not found';
            exit();
        }

        echo call_user_func($callback);
    }
}