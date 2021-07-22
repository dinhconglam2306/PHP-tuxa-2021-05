<?php
class Form
{
    public static function createSelectbox($arrData, $name, $keySelected = null, $class = null)
    {
        $xhtml = "";
        if (!empty($arrData)) {
            $xhtml = '<select id="select-box" class="' . $class . '" name="' . $name . '">';
            foreach ($arrData as $key => $value) {
                if ($keySelected == $key && $keySelected != null) {
                    $xhtml .= '<option value="' . $key . '" selected="true">' . $value . '</option>';
                } else {
                    $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
                }
            }
            $xhtml .= '</select>';
        }
        return $xhtml;
    }
    public static function createInput($type, $name, $value)
    {
        $xhtml = sprintf(
            '<input class="form-control" type="%s" name="%s" value="%s">',
            $type,
            $name,
            $value
        );

        return $xhtml;
    }
}
