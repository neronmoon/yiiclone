<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class AdminController extends BackAppController{

    public function actionIndex(){
        if( F::app()->user->role != 1){
            header('Location: /admin/posts');
            return;
        }
        $this->render('index');
    }
    public function actionCategory(){

        $cats = R::findAll('category');

        $this->render('cats',array('cats'=>$cats));
    }
    public function actionUsers(){
        $models = R::findAll('user');
        $this->render('users',array('models'=>$models));
    }
    public function actionPosts(){

        if( F::app()->user->role == 1 )
            $models = R::findAll('post');
        else{
            $models = R::find('post','author_id = ? ',array(F::app()->user->id));
        }
        $this->render('posts',array('models'=>$models));
    }



}