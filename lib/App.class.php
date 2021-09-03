<?php

class App
{
    public static function init()
    {
        date_default_timezone_set('Europe/Moscow');
        db::getInstance()->Connect(Config::get('db_user'),
                                    Config::get('db_password'),
                                    Config::get('db_base'));
//        dump($_POST);
        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_REQUEST)) {
            self::web($_REQUEST['path'] ?: '');
        }
    }

    //http://site.ru/index.php?path=News/delete/5

    protected static function web($url)//РОУТЕР!!!
    {
//        dump($_GET);
        $url = explode("/", $url);
        if (!empty($url[0])) {
            $_REQUEST['page'] = $url[0];//Часть имени класса контроллера
            if (isset($url[1])) {
                if (is_numeric($url[1])) {
                    $_REQUEST['id'] = $url[1];
                } else {
                    $_REQUEST['action'] = $url[1];//часть имени метода
                }
                if (isset($url[2])) {//формальный параметр для метода контроллера
                    $_REQUEST['id'] = $url[2];
                }
            }
        } else {
            $_REQUEST['page'] = 'index';
        }

        if (isset($_REQUEST['page'])) {
            $controllerName = ucfirst($_REQUEST['page']) . 'Controller';//IndexController
            $controller = new $controllerName();
            $methodName = $_REQUEST['action'] ?? 'index';

            //Ключи данного массива доступны в любой вьюшке
            //Массив data - это массив для использования в любой вьюшке
            $data = [
                'content_data' => $controller->$methodName($_REQUEST), //IndexController->index($_GET)
                'title' => $controller->title,
                'h1' => $controller->h1,
                'categories' => Category::getCategories(0),
            ];

//            dump($data);
            if (!isset($_REQUEST['asAjax'])) {
                $loader = new Twig_Loader_Filesystem(Config::get('path_templates'));
                $twig = new Twig_Environment($loader);
                $view = $controller->view . '/' . $methodName . '.html';
                $template = $twig->loadTemplate($view);
                echo $template->render($data);
            } else {
//                dump($data);
                file_put_contents(__DIR__ . '/../logs/datajax.txt', '');
                file_put_contents(__DIR__ . '/../logs/datajax.txt', $data['content_data']);
                echo $data['content_data'];
//                unset($_REQUEST['asAjax']);
            }
        }
    }


}