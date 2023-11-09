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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= asset('plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= asset('css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('plugins\summernote\summernote-bs5.min.css') ?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?= $data['navbar'] ?>
    <?= $data['sidebar'] ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?= $data['customer']['name'] . ' ' . $data['customer']['surname'] ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= _link('') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= _link('customer') ?>">Customers</a></li>
                            <li class="breadcrumb-item active"><?= $data['customer']['name'] . ' ' . $data['customer']['surname'] ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-warning">
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username m-0 text-center" ><?= $data['customer']['name'] . ' ' . $data['customer']['surname'] ?></h3>
                            <h5 class="widget-user-desc m-0 text-center"><?= $data['customer']['company'] ?></h5>
                        </div>
                        <div class="card-footer p-0">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Projects <span class="float-right badge bg-primary"><?= count($data['projects']) ?></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a target="_blank" href="mailto:<?= $data['customer']['mail'] ?>" class="nav-link">
                                        <?= $data['customer']['mail'] ?>
                                    </a>
                                </li>
                                <li class="nav-item">

                                    <a href="tel:<?= $data['customer']['phone']?>" class="nav-link">
                                          <?= $data['customer']['phone']?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <div class="col-md-8">
                <div id="summernote"><?= htmlspecialchars_decode($data['customer']['notes']) ?></div>
                <button style="width: 100%" class="btn btn-sm btn-success mb-2" onclick="saveNote()">Save Note</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Progress</th>
                            <th>Status</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;
                        foreach ($data['projects'] as $key => $value): ?>
                            <tr id="row_<?= $value['id'] ?>">
                                <td><?= $count++ ?></td>
                                <td><?= $value['title'] ?></td>
                                <td>
                                    <?= $value['progress'] ?>%
                                    <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger"
                                             style="width: <?= $value['progress'] ?>%"></div>
                                    </div>
                                </td>
                                <td>
                                    <?= $value['status'] == 'a' ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Passive</span>' ?>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-sm btn-danger" onclick="confirm(<?= $value['id'] ?>)"><i
                                                    class="fa fa-trash"></i></button>
                                        <a href="<?= _link('project/edit/') . $value['id'] ?>"
                                           class="btn btn-sm btn-warning"><i class="fa fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                        </tbody>
                    </table>
            </div>
        </div>
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
<script src="<?= asset('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= asset('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset('js/adminlte.min.js') ?>"></script>

<!--axios-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"
        integrity="sha512-WrdC3CE9vf1nBf58JHepuWT4x24uTacky9fuzw2g/3L9JkihgwZ6Cfv+JGTtNyosOhEmttMtEZ6H3qJWfI7gIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--sweetalert-->
<script src="<?= asset('plugins/sweetalert2/sweetalert2.all.js') ?>"></script>

<script src="<?= asset('plugins\summernote\summernote-bs5.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 150,
            maxHeight: 400
        });
    });

    function saveNote(){
        const html = $('#summernote').summernote('code');

        let formData = new FormData();
        formData.append('note', html)

        axios.post('<?= _link('customer/note/'.$data['customer']['id']) ?>', formData)
               .then(res => {
                   if (res.data.redirect) {
                       window.location.href = res.data.redirect;
                   }
                   Swal.fire(
                       res.data.title,
                       res.data.msg,
                       res.data.status
                   )
               }).catch(err => {
               console.log(err)
           })
           e.preventDefault()
    }

    //const customer = document.getElementById('customer')
    //customer.addEventListener('submit', (e) => {
    //    let customerName = document.getElementById('customerName').value
    //    let customerSurname = document.getElementById('customerSurname').value
    //    let customerMail = document.getElementById('customerMail').value
    //    let customerAddress = document.getElementById('customerAddress').value
    //    let customerPhone = document.getElementById('customerPhone').value
    //    let customerCompany = document.getElementById('customerCompany').value
    //    let customerId = document.getElementById('customerId').value
    //
    //    let formData = new FormData();
    //    formData.append('customerName', customerName)
    //    formData.append('customerSurname', customerSurname)
    //    formData.append('customerMail', customerMail)
    //    formData.append('customerAddress', customerAddress)
    //    formData.append('customerPhone', customerPhone)
    //    formData.append('customerCompany', customerCompany)
    //    formData.append('customerId', customerId)
    //
    //    axios.post('<?php //= _link('customer/edit') ?>//', formData)
    //        .then(res => {
    //            if (res.data.redirect) {
    //                window.location.href = res.data.redirect;
    //            }
    //            Swal.fire(
    //                res.data.title,
    //                res.data.msg,
    //                res.data.status
    //            )
    //        }).catch(err => {
    //        console.log(err)
    //    })
    //    e.preventDefault()
    //})

</script>

</body>
</html>
