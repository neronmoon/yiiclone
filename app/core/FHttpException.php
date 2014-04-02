<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class FHttpException extends Exception{

    public function __construct($code){
        include_once COREPATH.'AppController.php';
        include_once COREPATH.'FrontController.php';
        include_once CONTROLLERSPATH.'SiteController.php';
        $controller = new SiteController();
        $controller->actionError($code);
    }
    public function __toString(){return "";}

}