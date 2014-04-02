<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class PostadminController extends BackAppController{

    public function actionCreate(){

        $model = R::dispense('post');
        $cats = R::find('category','status = 1');

        if( isset($_POST['submit']) ){

            $errors = array();
            if( strlen(strip_tags($_POST['title'])) < 3 ){
                $errors[] = "Название категории слишком короткое";
            }

            if( strlen(strip_tags($_POST['body'])) < 10 ){
                $errors[] = "Текст объявления слишком короткий";
            }

            if( count($errors) > 0 ){
                $this->render('form',array('model'=>$model,'cats'=>$cats,'errors'=>$errors));
                return;
            }
            $model->title = $_POST['title'];
            $model->body = $_POST['body'];
            $model->author_id = F::app()->user->id;
            $model->category_id = $_POST['category'];
            $model->dt_create = date('Y-m-d H:i:s');
            $model->status = 0;

            R::store($model);
            header('Location: /admin/posts'); exit();
        }else{
            $this->render('form',array('model'=>$model,'cats'=>$cats));
        }

    }

    public function actionEdit($id){

        $model = R::load('post',$id);
        if( F::app()->user->role != 1 && $model->author_id != F::app()->user->id ){
            throw new FHttpException(404);
            return;
        }

        if (!$model->id) throw new FHttpException(404);
        $cats = R::find('category','status = 1');

        if( isset($_POST['submit']) ){
            $errors = array();
            if( strlen(strip_tags($_POST['title'])) < 3 ){
                $errors[] = "Название категории слишком короткое";
            }

            if( strlen(strip_tags($_POST['body'])) < 10 ){
                $errors[] = "Текст объявления слишком короткий";
            }

            if( count($errors) > 0 ){
                $this->render('form',array('model'=>$model,'cats'=>$cats,'errors'=>$errors));
                return;
            }

            $model->title = $_POST['title'];
            $model->body = $_POST['body'];
            $model->category_id = $_POST['category'];

            R::store($model);
            header('Location: /admin/posts'); exit();
        }else{
            $this->render('form',array('model'=>$model,'cats'=>$cats));
        }

    }

    public function actionDelete($id){

        $model = R::load('post',$id);
        if( F::app()->user->role != 1 && $model->author_id != F::app()->user->id ){
            throw new FHttpException(404);
            return;
        }
        if (!$model->id) throw new FHttpException(404);
        if( isset($_POST['submit']) ){
            R::trash($model);
            header('Location: /admin/posts'); exit();

        }else{
            $this->render('delform',array('model'=>$model));
        }



    }

    public function actionApprove($id){

        $model = R::load('post',$id);
        if (!$model->id) throw new FHttpException(404);
        $model->status = 1;
        R::store($model);
        header('Location: '.$_SERVER['HTTP_REFERER']);

    }

    public function actionDisapprove($id){

        $model = R::load('post',$id);
        if (!$model->id) throw new FHttpException(404);
        $model->status = 2;
        R::store($model);
        header('Location: '.$_SERVER['HTTP_REFERER']);

    }


}