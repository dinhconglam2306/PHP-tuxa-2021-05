<?php
$group      = HelperBackend::createHtmlDashboard("3", "Group", "ion-ios-people");
$user       = HelperBackend::createHtmlDashboard("3", "User", "ion-ios-person");
$category   = HelperBackend::createHtmlDashboard("10", "Category", "ion-clipboard");
$book       = HelperBackend::createHtmlDashboard("30", "Book", "ion-ios-book");
$xhtml      = $group . $user . $category . $book;

?>
<?= $xhtml; ?>