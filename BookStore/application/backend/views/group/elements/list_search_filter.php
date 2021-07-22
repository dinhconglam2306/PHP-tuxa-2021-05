<?php
$searchValue = isset($this->_arrParam['search']) ? trim($this->_arrParam['search']) : '';
$itemsLength = count($this->items);
$activeLength = 0;
foreach ($this->items as $item) {
    if ($item['status'] == 'active') $activeLength++;
}
$inActiveLength = $itemsLength - $activeLength;
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
                    <?= Helperbackend::elmA('filter-all', '#', 'btn-info', 'All', $itemsLength); ?>
                    <?= Helperbackend::elmA('filter-active', '#', 'btn-secondary', 'Active', $activeLength); ?>
                    <?= Helperbackend::elmA('filter-inactive', '#', 'btn-secondary', 'Inactive', $inActiveLength); ?>
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