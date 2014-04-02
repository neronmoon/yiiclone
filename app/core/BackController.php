<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class BackAppController extends AppController{


    public $layout = 'layouts/adminlayout';

    public $clips = array();

    public function beforeAction($action){


        $isAdmin = F::app()->user->role == 1;
        $controller = get_class($this);

        if( !$isAdmin ){
            // запрет обращения к экшнам в каждом контроллере-наследнике
            if( $controller == 'AdminController' && !in_array($action,array('actionPosts','actionIndex')) ){
                throw new FHttpException(404);
                return;
            }

            if( $controller == 'CategoryadminController' && !in_array($action,array()) ){
                throw new FHttpException(404);
                return;
            }

            if( $controller == 'PostadminController' && !in_array($action,array('actionCreate','actionEdit','actionDelete')) ){
                throw new FHttpException(404);
                return;
            }
            if( $controller == 'UseradminController' && !in_array($action,array()) ){
                throw new FHttpException(404);
                return;
            }




        }





        if( F::app()->user == null ){
            header('Location: /user/login');
            exit();
        }

        return true;
    }

}