<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPatch =ROOT.'/config/routs.php';
        $this->routes=include($routesPatch);
    }
    //return requst string
    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    public function run()
    {

        $uri = $this->getURI();

        foreach($this->routes as $uriPattern=>$path){
            if(preg_match("~$uriPattern~",$uri)){
                /*echo '<br> Где ищем (запрос, который набрал пользователь):'.$uri;
                echo '<br> Что ищем (совпадения из правил):'.$uriPattern;
                echo '<br> Кто обрабатывает:'.$path;*/

                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);
                //  echo '<br> :'.$internalRoute;

                //$segments =explode('/',$path); Твоя ошибка!!!!!!
                $segments =explode('/',$internalRoute); ///Правильно!!!!
                $controllerName = array_shift($segments).'Controller';
                $controllerName =ucfirst($controllerName);
                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                //connect file class controllerName
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';


                if(file_exists($controllerFile)){
                    include_once($controllerFile);
                }

                //create oblect and call method_exists

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);
                if($result !=null){
                    break;
                }
            }
        }
    }
}