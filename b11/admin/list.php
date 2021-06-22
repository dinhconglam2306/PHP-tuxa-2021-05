<?php
require_once 'connect.php';
require_once 'libs/Helper.class.php';
require_once 'libs/Pagination.class.php';
$totalItems = $database->totalItem("SELECT COUNT(`id`) AS totalItems FROM `rss`");
$pageRange =3;
$totalItemsPerpage = 3;
$currentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$pagination = new Pagination($totalItems,$totalItemsPerpage,$pageRange,$currentPage);

//Pagination
$paginationHTML = $pagination->showPagination();



$position = ($currentPage - 1) * $totalItemsPerpage;
$query =    "SELECT * FROM `rss` LIMIT $position,$totalItemsPerpage";
$search = '';
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $query =    "SELECT * FROM `rss` WHERE `link` LIKE '%$search%' LIMIT $position,$totalItemsPerpage";
    // $query.= "WHERE `link` LIKE '%$search%'";
}
$list = $database->listRecord($query);
$xhtml = '';
foreach ($list as $item) {
    $id = $item['id'];
    $link = Hepler::highLight($search, $item['link']);
    $ordering = $item['ordering'];
    $status = Hepler::checkClass($id, $item['status']);
    $xhtml .= sprintf(
        ' <tr>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>
                <a href="form.php?action=edit&id=%s" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete.php?id=%s" class="btn btn-sm btn-danger btn-delete">Delete</a>
            </td>
        </tr>',
        $id,
        $link,
        $status,
        $ordering,
        $id,
        $id
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'html/head.php'; ?>
    <style>
   
    </style>
</head>

<body style="background-color: #eee;">
    <div class="container pt-5">
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between">
                <a href="../index.php" class="btn btn-primary m-0">Back to website</a>
                <a href="logout.php" class="btn btn-info m-0">Logout</a>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Enter search keyword...." value="<?php echo $search ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-md btn-outline-primary m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Search</button>
                            <a href="list.php" class="btn btn-md btn-outline-danger m-0 px-3 py-2 z-depth-0 waves-effect" type="button">Clear</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">RSS List</h4>
                <a href="form.php?action=add" class="btn btn-success m-0">Add</a>
            </div>
            <div class="card-body">
                <table class="table table-striped btn-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Link</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ordering</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $xhtml; ?>
                    </tbody>
                </table>
                <div id="pagination">
                    <?= $paginationHTML ?>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'html/script.php'; ?>
</body>

</html>