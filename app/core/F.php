<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class F {

    private $_config = array(

        'db' => array(
            'url' => '',
            'user' => '',
            'password' => '',
        ),
        'params'=>array()


    );

    public $params = array();

    public $user = null;

    protected static $instance;

    private function __construct(){  }

    private function __clone()    {  }

    private function __wakeup()   {  }

    public static function app() {
        if ( is_null(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function run($config) {
        $this->_config = array_merge($this->_config, $config);
        $this->params = $config['params'];

        include_once ROOT.'libs'.DS.'rb.php';

        R::setup($this->_config['db']['url'], $this->_config['db']['user'], $this->_config['db']['password']);
        R::freeze( true );

        include_once ROOT.'libs'.DS.'Lib.php';


        Lib::importDir(COREPATH);

        Lib::importDir(MODELSPATH);
        include_once CONTROLLERSPATH.'SiteController.php'; // SiteController должен быть подключен всегда

        $this->checkAuth();

        $router = new Router();
        $router->route();

    }

    private function checkAuth(){
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){
            $user = R::findOne('user','id=?',array( ( $_COOKIE['id'] ) ) );
            if(($user->hash !== $_COOKIE['hash']) or ($user->id !== $_COOKIE['id'])){
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/");
                return false;
            }else{
                $this->user = $user;
                return true;
            }

        }
        return false;
    }


}