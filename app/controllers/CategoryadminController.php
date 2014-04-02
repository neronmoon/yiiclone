<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class CategoryadminController extends BackAppController{

    public function actionEdit($id){

        $cat = R::load('category',$id);
        if (!$cat->id) throw new FHttpException(404);

        if( isset($_POST['submit']) ){
            $errors = array();
            if( strlen(strip_tags($_POST['title'])) < 3 ){
                $errors[] = "Название категории слишком короткое";
                $this->render('form',array('model'=>$cat,'errors'=>$errors));
                return;
            }

            $cat->title = $_POST['title'];
            $cat->status = (isset($_POST['status']) && $_POST['status']=='on')? 1 : 0;

            R::store($cat);
            header('Location: /admin/category'); exit();
        }else{
            $this->render('form',array('model'=>$cat));
        }

    }
    public function actionCreate(){

        $cat = R::dispense('category');

        if( isset($_POST['submit']) ){
            $errors = array();
            if( strlen(strip_tags($_POST['title'])) < 3 ){
                $errors[] = "Название категории слишком короткое";
                $this->render('form',array('model'=>$cat,'errors'=>$errors));
                return;
            }

            $cat->title = $_POST['title'];
            $cat->status = (isset($_POST['status']) && $_POST['status']=='on')? 1 : 0;

            R::store($cat);
            header('Location: /admin/category'); exit();
        }else{
            $this->render('form',array('model'=>$cat));
        }
    }
    public function actionDelete($id){

        $cat = R::load('category',$id);
        if (!$cat->id) throw new FHttpException(404);
        if( isset($_POST['submit']) ){
            R::trash($cat);
            header('Location: /admin/category'); exit();

        }else{
            $this->render('delform',array('model'=>$cat));
        }



    }

    public function actionActivate($id){

        $model = R::load('category',$id);
        if (!$model->id) throw new FHttpException(404);
        $model->status = 1;
        R::store($model);
        header('Location: '.$_SERVER['HTTP_REFERER']);

    }

    public function actionDisactivate($id){

        $model = R::load('category',$id);
        if (!$model->id) throw new FHttpException(404);
        $model->status = 0;
        R::store($model);
        header('Location: '.$_SERVER['HTTP_REFERER']);

    }


}