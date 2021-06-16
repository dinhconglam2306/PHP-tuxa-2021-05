<?php 
require_once 'lib/functions.php';
$xhtml = getContentGold('https://www.sjc.com.vn/xml/tygiavang.xml');
?>
<table class="table table-sm">
    <thead>
        <tr>
            <th><b>Loại vàng</b></th>
            <th><b>Mua vào</b></th>
            <th><b>Bán ra</b></th>
        </tr>
    </thead>
    <tbody>
        <?= $xhtml; ?>
    </tbody>
</table>