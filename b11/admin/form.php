<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once 'libs/Validate.class.php';
require_once 'libs/HTML.class.php';
require_once 'connect.php';
session_start();
$error = '';
$id = $_GET['id'];
$action = $_GET['action'];
$titePage = '';


if ($action == 'edit') {
    // $id = mysqli_real_escape_string($id);
    $query = "SELECT `link`, `status`,`ordering` FROM `rss` WHERE `id` = '" . $id . "'";
    $outputValidate = $database->singleRecord($query);
    $linkForm = 'form.php?action=edit&id=' . $id;
    $titePage = 'EDIT RSS';
    if (empty($outputValidate)) {
        header('location:error.php');
        exit();
    }
} else if ($action == 'add') {
    $linkForm = 'form.php?action=add';
    $titePage = 'ADD RSS';
} else {
    header('location:error.php');
    exit();
}

if (!empty($_POST)) {
    if ($_SESSION['token'] == $_POST['token']) {
        unset($_SESSION['token']);
        header('location:' . $linkForm);
        exit();
    } else {
        $_SESSION['token'] = $_POST['token'];
    }

    $source     = ['link' => $_POST['link'], 'status' => $_POST['status'], 'ordering' => $_POST['ordering']];
    $validate   = new Validate($source);
    $validate->addRule('link', 'url')
        ->addRule('ordering', 'int', ["min" => 1, "max" => 10])
        ->addRule('status', 'status');

    $validate->run();
    $outputValidate = $validate->getResult();

    if (!$validate->isValid()) {
        $error      = $validate->showErrors();
        $xhtmlError =   '<div class="alert alert-danger" role="alert">
                           ' . $error . '
                            </div>';
    } else {
        if ($action == 'edit') {
            $where      = [['id', $id]];
            $database->update($outputValidate, $where);
            $success    = '<div class="alert alert-success" role="alert">
                            Bạn đã sửa thành công! Bấm vào <a href ="list.php" >đây</a> để quay lại trang chủ.
                        </div>';
        } else if ($action == 'add') {
            $database->insert($outputValidate);
            $outputValidate = [];
            $success        = '<div class="alert alert-success" role="alert">
                                 Bạn đã thêm thành công! Bấm vào <a href ="list.php" >đây</a> để quay lại trang chủ.
                               </div>';
        }
    }
}
//link-form
$inputLink = HTML::createInput('text','link',$outputValidate['link']);
$labelLink = HTML::createLabel('Link');
$groupLink = HTML::createFormGroup($labelLink,$inputLink);

//Ordering-form
$inputOrdering = HTML::createInput('text','ordering',$outputValidate['ordering']);
$labelOrdering = HTML::createLabel('Ordering');
$groupOrdering = HTML::createFormGroup($labelOrdering,$inputOrdering);

//Status-form
$arrStatus = [2 => 'Select status', 0 => 'Inactive', 1 => 'Active'];
$status = HTML::createSelectbox($arrStatus, 'status', $outputValidate['status'], 'custom-select');
$labelStatus = HTML::createLabel('Status');
$groupStatus = HTML::createFormGroup($labelStatus,$status);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'html/head.php' ?>
</head>

<body style="background-color: #eee;">
    <div class="container pt-5">
        <form action="<?=$linkForm;?>" method="post">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="m-0"><?= $titePage; ?></h4>
                </div>
                <div class="card-body">
                    <?= $xhtmlError; ?>
                    <?= $success; ?>
                    <?= $groupLink;?>
                    <?= $groupStatus;?>
                    <?= $groupOrdering;?>
                </div>
                <div class="card-footer">
                    <input class="form-control" type="hidden" name="token" value="<?= time(); ?>">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="list.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <?php require_once 'html/script.php'; ?>
</body>

</html>