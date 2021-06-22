<?php

class Hepler{

    public static function checkClass($id,$status){
        $btnClass = 'btn-success';
        $iconClass = 'fa-check';
        if($status == '0' ){
            $btnClass = 'btn-danger';
            $iconClass ='fa-minus';
        }
        $xhtml =sprintf( ' <a href="change-status.php?id=%s&status=%s" class="btn btn-sm %s"><i
        class="fas %s"></i></a>',$id,$status,$btnClass,$iconClass);
        return $xhtml;
    }

    public static function highLight($search, $link){
        $url = str_replace($search,"<mark>$search</mark>",$link);
        return $url;
    }
}