<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin BookStore</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
</head>

<body class="skin-blue">
    <!---HEADER START ---->
    <header class="header">
        <?php require_once 'html/nav-left.php' ?>
        <?php require_once 'html/nav-right.php' ?>
    </header>
    <!---HEADER END ---->
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!---SIDEBAR START ---->
        <aside class="left-side sidebar-offcanvas" style="min-height: 1813px;">
            <?php require_once 'html/sidebar.php' ?>
        </aside>
        <!---SIDEBAR END ---->
        <!---CONTENT START ---->
        <aside class="right-side">
            <section class="content-header">
                <?php require_once 'html/breadcrumb.php' ?>
            </section>
            <section class="content">
                <div class="text-center">
                    <a class="btn btn-app">
                        <i class="fa fa-refresh"></i>Reload
                    </a>
                    <a class="btn btn-app">
                        <i class="fa fa-plus-square-o"></i>Add
                    </a>
                    <a class="btn btn-app">
                        <i class="fa fa-check-circle-o"></i>Publish
                    </a>
                    <a class="btn btn-app">
                        <i class="fa fa-circle-o"></i>Unpublish
                    </a>
                    <a class="btn btn-app">
                        <i class="fa fa-minus-square-o"></i>Delete
                    </a>
                    <a class="btn btn-app">
                        <span class="badge bg-yellow">3</span>
                        <i class="fa fa-bullhorn"></i>Notifications
                    </a>
                </div>
                <!---MESSAGE ---->
                <div class="alert alert-success alert-dismissable">
                    <i class="fa fa-check"></i>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <b>Alert!</b> Success alert preview. This alert is dismissable.
                </div>
                <!---TABLE ---->
                <div class="box">
                    <div class="box-body table-responsive">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 175px;">Rendering engine</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 253px;">Browser</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 226px;">Platform(s)</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 147px;">Engine version</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 103px;">CSS grade</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Rendering engine</th>
                                        <th rowspan="1" colspan="1">Browser</th>
                                        <th rowspan="1" colspan="1">Platform(s)</th>
                                        <th rowspan="1" colspan="1">Engine version</th>
                                        <th rowspan="1" colspan="1">CSS grade</th>
                                    </tr>
                                </tfoot>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    <tr class="odd">
                                        <td class="  sorting_1">Gecko</td>
                                        <td class=" ">Firefox 1.0</td>
                                        <td class=" ">Win 98+ / OSX.2+</td>
                                        <td class=" ">1.7</td>
                                        <td class=" ">A</td>
                                    </tr>
                                    <tr class="even">
                                        <td class="  sorting_1">Gecko</td>
                                        <td class=" ">Firefox 1.5</td>
                                        <td class=" ">Win 98+ / OSX.2+</td>
                                        <td class=" ">1.8</td>
                                        <td class=" ">A</td>
                                    </tr>
                                    <tr class="odd">
                                        <td class="  sorting_1">Gecko</td>
                                        <td class=" ">Firefox 2.0</td>
                                        <td class=" ">Win 98+ / OSX.2+</td>
                                        <td class=" ">1.8</td>
                                        <td class=" ">A</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="dataTables_info" id="example1_info">Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="dataTables_paginate paging_bootstrap">
                                        <ul class="pagination">
                                            <li class="prev disabled"><a href="#">← Previous</a></li>
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li class="next"><a href="#">Next → </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div>
            </section>
        </aside>
        <!---CONTENT END ---->
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="js/AdminLTE/app.js" type="text/javascript"></script>
    <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
</body>

</html>