<?php
class IndexController extends Controller
{
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function listAction()
	{
		$this->_view->setTitle('List | ZendVn');
		$this->_templateObj->setFileTemplate('list.php');
		$this->_templateObj->load();
		$this->_view->render('user/list', true);
	}
	public function formAction()
	{
		$this->_view->setTitle('Form | ZendVn');
		$this->_templateObj->setFileTemplate('form.php');
		$this->_templateObj->load();
		$this->_view->render('user/form', true);
	}

	public function addAction()
	{
		echo '<h3>' . __METHOD__ . '</h3>';
		// $this->_view->render('index/index');
	}
}
