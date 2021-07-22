<?php
class GroupModel extends Model
{
    protected $_tableName = TBL_GROUP;
    public function __construct()
    {
        parent::__construct();
        $this->setTable('group');
    }

    public function listItems($params, $option = null)
    {
        $query[]         = "SELECT `id`,`name`,`group_acp`,`created`,`created_by`,`modified`,`modified_by`,`status`";
        $query[]         = "FROM `$this->_tableName`";
        if(isset($params['status']))$query[] ="WHERE `status` = '{$params['status']}'";
        if(isset($params['search']) && trim($params['search']) != '') $query[]= "WHERE `name` LIKE '%{$params['search']}%'";

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
            if ($params['slbStatus'] != 'default') {
                $status  = $params['slbStatus'];
                $ids = $this->createWhereDeleteSQL($params['cid']);
                if ($status != 'delete') {
                    if (!empty($params['cid'])) {
                        $query = "UPDATE `group` SET `status` = '$status' WHERE `id` IN ($ids)";
                        $this->query($query);
                    }
                } else {
                    $this->delete($params['cid']);
                }
            }
        }
    }
    public function changeGroupAcp($params)
    {
        $id = $params['id'];
        $status = $params['status'] == 1 ? 0 : 1;
        $query = "UPDATE `group` SET `group_acp` = '$status' WHERE `id` = $id";
        $this->query($query);
    }
    public function deleteItem($id, $option = null)
    {
        $this->delete([$id]);
    }
}
