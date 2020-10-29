<?php

namespace app\core;

/**
 * Class Application
 *
 * @author Denis Feliciano <denisf.salles@gmail.com>
 * @package ${NAMESPACE}
 */
class Application
{
    public Request $request;
    public Router $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }
}