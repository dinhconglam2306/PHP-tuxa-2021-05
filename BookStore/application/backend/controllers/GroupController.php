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
		$this->_view->pageHeader = ucfirst($this->_arrParam['module']) . ' Controller :: List';
		$this->_view->items = $this->_model->listItems($this->_arrParam);
		$countItem = $this->_model->countItems($this->_arrParam);
		foreach ($countItem as $key => $item) {
			$arr[] = [$item['status'] => $item['total']];
			foreach ($arr as $item) {
				foreach ($item as $key => $value) {
					$arrFilter[$key] = $value;
				}
			}
		}
		if(!isset($arrFilter['acitve']))  $arrFilter = array_merge(['active'=> 0],$arrFilter);
		if(!isset($arrFilter['inactive']))  $arrFilter = array_merge($arrFilter,['inactive'=> 0]);
		$countAll = array_sum($arrFilter);
		$arrFilter = array_merge(['all' => $countAll], $arrFilter);
		$this->_view->arrFilter = $arrFilter;
		$this->_view->render("group/index");
	}
	public function formAction()
	{
		$this->_view->setTitle('Admin Panel');
		$this->_view->pageHeader =  ucfirst($this->_arrParam['module']) . ' Controller :: List';
		$this->_view->render('group/form');
	}
	public function changeStatusAction()
	{
		$this->_model->changeStatus($this->_arrParam, ['task' => 'change-status']);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], "index"));
	}
	public function changeGroupAcpAction()
	{
		$this->_model->changeGroupAcp($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], "index"));
	}
	public function deleteAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], "index"));
	}
	public function changeMultyStatusAction()
	{
		$this->_model->changeStatus($this->_arrParam, ['task' => 'change-multy-status']);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], "index"));
	}
}
