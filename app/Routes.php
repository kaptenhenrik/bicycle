<?php


namespace App;

use App\Controllers\BicycleShopController;

class Routes
{

    /**
     * @var Request
     */
    private $request;

    /**
     * Routes constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $path = $this->request->getPath();
        $requestMethod = $this->request->getMethod();
        $controllerPath = $this->routes("{$requestMethod}_{$path}");

        return ((new $controllerPath['controller']($this->request))->{$controllerPath['method']}());
    }

    /**
     * Routes constructor.
     * @param null $key
     * @return array
     */
    private function routes($key = null)
    {
        $routes = [
            'GET_/' => [
                'controller' => BicycleShopController::class,
                'method' => 'index'
            ]
        ];
        return $key ? $routes[$key] : $routes;
    }
}