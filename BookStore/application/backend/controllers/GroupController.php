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
		$this->_view->items = $this->_model->listItems($this->_arrParam);
		$this->_view->render('group/index');
	}
	public function formAction()
	{
		$this->_view->setTitle('Admin Panel');
		$this->_view->pageHeader = 'Group Controller :: List';
		$this->_view->render('group/form');
	}
	public function changeStatusAction()
	{
		$this->_model->changeStatus($this->_arrParam, ['task' => 'change-status']);
		URL::redirect(URL::createLink("backend", "group", "index"));
	}
	public function changeGroupAcpAction()
	{
		$this->_model->changeGroupAcp($this->_arrParam);
		URL::redirect(URL::createLink("backend", "group", "index"));
	}
	public function deleteAction()
	{
		if (isset($this->_arrParam['id'])) $this->_model->deleteItem($this->_arrParam['id']);
		URL::redirect(URL::createLink("backend", "group", "index"));
	}
	public function changeMultyStatusAction()
	{
		$this->_model->changeStatus($this->_arrParam, ['task' => 'change-multy-status']);
		URL::redirect(URL::createLink("backend", "group", "index"));
	
	}
}
