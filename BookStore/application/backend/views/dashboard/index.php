<?php
$group = Helper::createHtmlDashboard("3", "Group", "ion-ios-people");
$user = Helper::createHtmlDashboard("3", "User", "ion-ios-person");
$category = Helper::createHtmlDashboard("10", "Category", "ion-clipboard");
$book = Helper::createHtmlDashboard("30", "Book", "ion-ios-book");
$xhtml = $group . $user . $category . $book;

?>
<?= $xhtml ;?>