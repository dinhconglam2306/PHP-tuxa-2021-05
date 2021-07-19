<?php
class GroupController extends Controller
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
		$this->_view->items = $this->_model->listItems();
		$this->_view->render('group/index');
	}
	public function formAction()
	{
		$this->_view->setTitle('Admin Panel');
		$this->_view->pageHeader = 'Group Controller :: List';
		$this->_view->render('group/form');
	}
	public function changeBtnAction()
	{
		$this->_model->changeBtn($this->_arrParam);
		URL::redirect(URL::createLink("backend", "group", "index"));
	}
	public function deleteAction()
	{
	echo '<pre>';
	print_r ($this->_arrParam);
	echo '</pre>';
	}
}
