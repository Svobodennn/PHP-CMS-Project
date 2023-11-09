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
            <form id="project">
                <div class="card-body">
                    <div class="form-group">
                        <label for="customerId">Choose Customer</label>
                        <select class="form-control" id="customerId">
                            <option value="">- Choose Customer -</option>
                            <?php foreach ($data['customers'] as $key => $value): ?>
                            <option value="<?= $value['id'] ?>"><?= $value['name'].' '.$value['surname'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="projectTitle">Project Title</label>
                        <input type="text" class="form-control"
                               id="projectTitle" name="projectTitle" placeholder="Enter project title">
                    </div>
                    <div class="form-group">
                        <label for="projectDetails">Project Details</label>
                        <textarea class="form-control" rows="4" cols="50" id="projectDetails"
                                  name="projectDetails"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="projectStartDate">Start Date</label>
                        <input type="date" class="form-control"
                               id="projectStartDate" name="projectStartDate">
                    </div>
                    <div class="form-group">
                        <label for="projectEndDate">End Date</label>
                        <input type="date" class="form-control"
                               id="projectEndDate" name="projectEndDate">
                    </div>
                    <div class="form-group">
                        <label for="projectProgress">Progress</label>
                        <input type="range" min="0" max="100" class="custom-range"
                               id="projectProgress" name="projectProgress">
                    </div>
                    <div class="form-group">
                        <label for="projectStatus">Status</label>
                        <select class="form-control" id="projectStatus">
                            <option value="a">Active</option>
                            <option value="p">Passive</option>
                        </select>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
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

<!--axios-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"
        integrity="sha512-WrdC3CE9vf1nBf58JHepuWT4x24uTacky9fuzw2g/3L9JkihgwZ6Cfv+JGTtNyosOhEmttMtEZ6H3qJWfI7gIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--sweetalert-->
<script src="<?= asset('plugins/sweetalert2/sweetalert2.all.js') ?>"></script>

<script>
    const project = document.getElementById('project')
    project.addEventListener('submit', (e) => {
        let projectTitle = document.getElementById('projectTitle').value
        let projectEndDate = document.getElementById('projectEndDate').value
        let projectDetails = document.getElementById('projectDetails').value
        let projectProgress = document.getElementById('projectProgress').value
        let projectStatus = document.getElementById('projectStatus').value
        let projectStartDate = document.getElementById('projectStartDate').value
        let customerId = document.getElementById('customerId').value

        console.log(projectTitle)

        let formData = new FormData();
        formData.append('projectTitle', projectTitle)
        formData.append('projectEndDate', projectEndDate)
        formData.append('projectDetails', projectDetails)
        formData.append('projectStatus', projectStatus)
        formData.append('projectProgress', projectProgress)
        formData.append('projectStartDate', projectStartDate)
        formData.append('customerId', customerId)

        axios.post('<?= _link('project/add') ?>', formData)
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
    })

</script>

</body>
</html>
