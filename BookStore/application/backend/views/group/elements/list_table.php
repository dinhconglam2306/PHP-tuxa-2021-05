<?php
$params = $this->_arrParam;
$module = $params['module'];
$controller = $params['controller'];
$searchValue = isset($this->_arrParam['search'])? trim($this->_arrParam['search']) : '';

$xhtml = '';
foreach ($this->items as $item) {
    $id         = $item['id'];
    $name       = Helperbackend::highLight($searchValue,$item['name']);
    // $name = $item['name'];
    $status     = Helperbackend::showStatus($module, $controller, $id, $item['status']);
    $groupAcp   = Helperbackend::showGroupAcp($module, $controller, $id, $item['group_acp']);
    $created    = Helperbackend::createdHTML($item['created_by'], $item['created']);
    $modified   = Helperbackend::modifiedHTML($item['modified_by'], $item['modified']);
    $linkEdit   = URL::createLink($module, $controller, 'form', "&id=$id");
    $linkDelete = URL::createLink($module, $controller, 'delete', "&id=$id");
    $xhtml .= '
    <tr>
        <td><input type="checkbox" name="cid[]" value="'.$id.'"></td>
        <td>' . $id . '</td>
        <td>' . $name . '</td>
        <td>' . $groupAcp . '</td>
        <td>' . $status . '</td>
        <td>' . $created . '</td>
        <td>' . $modified . '</td>
        <td>
            <a href="' . $linkEdit . '" class="btn btn-info btn-sm rounded-circle"><i class="fas fa-pen"></i></a>
            <a href="' . $linkDelete . '" class="btn btn-danger btn-delete btn-sm rounded-circle"><i class="fas fa-trash "></i></a>
        </td>
    </tr>
    ';
}
?>
<table class="table align-middle text-center table-bordered">
    <thead>
        <tr>
            <th><input type="checkbox" id="check-all"></th>
            <th>ID</th>
            <th>Name</th>
            <th>Group ACP</th>
            <th>Status</th>
            <th>Created</th>
            <th>Modified</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?= $xhtml; ?>
    </tbody>
</table>