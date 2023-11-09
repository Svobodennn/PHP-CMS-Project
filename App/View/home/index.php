<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= asset('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= asset('css/adminlte.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?=$data['navbar']?>
    <?=$data['sidebar']?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
<!--                total counts-->
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Customers</span>
                                <span class="info-box-number"><?= $data['total']['customers'] ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Projects</span>
                                <span class="info-box-number"><?= $data['total']['projects'] ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">System Users</span>
                                <span class="info-box-number"><?= $data['total']['system_users'] ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
<!--                active, completed project count-->
                <div class="row">
                    <?php foreach ($data['projects'] as $project):?>
                    <div class="col-lg-6 col-6">
                            <!-- small card -->
                            <div class="small-box bg-<?= $project['status'] == 'a' ? 'warning' : 'success' ?>">
                                <div class="inner">
                                    <h3><?= $project['status'] == 'a' ? 'Active Projects' : 'Completed Projects' ?></h3>

                                    <p><?= $project['total'] ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-<?= $project['status'] == 'a' ? 'info' : 'check' ?>"></i>
                                </div>
                                <a href="<?= _link('project') ?>" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
<!--                tables-->
                <div class="row">
<!--                    projects-->
                    <div class="col-md-6">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Customer</th>
                                <th>Progress</th>
                                <th>Status</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['projects_table'] as $key => $value): ?>
                                <tr id="row_<?= $value['id'] ?>">
                                    <td><?= $value['title']?></td>
                                    <td><a href="<?= _link('customer/detail/'.$value['customer_id']) ?>"><?= $value['name'].' '.$value['surname']?></a></td>
                                    <td>
                                        <?= $value['progress']?>%
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: <?= $value['progress'] ?>%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $value['status'] == 'a' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Passive</span>' ?>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= _link('project/edit/').$value['id'] ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>
<!--                    customers-->
                    <div class="col-md-6">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Customers</th>
                                <th>Company</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['customers_table'] as $key => $value): ?>
                                <tr id="row_<?= $value['id'] ?>">
                                    <td><?= $value['name'] . ' ' . $value['surname'] ?></td>
                                    <td><?= $value['company']?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= _link('customer/edit/').$value['id'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></a>
                                            <a href="<?= _link('customer/detail/').$value['id'] ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= asset('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= asset('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset('js/adminlte.min.js') ?>"></script>
</body>
</html>
