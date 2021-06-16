<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<?php

use function PHPSTORM_META\type;

require_once 'html-index/head.php';
error_reporting(E_ALL & ~E_NOTICE);
?>

<body class="stretched overlay-menu">
    <?php
    require_once 'lib/functions.php';
    $xhtml      = getContent('https://vnexpress.net/rss/the-thao.rss');
    $xhtmlGold  = getContentGold('https://www.sjc.com.vn/xml/tygiavang.xml');
    $xhtmlCoin  = getContentCoin();



   
    ?>
    <div id="wrapper" class="clearfix bg-light">
        <?php require_once 'html-index/header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Content -->

                <section id="content" class="bg-light">
                    <div class="content-wrap pt-lg-0 pt-xl-0 pb-0">
                        <div class="container-fluid clearfix">
                            <div class="heading-block border-bottom-0 center pt-4 mb-3">
                                <h3>Tin tức</h3>
                            </div>
                            <!-- Posts -->
                            <div class="row grid-container infinity-wrapper clearfix align-align-items-start">
                                <?= $xhtml; ?>
                            </div>
                        </div>
                    </div>
                </section> <!-- #content end -->

                <section class="right-side mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="box mt-4">
                                    <h3 class="mb-1">Giá vàng</h3>
                                    <div class="card card-body" id="box-gold">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th><b>Loại vàng</b></th>
                                                    <th><b>Mua vào</b></th>
                                                    <th><b>Bán ra</b></th>
                                                </tr>
                                            </thead>
                                            <?= $xhtmlGold; ?>
                                        </table>
                                        <!-- <div class="text-center">
                                            <div class="spinner-border" style="width: 3rem; height: 3rem;"
                                                role="status">
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="box mt-4">
                                    <h3 class="mb-1">Giá coin</h3>
                                    <div class="card card-body" id="box-coin">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th><b>Name</b></th>
                                                    <th><b>Price (USD)</b></th>
                                                    <th><b>Change (24h)</b></th>
                                                </tr>
                                            </thead>
                                            <?= $xhtmlCoin; ?>
                                        </table>
                                        <!-- <div class="text-center">
                                            <div class="spinner-border" style="width: 3rem; height: 3rem;"
                                                role="status">
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <?php require_once 'html-index/footer.php'; ?>
    </div>

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up rounded-circle"></div>
    <?php require_once 'html-index/script.php'; ?>
</body>

</html>