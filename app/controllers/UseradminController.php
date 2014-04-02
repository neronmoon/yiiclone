<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class UseradminController extends BackAppController{

    public function actionEdit($id){

        $model = R::load('user',$id);
        if (!$model->id) throw new FHttpException(404);

        if( isset($_POST['submit']) ){

            $model->role = (isset($_POST['role']) && $_POST['role']=='on')? 1 : 0;

            R::store($model);
            header('Location: /admin/users'); exit();
        }else{
            $this->render('form',array('model'=>$model));
        }

    }

    public function actionDelete($id){

        $model = R::load('user',$id);
        if (!$model->id) throw new FHttpException(404);
        if( isset($_POST['submit']) ){
            R::trash($model);
            header('Location: /admin/users'); exit();

        }else{
            $this->render('delform',array('model'=>$model));
        }



    }
    public function actionPosts($id){

        $model = R::load('user',$id);
        if (!$model->id) throw new FHttpException(404);
        $posts = R::find('post','author_id=?',array($id));

        $this->render('posts',array('model'=>$model,'posts'=>$posts));



    }


}