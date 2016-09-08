<?php

class Route {

    public static function init() {
        // контроллер и действие по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }
        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }
        if (!checkAccess::allowedAccess($controller_name)){
            $controller_name='Auth';
            $action_name='index';

        }
        // добавляем префиксы
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_path = "models/${model_name}.php";
        if (file_exists($model_path)) {
            include $model_path;
        }
        // подцепляем файл с классом контроллера
        $controller_path = "controllers/${controller_name}.php";
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            /*
              правильно было бы кинуть здесь исключение,
              но для упрощения сразу сделаем редирект на страницу 404
             */
            self::ErrorPage404();
        }
        // создаем контроллер
        $controller = new $controller_name;
        if (method_exists($controller, $action_name)) {
            // вызываем действие контроллера
            $controller->$action_name();
        } else {
            // здесь также разумнее было бы кинуть исключение
            self::ErrorPage404();
        }

    }

    public static function ErrorPage404() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:' . $host . '404');
    }

}