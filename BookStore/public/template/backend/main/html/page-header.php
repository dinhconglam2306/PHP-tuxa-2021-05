<?php 
    $pageHeader = $this->_arrParam['controller']." Controller";
    if($this->_arrParam['controller'] == 'dashboard') $pageHeader = $this->_arrParam['controller'];
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?=ucfirst($pageHeader) ?></h1>
            </div>
        </div>
    </div>
</div>