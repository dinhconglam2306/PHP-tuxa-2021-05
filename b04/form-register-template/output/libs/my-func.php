<?php
    function createInput($name,$placeholder){
        $txt = '<input class="input--style-2" type="text" placeholder="'.$placeholder.'" name="'.$name.'">';
        return $txt;
    }

    function createSelectBox($name,$title,$arr){
        $txt  =   '<select name="'.$name.'">';
        $txt .=     '<option disabled="disabled" selected="selected">'.$title.'</option>';
        foreach($arr as $value){
            $txt .= sprintf('<option>%s</option>',$value);
        }
        $txt.='</select>';
        return '<div class="rs-select2 js-select-simple select--no-search">
                    '.$txt.'
                    <div class="select-dropdown"></div>
                </div>';
    }