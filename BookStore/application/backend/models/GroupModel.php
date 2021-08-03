<?php
class GroupModel extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_GROUP);
	}

	public function listItems($params, $options = null)
	{
		$query[] 	= "SELECT `id`, `name`, `group_acp`, `created`, `created_by`, `modified`, `modified_by`, `status`";
		$query[]	= "FROM `{$this->table}` WHERE `id` > 0";

		if (!empty(trim(@$params['search']))) {
			$query[] = "AND `name` LIKE '%{$params['search']}%'";
		}

		if (@$params['status'] && $params['status'] != 'all') {
			$query[] = "AND `status` = '{$params['status']}'";
		}

		//PAGINATION
		$pagination = $params['pagination'];
		$totalItemsPerPage = $pagination['totalItemsPerPage'];
		if($totalItemsPerPage > 0){
			$position = ($pagination['currentPage'] -1 ) * $totalItemsPerPage;
			$query[] = "LIMIT $position, $totalItemsPerPage";
		}
		$query		= implode(' ', $query);

		$result = $this->listRecord($query);
		return $result;
	}

	public function changeGroupACP($params, $options = null)
	{
		$groupACP = $params['group_acp'] == 1 ? 0 : 1;
		$data = ['group_acp' => $groupACP];
		$where = [['id', $params['id']]];
		$this->update($data, $where);
		Session::set('message',"Cập nhật GroupACP thành công!");
	}

	public function changeStatus($params, $options = null)
	{
		$status = $params['status'] == 'active' ? 'inactive' : 'active';
		$data = ['status' => $status];
		$where = [['id', $params['id']]];
		$this->update($data, $where);
		Session::set('message',"Cập nhật trạng thái thành công!");
	}

	public function multiStatus($params, $options = null)
	{
		if ($options['task'] == 'active' || $options['task'] == 'inactive') {
			$ids = implode(', ', $params['cid']);
			$query = "UPDATE `{$this->table}` SET `status` = '{$options['task']}' WHERE `id` IN ({$ids})";
			$this->query($query);
			Session::set('message',"Cập nhật trạng thái thành công!");
		}
	}

	public function deleteItem($params, $options = null)
	{
		$ids = isset($params['id']) ? [$params['id']] : $params['cid'];
		$this->delete($ids);
		Session::set('message',"Xóa thành công!");
	}

	public function countItems($params, $options = null)
	{
		if ($options['task'] == 'count-items-status') {
			$query[] = "SELECT `status`, COUNT(*) AS `count`";
			$query[] = "FROM `{$this->table}`";

			if (!empty(trim(@$params['search']))) {
				$query[] = "WHERE `name` LIKE '%{$params['search']}%'";
			}

			$query[] = "GROUP BY `status`";
			$query = implode(' ', $query);
			$items = $this->listRecord($query);
			$result = array_combine(array_column($items, 'status'), array_column($items, 'count'));
			if(empty($result['inactive'])) $result =$result + ['inactive' => 0];
			if(empty($result['active'])) $result =['active' => 0]+ $result;
			$result = ['all' => array_sum($result)] + $result;
			return $result;
		}
	}
	public function saveItem($params, $options = null)
	{
		if ($options['task'] == 'add'){
			unset($params['form']['token']);
			$params['form']['group_acp'] = ($params['form']['group_acp'] == 'active')? 1 : 0;
			$params['form']['created'] = date('Y-m-d',time());
			$params['form']['created_by'] = 'admin';
			$this->insert($params['form']);
			Session::set('message',"Thêm thành công!");
		}
	}
	public function infoItem($params, $options = null)
	{
		
		if($options == null){
			$query[] 	= "SELECT  `name`, `group_acp`, `status`";
			$query[]	= "FROM `{$this->table}`";
			$query[]	= "WHERE `id` = {$params['id']}";
			$query = implode(' ', $query);
			$result = $this->singleRecord($query);
			return $result;

		}
	}
}
