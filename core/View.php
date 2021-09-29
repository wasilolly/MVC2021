<?php 

namespace app\core;

class View{

    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContents = $this->renderOnlyView($view, $params);
        $layoutContents = $this->layoutContent();
        return str_replace('{{content}}', $viewContents, $layoutContents);
    }

    public function renderContent($viewContents)
    {
        $layoutContents = $this->layoutContent();
        return str_replace('{{content}}', $viewContents, $layoutContents);
    }

    protected function layoutContent()
    {

        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
