<?php
$dataForm = @$this->arrParam['form'];
$dataForm['group_acp']  = ($dataForm['group_acp'] == 1) ? 'active' : 'inactive';
//Input
$inputName = Form::createInput('text','form-control','form[name]',@$dataForm['name']);
$inputHidden = Form::createInput('hidden','form-control','form[token]',time());

//Select Box GroupACP
$arrValueGACP = ['default' => ' - Select Group ACP - ', 'active'=> 'Active', 'inactive' => 'Inactive'];
$selectBoxGACP = Form::createSelectbox('form[group_acp]','custom-select',$arrValueGACP,@$dataForm['group_acp']);

//Select Box Status
$arrValueStatus = ['default' => ' - Select Status - ', 'active' => 'Active', 'inactive' => 'Inactive'];
$selectBoxStatus = Form::createSelectbox('form[status]','custom-select',$arrValueStatus,@$dataForm['status']);

//Row Form

$rowName = Form::createRowForm('Name',$inputName,null);
$rowGroupACP = Form::createRowForm('Group ACP ',$inputName,$selectBoxGACP,false);
$rowGroupStatus = Form::createRowForm('Status ',$inputName,$selectBoxStatus,false);
$rows = $rowName . $rowGroupACP . $rowGroupStatus;

$xhtmlError = $this->error?? '';
?>
<?=$xhtmlError ;?>
<form action="#" method="post" name="adminForm" id="adminForm">
    <div class="card card-outline card-info">
        <div class="card-body">
        <?= $rows ?>
        </div>
        <div class="card-footer">
            <?= $inputHidden ;?>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="<?=URL::createLink('backend','group','index')?>" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>