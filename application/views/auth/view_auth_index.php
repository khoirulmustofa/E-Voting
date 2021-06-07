<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $page ?> | NFBS Bogor</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?= base_url('public/custom/css/favicon.ico') ?>" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="<?= base_url('public') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url('public') ?>/plugins/iCheck/square/blue.css">
    <style>
        .login-page {
            background-image: linear-gradient(141deg, #ffffff 0%, #1fc8db 51%, #0281b1 75%);
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition login-page">
    <div class="login-box pt-5">
        <!-- /.login-logo -->
        <div class="login-box-body">
            <center>
                <a href="#" target="_blank" rel="noopener noreferrer">
                    <img src="<?= base_url('public/custom/css/NFlogo.png') ?>" width="30%" alt="" srcset="">
                </a>
            </center>
            <h3 class="text-center mt-0 mb-4">
                <b>B</b>oarding <b>S</b>chool <b>S</b>ystem
            </h3>
            <?php echo $this->session->flashdata('msg'); ?>
            <p class="login-box-msg">Masukan akun anda</p>
            <?php
            echo form_open('auth/action_login');
            ?>
            <div class="form-group has-feedback <?php set_validation_style('users_username') ?>">
                <input class=" form-control" placeholder="Masukan Username /  Email ..." name="users_username" type="text" value="<?php echo $users_username ?>" autofocus>
                <span class="fa fa-envelope form-control-feedback"></span>
                <span class="help-block"><?php echo form_error('users_username') ?></span>

            </div>
            <div class="form-group has-feedback <?php set_validation_style('users_password') ?>">
                <input class=" form-control" placeholder="Masukan Password ..." name="users_password" type="password" value="<?php echo $users_password ?>">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="help-block"><?php echo form_error('users_password') ?></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <?php echo form_checkbox('remember', TRUE, $remember) ?> Ingat Saya
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <script type="text/javascript">
        let base_url = '<?= base_url(); ?>';
    </script>
    <script src="<?= base_url('public') ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('public') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('public') ?>/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>