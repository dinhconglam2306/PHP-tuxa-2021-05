<?php
class GroupModel extends Model
{
    protected $_tableName = TBL_GROUP;
    public function __construct()
    {
        parent::__construct();
        $this->setTable('group');
    }

    public function countItems($params, $option = null){
        $query[] = "SELECT `status`, COUNT(`id`)as `total` FROM `group` GROUP BY `status`";
        $query           = implode(" ", $query);
        $result        = $this->listRecord($query);
        return $result;
    }

    public function listItems($params, $option = null)
    {
        $query[]         = "SELECT `id`,`name`,`group_acp`,`created`,`created_by`,`modified`,`modified_by`,`status`";
        $query[]         = "FROM `$this->_tableName`";
        if (isset($params['status']) && $params['status'] != 'all')         $query[] = "WHERE `status` = '{$params['status']}'";
        if (isset($params['search']) && trim($params['search']) != '')      $query[] = "WHERE `name` LIKE '%{$params['search']}%'";
        $query           = implode(" ", $query);
        $result        = $this->listRecord($query);
        return $result;
    }
    public function changeStatus($params, $option = null)
    {
        if ($option['task'] == 'change-status') {
            $id = $params['id'];
            $status = $params['status'] == 'active' ? 'inactive' : 'active';
            $query = "UPDATE `group` SET `status` = '$status' WHERE `id` = $id";
            $this->query($query);
        }
        if ($option['task'] == 'change-multy-status') {
            $status = ($params['slbStatus'] == 'multyActive') ? 'active' : 'inactive';
            $ids = $this->createWhereDeleteSQL($params['cid']);
            if (!empty($params['cid'])) {
                $query = "UPDATE `group` SET `status` = '$status' WHERE `id` IN ($ids)";
                $this->query($query);
            }
        }
    }
    public function changeGroupAcp($params,$option = null)
    {
        $id = $params['id'];
        $status = $params['status'] == 1 ? 0 : 1;
        $query = "UPDATE `group` SET `group_acp` = '$status' WHERE `id` = $id";
        $this->query($query);
    }
    public function deleteItem($params, $option = null)
    {
        $ids = $params['cid'] ?? [$params['id']];
        $this->delete($ids);
    }
}
