<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class PostController extends FrontAppController{

    public function actionView($id){

        $model = R::findOne('post','status = 1 AND id=?',array($id));
        if (!$model->id) throw new FHttpException(404);

        $category = R::load('category',$model->category_id);
        if( $category->status != 1 ) throw new FHttpException(404);

        $author = R::load('user',$model->author_id);

        $this->render('view',array(
            'model'=>$model,
            'category'=>$category,
            'author'=>$author,
        ));
    }

    public function actionCategory($id){

        $perPage = 5;
        $page = 0;

        if( isset($_GET['page']) && $_GET['page'] != null ){
            $page = intval($_GET['page']) - 1;
        }

        $pages = R::count('post','status=1 AND category_id=:id',array(
            ':id'=>$id,
        ));

        if ($pages == 0) throw new FHttpException(404);

        $model = R::findOne('category','status = 1 AND id=?',array($id));
        if (!$model->id) throw new FHttpException(404);

        $posts = R::find('post','status=1 AND category_id=:id ORDER BY dt_create DESC LIMIT :limit OFFSET :offset ',array(
            ':id'=>$id,
            ':limit'=>$perPage,
            ':offset'=>floor($page*$perPage)
        ));

        $this->render('category',array(
            'model'=>$model,
            'posts'=>$posts,
            'page'=>$page,
            'countPages'=>ceil($pages/$perPage)
        ));


    }
    public function actionAuthor($id){

        $perPage = 5;
        $page = 0;

        if( isset($_GET['page']) && $_GET['page'] != null ){
            $page = intval($_GET['page']) - 1;
        }

        $pages = R::count('post','status=1 AND author_id=:id',array(
            ':id'=>$id,
        ));
        if ($pages == 0) throw new FHttpException(404);

        $model = R::findOne('user','status = 1 AND id=?',array($id));
        if (!$model->id) throw new FHttpException(404);

        $posts = R::find('post','status=1 AND author_id=:id ORDER BY dt_create DESC  LIMIT :limit OFFSET :offset',array(
            ':id'=>$id,
            ':limit'=>$perPage,
            ':offset'=>floor($page*$perPage)
        ));

        $this->render('author',array(
            'model'=>$model,
            'posts'=>$posts,
            'page'=>$page,
            'countPages'=>ceil($pages/$perPage)

        ));


    }

}