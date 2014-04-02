<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class AppController {


    public $layout = 'layouts/layout';

    public $clips = array();

    public function beforeRender(){}

    public function beforeAction($action){
        return true;
    }

    public function render( $view, $vars = array() ){

        $this->beforeRender();

        $this->layout = str_replace('/', DS , $this->layout);

        //test layout
        $layoutpath = VIEWSPATH . $this->layout . '.php';

        if(file_exists($layoutpath)){
            $path = VIEWSPATH . strtolower( str_replace( 'Controller', '', get_class($this) ) ) . DS . $view . '.php';
            if(file_exists($path)){
                ob_start();
                extract($vars,EXTR_OVERWRITE);
                extract($this->clips,EXTR_OVERWRITE);
                include $path;
                foreach($vars as $var){
                    unset($var);
                }
                foreach($this->clips as $clip){
                    unset($var);
                }
                $content = ob_get_clean();
            }else{
                echo 'view '.$path.' not found';
                return;
            }
            ob_start();

            include $layoutpath;
            foreach($this->clips as $clip){
                unset($var);
            }
            echo ob_get_clean();
            unset($content);
        }else{
            echo 'layout '.$layoutpath.' not found';
            return;
        }




    }


}