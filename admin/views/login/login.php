<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= BASEADMIN ?>assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= BASEADMIN ?>assets/css/plugins/f-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= BASEADMIN ?>assets/css/plugins/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= BASEADMIN ?>assets/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= BASEADMIN ?>assets/css/plugins/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?= BASEADMIN ?>"><b>Admin</b>LTE</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                    <p class="login-box-msg">Faça login para iniciar a sessão</p>
                <div class="alerta ">
                    <h4><i class="icon icones"></i><span class="titulo"></span></h4>
                    <div class="result"></div>
                </div>

                <form class="form" method="post" id="login/log">

                    <div class="form-group has-feedback">
                        <input type="text" class="form-control"name="email_us" value="<?=(isset($email_us))? $email_us:''; ?>"placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="pass_us" value="<?=(isset($pass_us))? $pass_us:''; ?>" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remenber"value="1" <?php if(isset($remenber))echo 'checked="checked"'?>/>Lembrar-me
                                </label>
                            </div>
                        </div>

                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-success btn-block btn-flat"><i class="fa"></i>Logar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
               <!-- /  <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                        Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                        Google+</a>
                </div>
               .social-auth-links -->
                <a href="<?= BASEADMIN ?>login/key">&larrhk;Esqueci minha senha</a><br>
                <a href="<?= BASEADMIN ?>login/cadastra" class="text-center">Cadastrar-se </a>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="<?= BASEADMIN ?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= BASEADMIN ?>assets/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?= BASEADMIN ?>assets/js/plugins/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
         <script>
            var BASE = '<?= BASEADMIN ?>'; 
        </script>
        <script src="<?= BASEADMIN ?>assets/js/ajax.js"></script>
    </body>
</html>
