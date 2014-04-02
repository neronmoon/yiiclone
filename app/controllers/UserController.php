<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class UserController extends FrontAppController{

    public function actionLogin(){


        if(isset($_POST['submit'])){

            $user = R::findOne('user','login=?',array($_POST['login']));

            if($user->password === md5(md5($_POST['password'].F::app()->params['salt']))){

                $hash = md5(Lib::generateCode(10));

                $user->hash = $hash;

                R::store($user);

                setcookie("id", $user->id, time()+60*60*24*30,'/');

                setcookie("hash", $hash, time()+60*60*24*30,'/');

                header("Location: /admin/index"); exit();

            }else{

                $this->render('login',array('errors'=>array('Такого пользователя не существует')));

            }

        }else{
            $this->render('login');
        }


    }

    public function actionLogout(){


        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        header('Location: /');
    }
    public function actionRegister(){


        if(isset($_POST['submit'])){
            $err = array();
            if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
                $err[] = "Логин может состоять только из букв английского алфавита и цифр";
            }

            if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30){
                $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
            }


            $query = R::findOne('user', 'login=?',array($_POST['login']));
            if( $query != null ){

                $err[] = "Пользователь с таким логином уже существует в базе данных";

            }
            if(count($err) == 0){
                $login = $_POST['login'];
                $password = md5(md5(trim($_POST['password'].F::app()->params['salt'])));

                $hash = md5(Lib::generateCode(10));

                $user = R::dispense('user');
                $user->login = $login;
                $user->password = $password;
                $user->role = 0;
                $user->hash = $hash;

                R::store($user);

                setcookie("id", $user->id, time()+60*60*24*30,'/');

                setcookie("hash", $hash, time()+60*60*24*30,'/');

                header("Location: /admin/index"); exit();
            }else{
                $this->render('register',array('errors'=>$err));

            }

        }else{
            $this->render('register');
        }

    }


}