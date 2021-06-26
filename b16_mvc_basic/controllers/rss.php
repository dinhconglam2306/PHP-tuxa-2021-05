<?php
class Rss extends Controller
{

	public function __construct()
	{
		parent::__construct();
		// Auth::checkLogin();
		$this->view->title = 'ADD RSS';
	}

	public function index()
	{
		if (!empty($_GET)) {
			$option = $_GET['search'];
			$this->view->items = $this->db->listItems($option);
		} else {
			$this->view->items = $this->db->listItems();
		}
		$this->view->render('rss/index');
	}

	public function changeStatus()
	{
		$param = $_GET;
		$this->db->changeStatus($param);
		header('location:index.php?controller=rss&action=index');
		exit();
	}

	public function form()
	{
		Session::init();

		//Lấy thông tin
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$this->view->item = $this->db->listItem($id);
		}
		if (!empty($_POST)) {
			if ($_SESSION['token'] == $_POST['token']) {
				unset($_SESSION['token']);
				header('location:index.php?controller=rss&action=index');
				exit();
			} else {
				$_SESSION['token'] = $_POST['token'];
			}
			if (!isset($_GET['id'])) {
				unset($_POST['token']);
			}
			$validate = new Validate($_POST);
			$validate->addRule('link', 'url')
				->addRule('ordering', 'int', ["min" => 1, "max" => 10])
				->addRule('status', 'status');
			$validate->run();
			if (!$validate->isValid()) {
				$this->view->error      = $validate->showErrors();
			} else {
				if (isset($_GET['id'])) {
					$this->view->item =  $validate->getResult();
					$id = $_GET['id'];
					unset($this->view->item['token']);
					$where      = [['id', $id]];
					$this->db->updateItem($this->view->item, $where);
					header('location:index.php?controller=rss&action=index');
					exit();
				} else {
					$this->view->output =  $validate->getResult();
					echo $this->view->output;
					$this->db->insertItem($this->view->output);
					header('location:index.php?controller=rss&action=index');
					exit();
				}
			}
		}
		$this->view->render('rss/form');
	}

	public function delete()
	{
		if (isset($_GET['id'])) $this->db->deleteItem($_GET['id']);
		header('location:index.php?controller=rss&action=index');
		exit();
	}
}
