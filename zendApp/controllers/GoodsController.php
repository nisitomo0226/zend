<?php
require_once 'Zend/Controller/Action.php';
require_once 'zendApp/models/Model.php';

class GoodsController extends Zend_Controller_Action {

    public function goodsAction() {

        $this->view->title = "商品一覧";

        // Modelクラスのインスタンスを生成
        $model = new Model();

        // 商品情報を取得し，ビューのrows変数に代入
        $this->view->rows = $model->getGoods();
        // ビューを表示
        echo $this->render();
    }
}