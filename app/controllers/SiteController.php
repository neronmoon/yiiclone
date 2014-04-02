<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class SiteController extends FrontAppController{

    public function actionIndex(){

        $latest = array();

        foreach($this->clips['cats'] as $cat){

            $latest[] = R::find('post',' status = 1 AND category_id = ?',array($cat->id));

        }


        $this->render('index',array(
            'latest'=>$latest,
        ));
    }

    public function actionError($errorCode){

        $this->render('error',array(
            'code'=>$errorCode,
            'message'=>'Ooups!'
        ));
    }

}