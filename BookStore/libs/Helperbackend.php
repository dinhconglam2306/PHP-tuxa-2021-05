<?php

class HelperBackend
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
        $url = URL::createLink($module, $controller, "changeStatus", ["id" => $id, "status" => $status]);
        $xhtml = sprintf(' <a href="' . $url . '" class="btn %s rounded-circle btn-sm"><i class="fas %s"></i></a>', $btnClass, $btnIcon);
        return $xhtml;
    }


    //showActive Filter_Search
    public static function showActive($module, $controller, $status, $title,$num,$btnClass)
    {
        $url = URL::createLink($module, $controller, "index", $status);
        $xhtml = ' <a href="' . $url . '" class="btn '.$btnClass.'">' . $title . ' <span class="badge badge-pill badge-light">'.$num.'</span></a>';
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
        $url = URL::createLink($module, $controller, "changeGroupAcp", ["id" => $id, "status" => $groupAcp]);
        $xhtml = sprintf(' <a href="' . $url . '" class="btn %s rounded-circle btn-sm"><i class="fas %s"></i></a>', $btnClass, $btnIcon);
        return $xhtml;
    }

    //Tạo HTML Created
    public static function createdHTML($createdBy, $created)
    {
        $xhtml = '
        <p class="mb-0"><i class="far fa-user"></i> ' . $createdBy . '</p>
        <p class="mb-0"><i class="far fa-clock"></i> ' . $created . '</p>
        ';
        return $xhtml;
    }
    //Tạo HTML Modified
    public static function modifiedHTML($modifiedBy, $modified)
    {
        $xhtml = '
        <p class="mb-0"><i class="far fa-user"></i> ' . $modifiedBy . '</p>
        <p class="mb-0"><i class="far fa-clock"></i> ' . $modified . '</p>
        ';
        return $xhtml;
    }

    //Tạo highlight
    public static function highLight($search, $name)
    {
        if ($search != '') {
            return preg_replace('/' . preg_quote($search, '/') . '/ui', '<mark>$0</mark>', $name);
        }
        return $name;
    }

    //Tạo thẻ a trong Search-Filter
    public static function elmA($id, $href, $class, $aTitle, $spanTitle)
    {
        $xhtml = '
        <a id= "' . $id . '" href="' . $href . '" class="btn ' . $class . '">' . $aTitle . ' <span class="badge badge-pill badge-light">' . $spanTitle . '</span></a>
        ';

        return $xhtml;
    }
}
