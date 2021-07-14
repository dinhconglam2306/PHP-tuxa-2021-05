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
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- BOX ONE -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                    150
                                </h3>
                                <p>
                                    New Orders
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- BOX TWO -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                    53<sup style="font-size: 20px">%</sup>
                                </h3>
                                <p>
                                    Bounce Rate
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- BOX THREE -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                    44
                                </h3>
                                <p>
                                    User Registrations
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- BOX FOUR -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>
                                    65
                                </h3>
                                <p>
                                    Unique Visitors
                                </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
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