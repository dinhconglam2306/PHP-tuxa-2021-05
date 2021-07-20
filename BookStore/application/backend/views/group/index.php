<?php
echo '<pre>';
print_r ($_POST);
echo '</pre>'; 
?>
<div class="col-12">
    <!-- Search & Filter -->
    <?php require_once 'elements/list_search_filter.php'; ?>
    <!-- List -->
    <div class="card card-outline card-info">
        <!-- Card Header -->
        <?php require_once 'elements/list_card_header.php'; ?>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between mb-2">
                    <div>
                        <form action="<?php URL::createLink("backend","group","changeStatus") ?>" method="post">
                            <div class="input-group">
                                <select class="form-control custom-select">
                                    <option >Bulk Action</option>
                                    <option value="1">Delete</option>
                                    <option>Active</option>
                                    <option>Inactive</option>
                                </select>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info apply">Apply</button>
                                </span>
                            </div>
                        </form>
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
</div>