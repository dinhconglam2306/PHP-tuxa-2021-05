<?php
class UserController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/main/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function loginAction()
	{
		$params = $_POST;
		$this->_view->user  = $this->_model->checkLogin($params);
		$this->_view->setTitle('News | ZendVn');
		$this->_view->render('user/login');
	}
}
