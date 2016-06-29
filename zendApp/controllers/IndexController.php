<?php
/**
 * Created by PhpStorm.
 * User: t-nishimura
 * Date: 2016/06/29
 * Time: 11:46
 */

require_once 'Zend/Controller/Action.php';

class IndexController extends Zend_Controller_Action{

    public function indexAction(){

        //コントローラにデータを渡す
        $this->view->valStr = "コントローラから渡されたデータ";

        //ビューを表示
        echo $this->render();
    }

}