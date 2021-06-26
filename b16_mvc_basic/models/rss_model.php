<?php
class Rss_Model extends Model
{

	public function __construct()
	{
		parent::__construct();
		$this->setTable('rss');
	}

	public function listItems($options = null)
	{
		$query 		= "SELECT * FROM `rss`";
		if($options!=null){
		$query 	.= "WHERE `link` LIKE '%$options%'";
		}
		$result		= $this->listRecord($query);
		return $result;
	}
	public function listItem($id,$options = null)
	{
		$query[] 	= "SELECT `link`, `status`,`ordering`";
		$query[] 	= "FROM `rss`";
		$query[] 	= "WHERE `id`='" . $id . "'";
		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result;
	}

	public function changeStatus($param)
	{
		$id = $param['id'];
		$status = $param['status'] == 'active' ? 'inactive' : 'active';
		$query = "UPDATE `rss` SET `status` = '$status' WHERE `id` = $id";
		$this->query($query);
	}

	public function insertItem($param)
	{
		$this->insert($param);
	}

	public function updateItem($param,$where)
	{
		$this->update($param,$where);
	}

	public function deleteItem($id, $options = null)
	{
		$this->delete([$id]);
	}
}
