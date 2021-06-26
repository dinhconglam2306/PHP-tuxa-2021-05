<?php
$xhtmlError = '';
$error = $this->error;
if(!empty($error)){
    $xhtmlError = '<div class="alert alert-danger" role="alert">'.$error.'</div>';
}
$url = 'index.php?controller=rss&action=form';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $url = 'index.php?controller=rss&action=form&id='.$id.'';
}

//link-form
$inputLink = Form::createInput('text', 'link', $this->item['link']);
$labelLink = Form::createLabel('Link', 'font-weight-bold');
$groupLink = Form::createFormGroup($labelLink, $inputLink);

//Ordering-form
$inputOrdering = Form::createInput('text', 'ordering', $this->item['ordering']);
$labelOrdering = Form::createLabel('Ordering', 'font-weight-bold');
$groupOrdering = Form::createFormGroup($labelOrdering, $inputOrdering);

//Status-form
$arrStatus   = ['default' => 'Select status', 'inactive' => 'Inactive', 'active' => 'Active'];
$status      = Form::createSelectbox($arrStatus, 'status',$this->item['status'], 'custom-select');
$labelStatus = Form::createLabel('Status', 'font-weight-bold');
$groupStatus = Form::createFormGroup($labelStatus, $status);

$form        = $groupLink . $groupOrdering . $groupStatus;

?>


<form action="<?=$url;?>" method="post">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="m-0"><?= $this->title; ?></h4>
        </div>
        <div class="card-body">
            <?= $xhtmlError; ?>
            <?= $success; ?>
            <?= $form; ?>
        </div>
        <div class="card-footer">
            <input class="form-control" type="hidden" name="token" value="<?= time(); ?>">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="index.php?controller=rss&action=index" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>