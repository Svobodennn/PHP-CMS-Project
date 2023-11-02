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
    <!--    Sweetalert-->
    <link rel="stylesheet" href="<?= asset('plugins/sweetalert2/sweetalert2.css') ?>">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0)"><b>CMS</b>Project</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="" id="login" method="post">
                <div class="input-group mb-3">
                    <input type="email" id="mail" name="mail" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!--                    <div class="social-auth-links text-center mb-3">-->
            <!--                        <p>- OR -</p>-->
            <!--                        <a href="#" class="btn btn-block btn-primary">-->
            <!--                            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook-->
            <!--                        </a>-->
            <!--                        <a href="#" class="btn btn-block btn-danger">-->
            <!--                            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+-->
            <!--                        </a>-->
            <!--                    </div>-->
            <!-- /.social-auth-links -->

            <!--                    <p class="mb-1">-->
            <!--                        <a href="forgot-password.html">I forgot my password</a>-->
            <!--                    </p>-->
            <!--                    <p class="mb-0">-->
            <!--                        <a href="register.html" class="text-center">Register a new membership</a>-->
            <!--                    </p>-->
        </div>
        <!-- /.login-card-body -->
    </div>
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
    const login = document.getElementById('login')
    login.addEventListener('submit', (e) => {
        let mail = document.getElementById('mail').value
        let password = document.getElementById('password').value

        let formData = new FormData();
        formData.append('mail', mail)
        formData.append('password', password)

        axios.post('', formData)
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
