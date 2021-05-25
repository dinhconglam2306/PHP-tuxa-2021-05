<?php
require_once 'data.php';

$xhtml = '';

if($activePage == 'index'){
    $xhtml = '<span>Home</span>';
}else{
    if(count($breadcrumbArrChild) >= 2){
        $xhtmlLevel2 = '';
        foreach($breadcrumbArrChild as $key =>$value){
           
            if($key == count($breadcrumbArrChild)-1){
                $xhtmlLevel2.= '<span>'.$value.'</span>';
            }else{
                $xhtmlLevel2.= '<a href="'.strtolower($value.".php").'">'.$value.'</a>'. ' > ';
            }
        }
        $xhtml=  '<a href="index.php">Home</a>'.' > '.$xhtmlLevel2;
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