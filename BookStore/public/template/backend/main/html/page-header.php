<?php 
    $pageHeader = $this->arrParams['controller']." Controller";
    if($this->arrParams['controller'] == 'dashboard') $pageHeader = $this->arrParams['controller'];
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