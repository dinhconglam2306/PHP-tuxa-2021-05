<?php
$str = "php/127/typescript/12/jquery/120/angular/50";
    /*
     * Array
     *  (
     *      'php'           => 127
     *      'typescript'    => 12
     *      'jquery'        => 120
     *      'angular'       => 50
     *  )
     *  
     */
$idex = explode("/",$str);
$resultNumber = array();
$resultString = array();
foreach($idex as $key => $value){
    if(is_numeric($value)){
        array_push($resultNumber,$value);
    }else{
        array_push($resultString,$value);
    }
}
$fullArray = array_combine($resultString,$resultNumber);
echo "<pre>";
print_r($fullArray);
echo "</pre>";
