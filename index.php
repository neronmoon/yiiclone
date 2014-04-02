<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

error_reporting(0);

define('DS',DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__).DS);
define('APPPATH', ROOT.'app'.DS);
define('CONFIGPATH', APPPATH . 'config' . DS . 'main.php');
define('COREPATH', APPPATH.'core'.DS);
define('CONTROLLERSPATH', APPPATH.'controllers'.DS);
define('MODELSPATH', APPPATH.'models'.DS);
define('VIEWSPATH', APPPATH.'views'.DS);


include_once COREPATH . 'F.php';
$config = include_once CONFIGPATH;
$app = F::app()->run($config);


