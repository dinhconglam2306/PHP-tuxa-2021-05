<?php
$status = (isset($this->arrParam['status'])) ? ['status' => $this->arrParam['status']] : ['status' => 'all'];
$search =  (isset($this->arrParam['search'])) ? ['search' => $this->arrParam['search']] : ['search' => ''];
if(isset($this->arrParam['search'])){
    $search = ['search' => $this->arrParam['search']];
    $params = $status + $search;
}else {
    $params = $status;
}

$paginationHTML = $this->pagination->showPagination(URL::createLink($this->arrParam['module'],$this->arrParam['controller'],'index',$params));
?>
<?= $paginationHTML; ?>