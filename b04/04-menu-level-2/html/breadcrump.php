<?php
require_once 'data.php';

$xhtml = '';

if($activePage == 'index'){
    $xhtml = '<span>Home</span>';
}else{
    if(count($breadcrumbArrChild) >= 2){
        foreach($breadcrumbArrChild as $key =>$value){
            $link = strtolower($breadcrumbArrChild[0]);
            $xhtml = sprintf('<a href="index.php">Home</a>
                                <span>><a href="%s.php">%s</a><span> > </span></span>
                     <span>%s</span>',$link,$breadcrumbArrChild[0],$value);
        }
    }else{
        $xhtml = sprintf('<a href="index.php">Home</a>
                    <span>></span>
                    <span>%s</span>',$breadcrumbArrChild[0]);
    }
}
?>
<div class="breadcrumb">
    <?php echo $xhtml; ?>
</div>