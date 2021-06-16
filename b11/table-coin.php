<?php 
require_once 'lib/functions.php';
$xhtml = getContentCoin();
?>
<table class="table table-sm">
    <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Price (USD)</b></th>
            <th><b>Change (24h)</b></th>
        </tr>
    </thead>
    <tbody>
        <?= $xhtml; ?>
    </tbody>
</table>