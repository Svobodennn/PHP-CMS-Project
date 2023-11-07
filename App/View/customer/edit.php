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
            <form id="customer">
                <input type="hidden" id="customerId" value="<?= $data['customer']['id'] ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label for="customerName">Customer Name</label>
                        <input type="text" class="form-control" value="<?= $data['customer']['name'] ?>" id="customerName" name="customerName" placeholder="Enter customer name">
                    </div>
                    <div class="form-group">
                        <label for="customerSurname">Customer Surname</label>
                        <input type="text" class="form-control" value="<?= $data['customer']['surname'] ?>" id="customerSurname" name="customerSurname" placeholder="Enter customer surname">
                    </div>
                    <div class="form-group">
                        <label for="customerCompany">Company</label>
                        <input type="text" class="form-control" value="<?= $data['customer']['company'] ?>" id="customerCompany" name="customerCompany" placeholder="Enter customer company">
                    </div>
                    <div class="form-group">
                        <label for="customerMail">Customer Mail</label>
                        <input type="email" class="form-control" value="<?= $data['customer']['mail'] ?>" id="customerMail" name="customerMail" placeholder="Enter customer mail">
                    </div>
                    <div class="form-group">
                        <label for="customerPhone">Customer Phone</label>
                        <input type="text" class="form-control" value="<?= $data['customer']['phone'] ?>" id="customerPhone" name="customerPhone" placeholder="Enter customer phone">
                    </div>
                    <div class="form-group">
                        <label for="customerAddress">Customer Address</label>
                        <textarea  class="form-control" rows="4" cols="50" id="customerAddress" name="customerAddress"><?= $data['customer']['address'] ?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
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
    const customer = document.getElementById('customer')
    customer.addEventListener('submit', (e) => {
        let customerName = document.getElementById('customerName').value
        let customerSurname = document.getElementById('customerSurname').value
        let customerMail = document.getElementById('customerMail').value
        let customerAddress = document.getElementById('customerAddress').value
        let customerPhone = document.getElementById('customerPhone').value
        let customerCompany = document.getElementById('customerCompany').value
        let customerId = document.getElementById('customerId').value

        let formData = new FormData();
        formData.append('customerName', customerName)
        formData.append('customerSurname', customerSurname)
        formData.append('customerMail', customerMail)
        formData.append('customerAddress', customerAddress)
        formData.append('customerPhone', customerPhone)
        formData.append('customerCompany', customerCompany)
        formData.append('customerId', customerId)

        axios.post('<?= _link('customer/edit') ?>', formData)
            .then(res => {
                if (res.data.redirect){
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
