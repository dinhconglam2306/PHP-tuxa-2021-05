<?php
class GroupModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable('group');
    }

    public function listItems()
    {
        $query         = "SELECT * FROM `group`";
        $result        = $this->listRecord($query);
        return $result;
    }
    public function changeBtn($params)
    {
        $id = $params['id'];
        $status = '';
        if (is_numeric($params['status']) == true) {
            $status = $params['status'] == 1 ? 0 : 1;
            $query = "UPDATE `group` SET `group_acp` = '$status' WHERE `id` = $id";
        } else if(is_string($params['status']) == true) {
            $status = $params['status'] == 'active' ? 'inactive' : 'active';
            $query = "UPDATE `group` SET `status` = '$status' WHERE `id` = $id";
        }
        $this->query($query);
    }
}
