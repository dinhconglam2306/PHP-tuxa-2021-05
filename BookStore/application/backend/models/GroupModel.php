<?php
class GroupModel extends Model
{
    protected $_tableName = TBL_GROUP;
    public function __construct()
    {
        parent::__construct();
        $this->setTable('group');
    }

    public function listItems()
    {
        $query[]         = "SELECT `id`,`name`,`group_acp`,`created`,`created_by`,`modified`,`modified_by`,`status`";
        $query[]         = "FROM `$this->_tableName`";
        $query           =implode(" ",$query);
        $result        = $this->listRecord($query);
        return $result;
    }
    public function changeStatus($params)
    {
        $id = $params['id'];
        $status = $params['status'] == 'active' ? 'inactive' : 'active';
        $query = "UPDATE `group` SET `status` = '$status' WHERE `id` = $id";
        $this->query($query);
    }
    public function changeGroupAcp($params)
    {
        $id = $params['id'];
        $status = $params['status'] == 1 ? 0 : 1;
        $query = "UPDATE `group` SET `group_acp` = '$status' WHERE `id` = $id";
        $this->query($query);
    }
    public function deleteItem($id, $option=null)
    {
        $this->delete([$id]);
    }
}
