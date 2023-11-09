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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <?= $data['navbar'] ?>
    <?= $data['sidebar'] ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Projects</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= _link('/') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="<?= _link('project') ?>">Projects</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-bordered">
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
                        <?php $count=1; foreach ($data['projects'] as $key => $value): ?>
                            <tr id="row_<?= $value['id'] ?>">
                                <td><?= $count++ ?></td>
                                <td><?= $value['title']?></td>
                                <td>
                                    <?= $value['progress']?>%
                                        <div class="progress progress-xs">
                                             <div class="progress-bar progress-bar-danger" style="width: <?= $value['progress'] ?>%"></div>
                                        </div>
                                </td>
                                <td>
                                    <?= $value['status'] == 'a' ? 'Active' : 'Passive' ?>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-sm btn-danger" onclick="confirm(<?= $value['id'] ?>)">Delete</button>
                                        <a href="<?= _link('project/edit/').$value['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


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

<!--axios-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"
        integrity="sha512-WrdC3CE9vf1nBf58JHepuWT4x24uTacky9fuzw2g/3L9JkihgwZ6Cfv+JGTtNyosOhEmttMtEZ6H3qJWfI7gIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--sweetalert-->
<script src="<?= asset('plugins/sweetalert2/sweetalert2.all.js') ?>"></script>

<script>

    function confirm(id){
        Swal.fire({
            title: "Do you want to remove?",
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: "Yes",
            denyButtonText: `Don't remove`
        }).then((result) => {
            if (result.isConfirmed) {
                removeProject(id)
            } else if (result.isDenied) {
                Swal.fire("Did not remove", "", "info");
            }
        });
    }

    function removeProject(id){
        let projectId = id;

        let formData = new FormData();
        formData.append('projectId', projectId);

        axios.post('<?= _link('project/remove') ?>', formData)
            .then(res => {
                if (res.data.removed){
                    document.getElementById('row_'+res.data.removed).remove()
                }
                Swal.fire(
                    res.data.title,
                    res.data.msg,
                    res.data.status
                )
            }).catch(err => {
            console.log(err)
        })
    }
</script>

</body>
</html>
