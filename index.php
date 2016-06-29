<?php
set_include_path('../../zendFramework/library');
require_once 'Zend/Controller/Front.php';
Zend_Controller_Front::run('zendApp/controllers');
