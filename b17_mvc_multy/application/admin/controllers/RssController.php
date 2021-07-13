<?php
class RssController extends Controller
{
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function indexAction()
	{
		$params = $_GET;
		$this->_view->items = $this->_model->listItems($this->_arrParam);
		$this->_view->setTitle('List | ZendVn');
		$this->_view->render('rss/index');
	}

	public function changestatusAction()
	{
		$params = $_GET;
		$this->_model->changeStatus($params);
		URL::redirect(URL::createLink('admin', 'rss', 'index'));
	}

	public function formAction()
	{
		//Lấy thông tin
		$this->_view->title = 'ADD RSS';
		$linkDirect = URL::createLink('admin', 'rss', 'form');
		$this->_view->setTitle('Add Rss | ZendVn');



		if (isset($_GET['id'])) {
			$this->_view->setTitle('Edit Rss | ZendVn');
			$this->_view->title = 'EDIT RSS';
			$linkDirect .= "&id={$_GET['id']}";
			$this->_view->item = $this->_model->listItem($_GET['id']);
		}



		if (!empty($_POST)) {
			if ($_SESSION['token'] == $_POST['token']) {
				unset($_SESSION['token']);
				URL::redirect($linkDirect);
			} else {
				$_SESSION['token'] = $_POST['token'];
			}
			unset($_POST['token']);
			$validate = new Validate($_POST);
			$validate->addRule('link', 'url')
				->addRule('ordering', 'int', ["min" => 1, "max" => 10])
				->addRule('status', 'status');
			$validate->run();
			if (!$validate->isValid()) {
				$this->_view->error      = $validate->showErrors();
			} else {
				$params = $validate->getResult();
				Session::set('form', 'Thêm');
				if (isset($_GET['id'])) {
					Session::set('form', 'Sửa');
					$params['id'] = $_GET['id'];
					$this->_model->updateItem($params);
				} else {
					$this->_model->insertItem($params);
				}
				URL::redirect(URL::createLink('admin', 'rss', 'index'));
			}
		}

		$this->_view->render('rss/form');
	}
	public function deleteAction()
	{
		if (isset($_GET['id'])) $this->_model->deleteItem($_GET['id']);
		URL::redirect(URL::createLink('admin', 'rss', 'index'));
	}
	public function logoutAction()
	{
		session_unset(); 
		URL::redirect(URL::createLink('default', 'index', 'index'));
	}
}
