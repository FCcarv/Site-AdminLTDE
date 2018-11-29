<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portal News | Dashboard</title>
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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= BASEADMIN ?>assets/css/plugins/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?= BASEADMIN ?>assets/css/plugins/blue.css">

    <link rel="stylesheet" href="<?= BASEADMIN ?>assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo --><?php
        extract($_SESSION['userlogin']); ?>
        <a href="<?= BASEADMIN ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>P</b>News</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Portal</b>News</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                   <!-- User menu right -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            if(!empty($foto_user)):?>
                                <img src="<?= BASEADMIN ?>assets/img/ft-perfil/<?= $foto_user ?>" class="user-image" alt="User Image"/>
                            <?php else:?>
                                <img class="user-image" src="<?= BASEADMIN ?>/assets/img/ft-perfil/padrao.jpg" alt="User Image">
                            <?php endif;
                            ?>
                            <span class="hidden-xs"><?= $nome_user . ' ' . $sobrenome_user ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <?php
                                if(!empty($foto_user)):?>
                                    <img src="<?= BASEADMIN ?>assets/img/ft-perfil/<?= $foto_user ?>" class="img-circle" alt="User Image">
                                <?php else:?>
                                    <img class="img-circle" src="<?= BASEADMIN ?>/assets/img/ft-perfil/padrao.jpg" alt="User Image">
                                <?php endif;?>
                                <p>
                                    <?= $nome_user . ' ' . $sobrenome_user ?>
                                    <small><?= $email_user?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= BASEADMIN . 'users/pefilUser/' . $id_user ?>"
                                       class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= BASEADMIN . '/login/logout'; ?>"
                                       class="btn btn-default btn-flat">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <?php
                    if(!empty($foto_user)):?>
                        <img src="<?= BASEADMIN ?>assets/img/ft-perfil/<?= $foto_user ?>" class="img-circle" alt="User Image">
                    <?php else:?>
                        <img class="img-circle" src="<?= BASEADMIN ?>/assets/img/ft-perfil/padrao.jpg" alt="User Image">
                    <?php endif;
                    ?>
                </div>
                <div class="pull-left info">
                    <p><?= $nome_user . ' ' . $sobrenome_user ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                            class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu de acesso</li>
                <li class="active">
                    <a href="<?= BASE?>">
                        <i class="fa fa-home"></i> <span>Site</span>
                    </a>
                </li>
                <li>
                    <a href="<?= BASEADMIN ?>home/">
                        <i class="fa fa-dashboard"></i> <span>Painel de Controle</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-external-link"></i> <span>Categorias</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= BASEADMIN ?>category/"><i class="fa fa-mail-forward "></i>Listar/Editar</a></li>
                        <li><a href="<?= BASEADMIN ?>category/add/"><i class="fa fa-paste"></i>Cadastrar</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="<?= BASEADMIN ?>post/">
                        <i class="fa  fa-rocket"></i> <span>Posts</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?= BASEADMIN ?>post/"><i class="fa fa-mail-forward"></i>Listar/Editar</a></li>
                        <li><a href="<?= BASEADMIN ?>post/add/"><i class="fa fa-paste"></i>Cadastrar</a></li>
                    </ul>
                </li>
                <?php
                   if($_SESSION['userlogin']['id_grup_permissao'] == 1){?>
                           <li>
                               <a href="<?= BASEADMIN ?>users/">
                                   <i class="fa fa-users"></i><span>Users</span>
                               </a>
                           </li>
                           <li>
                               <a href="<?= BASEADMIN ?>permissao">
                                   <i class="fa fa-key"></i> <span>Permissões</span>
                               </a>
                           </li>
                       <?php
                       }else{
                       echo"";
                       }?>
                     <?php if($_SESSION['userlogin']['id_grup_permissao'] <= 2){?>
                       <li class="treeview">
                           <a href="<?= BASEADMIN ?>gallery/">
                               <i class="fa fa-dashboard"></i> <span>Galerias</span>
                           </a>
                           <ul class="treeview-menu">
                               <li><a href="<?=BASEADMIN?>galImages/"><i class="fa fa-file-photo-o"></i>Imagens</a></li>
                               <li><a href="<?= BASEADMIN ?>gallery/"><i class="fa fa-file-video-o"></i>Videos</a></li>
                           </ul>
                       </li>
                       <li>
                           <a href="<?= BASEADMIN ?>message/">
                               <i class="fa fa-comments"></i> <span>Mensagens</span>
                           </a>
                       </li>
                       <li class="treeview">
                           <a href="<?= BASEADMIN ?>empresa/">
                               <i class="fa fa-building-o"></i> <span>Empresas</span>
                           </a>
                           <ul class="treeview-menu">
                               <li><a href="<?= BASEADMIN ?>empresa/"><i class="fa fa-file-video-o"></i>Listar/Editar</a></li>
                               <li><a href="<?= BASEADMIN ?>empresa/empCad"><i class="glyphicon glyphicon-trash"></i>Cadastrar</a></li>
                           </ul>
                       </li>
                       <li>
                           <a href="<?= BASEADMIN ?>jornal/">
                               <i class="fa fa-newspaper-o"></i> <span>Jornal</span>
                           </a>
                       </li>
                    <?php
                       }else{
                       echo"";
                   }?>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- box alerta -->
        <div class="alerta ">
            <h4><i class="icon icones "></i><span class="titulo"></span></h4>
            <div class="result"></div>
        </div>

        <!-- box alerta-->
         <?php $this->loadViewInTemplate($viewName, $viewData); ?>
    </div>
    <!-- /.content-wrapper -->
   <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h1 class="control-sidebar-heading"> AKI MESMO </h1>
                <h3 class="control-sidebar-heading">AKI MESMO</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->
                <h1 class="control-sidebar-heading"> AKI MESMO </h1>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->
            </div>            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab"><h1 class="control-sidebar-heading"> AKI MESMO </h1>
            </div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading"></h3>
                    <h3 class="control-sidebar-heading"> AKI MESMO </h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->
                    <h3 class="control-sidebar-heading">Chat Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
</div>
<!-- ./wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2018 fccompany. <!--<a href="">fccompany</a>--></strong> Todos os Direitos Reservados.
</footer>
<!-- jQuery 3 -->
<script src="<?= BASEADMIN ?>assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<script src="<?= BASEADMIN ?>assets/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= BASEADMIN ?>assets/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?= BASEADMIN ?>assets/js/plugins/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEADMIN ?>assets/js/adminlte.js"></script>

<script src="<?= BASEADMIN ?>assets/plugins/tinymce/tinymce.min.js"></script>
<script src="<?= BASEADMIN ?>assets/js/plugins/jmask.js"></script>
<script src="<?= BASEADMIN ?>assets/js/Proj-plugins.js"></script>
<script src="<?= BASEADMIN ?>assets/js/plugins/icheck.min.js"></script>

<script>
    var BASE = '<?= BASEADMIN ?>';
    var BSRA = '<?= BASE ?>';
</script>
<script src="<?= BASEADMIN ?>assets/js/ajax.js"></script>
</body>
</html>