<?php

namespace app\core;

use \app\controllers\SiteController;
use app\models\User;

class Application
{

    public static string $ROOT_DIR;
    //public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public ?DbModel $user;
    public Session $session;
    public View $view;

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
        $this->session = new Session();
        $this->controller = new Controller(); //requiredd for Apache deployment
        $this->view = new View();
        $this->db = new Database($config['db']);
        $userClass = new $config['userClass'](); 
    
        
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $userClass->primaryKey();
            $this->user = $userClass->findOne([$primaryKey => $primaryValue]);
        }else {
            $this->user = null;
        }
    }

    public function setController(Controller $controller)
    {
        return $this->controller = $controller;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public static function isGuest(){
        return !self::$app->user;
    }
    public function run()
    {
        try{
             echo $this->router->resolve();
        }catch(\Exception $e){
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error',[
                'exception' => $e
            ]); 
        } 
    }
}
