<?php
/**
 * Created by #ROOT.
 * to contact me use skype: neronmoon
 */

class FrontAppController extends AppController{


    public $layout = 'layouts/layout';

    public $clips = array();


    public function beforeAction($action){
        $cats = R::find('category',' status = 1');
        foreach($cats as $cat){
            $c = R::count('post','category_id=:id AND status = 1',array(':id'=>$cat->id));
            if( $c > 0 )
                $this->clips['cats'][] = $cat;

        }

        return true;
    }

}