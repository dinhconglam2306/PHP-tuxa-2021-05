<?php
session_start();

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
error_reporting(E_ALL & ~E_NOTICE);
require_once 'libs/Form.class.php';
require_once 'libs/functions.php';
require_once 'define.php';
require_once 'connectLogin.php';
session_start();
//Name
$labelName = Form::label('username', 'Username', false);
$InputName = Form::input('text', 'username', 'username', '');
$rowName = Form::groupFormCol12($labelName, $InputName);

//Password
$labelPass = Form::label('password', 'Password', false);
$InputPass = Form::input('password', 'password', 'password', '');
$rowPass = Form::groupFormCol12($labelPass, $InputPass);

$button = Form::createButton('submit', 'Đăng nhập');
$elmA = Form::createA('index.php', 'Quay về');
$rowColtrol = Form::groupFormCol12($button, $elmA, true);
?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php'; ?>
</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Content
		============================================= -->
        <section id="content" class="w-100">
            <div class="content-wrap py-0">

                <div class="section p-0 m-0 h-100 position-absolute" style="background: url('images/login-bg.jpg') center center no-repeat; background-size: cover;">
                </div>

                <div class="section bg-transparent min-vh-100 p-0 m-0">
                    <div class="vertical-middle">
                        <div class="container-fluid py-5 mx-auto">
                            <div class="center">
                                <h2 class="text-white">ZendVN</h2>
                            </div>

                            <div class="card mx-auto rounded-0 border-0" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
                                <div class="card-body" style="padding: 40px;">
                                    <?php

                                    //Lấy dữ liệu từ xml
                                    $xml = simplexml_load_file(DIR_DATA . 'timeout.xml');
                                    $time = $xml->timeout;
                                    if ($_SESSION['flagPermission'] == true) {
                                        if ($_SESSION['timeout'] + $time > time()) {
                                            redirect('admin/list.php');
                                        } else {
                                            session_unset();
                                            redirect('login.php');
                                        }
                                    } else {
                                    ?>
                                        <form id="login-form" name="login-form" class="mb-0" action="process.php" method="post">
                                            <h3 class="text-center">Đăng nhập trang quản trị</h3>
                                            <div class="row">
                                                <?= $rowName; ?>
                                                <?= $rowPass; ?>
                                                <?= $rowColtrol; ?>
                                            </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="text-center dark mt-3"><small>Copyrights &copy; All Rights Reserved by ZendVN
                                    Inc.</small></div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #content end -->

    </div><!-- #wrapper end -->
    <?php require_once 'html/script.php'; ?>
</body>

</html>