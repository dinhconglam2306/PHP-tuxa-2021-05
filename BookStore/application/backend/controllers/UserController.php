<?php
class UserController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function indexAction()
	{
		$this->_view->setTitle('Admin Panel');
		$this->_view->pageHeader = 'Group Controller :: List';
		$this->_view->render('user/index');
	}
	public function formAction()
	{
		$this->_view->setTitle('Admin Panel');
		$this->_view->pageHeader = 'Group Controller :: List';
		$this->_view->render('group/form');
	}
}
