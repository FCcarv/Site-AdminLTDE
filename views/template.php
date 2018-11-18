<!DOCTYPE HTML>
<html lang="pt-br" class="no-js">
        <head>
            <meta charset="utf-8"/>
            <title>Instituto Zezinho Friggi</title>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta content="width=device-width, initial-scale=1" name="viewport"/>
            <meta content="" name="description"/>
            <meta content="" name="author"/>

            <!-- GLOBAL MANDATORY STYLES -->
            <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
            <link href="<?= BASE?>assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
            <link href="<?= BASE?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

            <!-- PAGE LEVEL PLUGIN STYLES -->
            <link href="<?= BASE?>assets/css/animate.css" rel="stylesheet">
            <link href="<?= BASE?>assets/css/swiper.min.css" rel="stylesheet" type="text/css"/>

            <!-- THEME STYLES -->
            <link href="<?= BASE?>assets/css/estilo.css" rel="stylesheet" type="text/css"/>
            <link href="<?= BASE?>assets/css/main.css" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="<?= BASE?>assets/plugins/f-awesome/css/font-awesome.css">
            <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">-->
            <!-- Favicon -->
            <link rel="shortcut icon" href="<?= BASE?>assets/imagem/favicon.png"/>

        </head>
        <!-- BODY -->
        <body>
        <!--========== HEADER ==========-->
        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" >
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="index.html">
                                <img class="logo-img logo-img-main" src="<?= BASE?>assets/imagem/logo-dark.png"  alt=" Logo-site">
                                <img class="logo-img logo-img-active" src="<?= BASE?>assets/imagem/logo-dark.png"  alt=" Logo-site">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="navbar-nav navbar-nav-right">
                                <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="index.html">Home</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="#">Blog</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="#">Sobre nós</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="#">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        <!--========== FOOTER ==========-->
        <footer class="footer">
            <section id="bottom">
                <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="widget">
                                <h3>Parcerias</h3>
                                <ul>
                                    <li><a href="http://www.assem.com.br"target="_blank">Assem - Associação dos Servidores Municipais</a></li>
                                    <li><a href="http://www.aesj.com.br" target="_blank">AESJ - Associação Esportiva São José</a></li>
                                    <li><a href="http://www.calasanscamargo.com.br"target="_blank">Academia Calasans Camargo</a></li>
                                    <li><a href="http://www.museudeesportes.sjc.sp.gov.br"target="_blank">Museu de Esportes</a></li>
                                    <li><a href="http://www.sjc.sp.gov.br"target="_blank">Prefeitura de São José dos Campos</a></li>
                                    <li><a href="http://www.logosfm.radioamiga.com.br "target="_blank">Radio Logus FM - 103,9 </a></li>
                                    <li><a href="http://www.thermasdovale.com.br"target="_blank">Thermas do Vale</a></li>
                                </ul>
                            </div>
                        </div><!--/.col-md-3-->

                        <div class="col-md-4col-sm-6">
                            <div class="widget">
                                <h2 class="h2">Redes Sociais</h2>
                                <ul class="icons">
                                    <li><a class="btn btn-default" href="https://twitter.com/InstZFriggi"><i class="icon style2 fa fa-twitter fa-3x" ></i></a></li>
                                    <li><a class="btn btn-default" href="https://www.facebook.com/Instituto-Zezinho-Friggi-1493860454205536/"><i class="icon style2 fa fa-facebook fa-3x "></i></a></li>
                                    <li><a class="btn btn-default" href="#"><i class="icon style2 fa fa-instagram fa-3x"></i></a></li>
                                    <li><a class="btn btn-default" href="#"><i class="icon style2 fa fa-envelope-o fa-3x"></i></a></li>
                                </ul>
                            </div>
                        </div><!--/.col-md-3-->
                    </div>
                </div>
            </section><!--/#bottom-->

            <footer id="footer" class="midnight-blue">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            &copy; 2018 <a href="http://InstitutoZFriggi.com.br" title="Instituto Zezinho Friggi">Instituto Zezinho Friggi</a> -  Todos Direitos Reservados.
                        </div>
                        <div class="col-sm-6">
                            <ul class="pull-right">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Sobre nós</a></li>
                                <li><a href="#">Contatos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer><!--/#footer-->
        </footer><!--class footer-->
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
       <!-- <script src="js/jquery.min.js" type="text/javascript"></script>-->
        <script src="<?= BASE?>assets/js/jquery.min.js"></script>
        <script src="<?= BASE?>assets/js/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/bootstrap.min.js"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="<?= BASE?>assets/js/jquery.easing.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/jquery.wow.min.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/swiper.jquery.min.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/jquery.masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/imagesloaded.pkgd.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="<?= BASE?>assets/js/layout.min.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/components/wow.min.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/components/swiper.min.js" type="text/javascript"></script>
        <script src="<?= BASE?>assets/js/components/masonry.min.js" type="text/javascript"></script>




        <script type="text/javascript">
            var BASE = '<?php echo BASE; ?>';
        </script>
    </body>
    <!-- END BODY -->
</html>