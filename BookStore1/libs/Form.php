<?php

class Form
{
    //Create SelectBox
    public static function createSelectbox($name, $class, $arrValue, $keySelected = 0)
    {
        $xhtml = '<select name="'.$name.'" class="' . $class . '">';
        foreach ($arrValue as $key => $value) {
            if ($key == $keySelected) {
                $xhtml .= '<option value="' . $key . '" selected="selected">' . $value . '</option>';
            } else {
                $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
            }
        }
        $xhtml .= '</select>';
        return $xhtml;
    }

    //Create Input
    public static function createInput($type,$class,$name,$value=null)
    {
        $xhtml = sprintf('<input type="%s" class="%s" name="%s" value=%s>',$type,$class,$name,$value);
        return $xhtml;
    }
    
    //Create RowForm
    public static function createRowForm($labelName,$input,$select,$require=true)
    {
        $xhtml='<div class="form-group">  <label>'.$labelName.' <span class="text-danger">*</span></label>';
        if($require == true){
            $xhtml.=$input;
        }else{
            $xhtml.=$select;
        }
        $xhtml.='</div>';

        return $xhtml;
    }

    public static function createButtonForm($type,$class,$title)
    {
        $xhtml='<button type="'.$type.'" class="'.$class.'">'.$title.'</button>';
        return $xhtml;
    }
}
