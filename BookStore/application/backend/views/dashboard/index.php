<?php
$group      = Helperbackend::createHtmlDashboard("3", "Group", "ion-ios-people");
$user       = Helperbackend::createHtmlDashboard("3", "User", "ion-ios-person");
$category   = Helperbackend::createHtmlDashboard("10", "Category", "ion-clipboard");
$book       = Helperbackend::createHtmlDashboard("30", "Book", "ion-ios-book");
$xhtml      = $group . $user . $category . $book;

?>
<?= $xhtml; ?>