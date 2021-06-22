<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $status =$_GET['status'] == '0' ? '1' : '0';
    $query = "UPDATE `rss` SET `status` = '$status' WHERE `id` = $id";
    $database->query($query);
    header('location:list.php');
?>
