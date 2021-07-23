<?php
echo '<pre>';
print_r ($this->arrFilter);
echo '</pre>';
foreach ($this->arrFilter as $key => $value) {
    $btnClass = 'btn-secondary';
    // (@$this->_arrParam['status']?? '') ? ($btnClass = 'btn-info') : $btnClass;
    (@$this->_arrParam['status']?? $key) ? ($btnClass = 'btn-info') : $btnClass;
    @$filter .=  HelperBackend::showActive($module, $controller, ['status' => $key], ucfirst($key), $value, $btnClass);
}

$searchValue = isset($this->_arrParam['search']) ? trim($this->_arrParam['search']) : '';
?>
<div class="card card-outline card-info">
    <div class="card-header">
        <h3 class="card-title">Search & Filter</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center">
                <div class="area-filter-status mb-2">
                    <?= $filter ?>
                </div>
                <div class="area-search mb-2">
                    <form action="" method="GET">
                        <div class="input-group">
                            <?= Form::createInput('hidden', 'module', 'backend') ?>
                            <?= Form::createInput('hidden', 'controller', 'group') ?>
                            <?= Form::createInput('hidden', 'action', 'index') ?>
                            <?= Form::createInput('text', 'search', $searchValue) ?>
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info">Search</button>
                                <a href="<?= URL::createLink("backend", "group", "index") ?>" class="btn btn-danger">Clear</a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>