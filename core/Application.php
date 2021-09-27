<?php

namespace app\core;
use \app\controllers\SiteController;

class Application{

    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;

    public static Application $app;
    public Controller $controller;
    
    /**
     * 
     *
     * @param [type] $rootPath
     * @param array $config
     */
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->controller = new Controller(); //requiredd for Apache deployment
        $this->db = new Database($config);
        
    }

    /**public function setController(Controller $controller){
        return $this->controller = $controller;
    }

    public function getController(){
        return $this->controller;
    }**/

    public function run()
    {
       echo $this->router->resolve();
    }
    
    
    
}



