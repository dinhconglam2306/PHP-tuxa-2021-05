<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	
	public function indexAction(){

		$this->_view->items  = $this->_model->listItems();
		$this->_view->setTitle('News | ZendVn');
		$this->_view->render('index/index', true);
	}
	
}