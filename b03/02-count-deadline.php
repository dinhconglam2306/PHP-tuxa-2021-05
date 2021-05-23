<?php
$input = '68';
$strID = "78, 60,62,68,69,68,73,85,66 ,69,65,74,63,67 ,65,64,68,73,75,69,73,169";

// Input: Chuỗi lưu trữ ID của các Developer bị trễ task
// Requirement: Tìm xem Developer có ID 69 bị trễ task bao nhiêu lần
// Output: 3

$array = explode(",",$strID );
$arr = array();
foreach($array as $key => $value){
    array_push($arr,trim($value," "));
}

$index = array_count_values($arr);
foreach($index as $key => $value){
    if($key == $input){
        echo $value;
    }
}
// echo "<pre>";
// print_r($index);
// echo "</pre>";
