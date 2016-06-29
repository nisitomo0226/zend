<?php
require_once 'Zend/Config/Ini.php';
require_once 'Zend/Db.php';
require_once 'Zend/Db/Table.php';
require_once 'Zend/Db/Adapter/Pdo/Mysql.php';

class Goods extends Zend_Db_Table_Abstract {

    protected $_names = "goods";		// テーブル名を定義(記述しないとクラス名がテーブル名となる)
    protected $_primary = "goodsID";	// プライマリキーを定義
}

class Model {

    // フィールド
    var $config;

    /**
     * コンストラクタ
     */
    function __construct() {

        $this->config = new Zend_Config_ini('zendApp/config/config.ini', 'test');

        // アダプタクラスの読み込み
        $db = Zend_Db::factory($this->config->database->library,		// アダプタクラスのベース名
            array(	'host'		=> $this->config->database->host,	// ホスト名
                'username'	=> $this->config->database->username,	// ユーザ名
                'password'	=> $this->config->database->password,	// パスワード
                'dbname'	=> $this->config->database->name	// データベース名
            )
        );

        // アダプタをデフォルトアダプタにセット
        Zend_DB_Table::setDefaultAdapter($db);

        $sql = "set names utf8";
        $db->query($sql);
    }

    /**
     * getGoods
     * @return array
     */
    function getGoods() {

        $table = new Goods();
        $select = $table->select()->setIntegrityCheck(false)
            ->from('goods', '*');
        $rows = $table->fetchAll($select)->toArray();

        return $rows;
    }
}