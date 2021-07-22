<?php
$arrStatus   = ['default' => 'Bulk Action', 'delete' => 'Delete', 'inactive' => 'Inactive', 'active' => 'Active'];
$selectBox = Form::createSelectbox($arrStatus, 'slbStatus', '', 'form-control custom-select');
?>
<div class="col-12">

    <!-- Search & Filter -->
    <?php require_once 'elements/list_search_filter.php'; ?>
    <!-- List -->
    <form action="#" method="post" name="backend" id="group-form">
        <div class="card card-outline card-info">
            <!-- Card Header -->
            <?php require_once 'elements/list_card_header.php'; ?>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-between mb-2">
                        <div>
                            <div class="input-group">
                                <?= $selectBox; ?>
                                <span class="input-group-append">
                                    <button type="button" id=submit-apply class="btn btn-info apply">Apply</button>
                                </span>
                            </div>
                        </div>
                        <div>
                            <a href="<?= URL::createLink("backend", "group", "form") ?>" class="btn btn-info"><i class="fas fa-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Table -->
                    <?php require_once 'elements/list_table.php'; ?>
                </div>
            </div>
            <!-- Footer -->
            <?php require_once 'elements/list_card_footer.php'; ?>
        </div>
    </form>
</div>