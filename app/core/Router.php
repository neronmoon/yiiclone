<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class Router {


    public function route(){


        $controller = "Site";
        $action = "Index";
        $args = array();

        $url = $_SERVER['REQUEST_URI'];

        $exploded = array_filter(explode('/',substr($url, 1)));
        if(count($exploded) == 1)
            $action = ucfirst($exploded[0]);
        elseif(count($exploded) == 2){

            $controller = ucfirst($exploded[0]);
            $action = ucfirst($exploded[1]);

        }elseif(count($exploded) > 2){

            $controller = ucfirst($exploded[0]);
            $action = ucfirst($exploded[1]);

            for($i = 2; $i < count($exploded); $i+=2)
                $args[$exploded[$i]] = $exploded[$i+1];
        }


        $controller .= 'Controller';
        $action = 'action'.$action;

        if(file_exists(CONTROLLERSPATH.$controller.'.php')){
            include_once CONTROLLERSPATH.$controller.'.php';
        }else{
            throw new FHttpException(404);
            return;
        }




        $error = true;
        if( class_exists($controller) ){
            $controller = new $controller;


            if(method_exists($controller,$action) ){


                $r = new ReflectionMethod(get_class($controller), $action);
                $params = $r->getParameters();

                $optionalParams = array();

                foreach ($params as $param){
                    if( (!$param->isOptional() && array_key_exists($param->getName(),$args) && $args[$param->getName()] != NULL) )
                        $error = false;
                    if($param->isOptional()) $optionalParams[] = $param;
                }

                if( count($params) - count($optionalParams) == 0 ) $error = false;



                if(!$error && $controller->beforeAction($action)){
                    call_user_func_array(array($controller, $action), $args);
                }

            }

        }

        if($error){
            include_once CONTROLLERSPATH.'SiteController.php';
            $controller = new SiteController();
            $controller->actionError(404);
        }


    }


}