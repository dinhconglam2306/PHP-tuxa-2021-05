<?php

class Helper
{
    // Tạo HTML cho index DashBoard
    public static function createHtmlDashboard($h3, $p, $icon, $href = "#")
    {
        $xhtml = '
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>' . $h3 . '</h3>
                    <p>' . $p . '</p>
                </div>
                <div class="icon">
                    <i class="ion ' . $icon . '"></i>
                </div>
                <a href="' . $href . '" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>';
        return $xhtml;
    }
    //show Status
    public static function showStatus($module, $controller, $id, $status)
    {
        $btnClass = 'btn-success';
        $btnIcon  = 'fa-check';
        if ($status == 'inactive') {
            $btnClass = 'btn-danger';
            $btnIcon  = 'fa-minus';
        };
        $xhtml = ' <a href="index.php?module=' . $module . '&controller=' . $controller . '&action=changeBtn&id=' . $id . '&status=' . $status . '" class="btn ' . $btnClass . ' rounded-circle btn-sm"><i class="fas ' . $btnIcon . '"></i></a>';
        return $xhtml;
    }
    public static function showGroupAcp($module, $controller, $id, $groupAcp)
    {
        $btnClass = 'btn-success';
        $btnIcon  = 'fa-check';
        if ($groupAcp == 0) {
            $btnClass = 'btn-danger';
            $btnIcon  = 'fa-minus';
        };
        $xhtml = ' <a href="index.php?module=' . $module . '&controller=' . $controller . '&action=changeBtn&id=' . $id . '&status=' . $groupAcp . '" class="btn ' . $btnClass . ' rounded-circle btn-sm"><i class="fas ' . $btnIcon . '"></i></a>';
        return $xhtml;
    }


    //Tạo div có class nav-item

    public static function navItemClass($href,$icon,$title,$titleIcon='',$flag=true)
    {
        // $xhtml ='';
        // if($flag == true){
        //     $xhtml = '
        //     <li class="nav-item">
        //         <a href="'.$href.'" class="nav-link">
        //             <i class="far '.$icon.'"></i>
        //             <p>'.$title.'</p>
        //         </a>
        //     </li>
        //     ';
        // }else {

        // }
       
        // return $xhtml;
    }
}
