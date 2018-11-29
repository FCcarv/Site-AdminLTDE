<!--DESTAQUE DO SITE-->
<div class="border_bottom border_bottom_destaque">
    <article class="destaque container2">
        <div class="row">
            <div class="content">
                <header class="header_h1">
                    <h1 class="title_h1">Zezinho Friggi o Craque da Vermelhinha.</h1>
                    <p class="tagline2">Uns dos maiores personagens da história de São José dos Campos.
                        Veja o video e se surpreenda com essa história maravilhosa!</p>
                </header>

                <div class="destaque_video embed-responsive-item">
                    <div class="ratio">
                        <iframe class="media2"  src="https://www.youtube.com/embed/yoEaclPZ6kk?rel=0" frameborder="0" allowfullscreen></iframe>

                    </div>
                </div>
                <div class="clear"></div>

            </div>
        </div>
    </article>
</div>
<!--DESTAQUE DO SITE-->


<!--========== PAGE LAYOUT ==========-->
<!-- Service -->

<div class="bg-color-sky-light" data-auto-height="true">
    <div class="content-lg container">
        <div class="row">
            <div class="col-sm-12 titleEdt">
                <h2 class="title_padg">Nossos Editores</h2>
                <p>Os responsáveis pelas as nossas notícias e atualizações.</p>
            </div>
            <?php
            if(!empty($editores)){
                foreach ($editores as $edit):
                    extract($edit)?>
                    <div class="col-sm-4 sm-margin-b-2">
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <img class="img-responsive" title="Photo-Usuario-<?= $nome_user ?>" src="<?= BASE . 'tim.php?src=admin/assets/img/ft-perfil/' . $foto_user . '&w=80&h=112' ?>" alt="Photo-Usuario-<?= $nome_user ?>">
                                </div>
                                <div class="service-info">
                                    <h3><a href="#"><?= $nome_user ?></a> <span class="text-uppercase margin-l-20"><?= $sobrenome_user ?></span></h3>
                                    <p class="margin-b-5">Edição & Arte</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
            }else{
                echo "<div class=\"alert alert-info alert-dismissible\">
                    <h2><i class=\"icon fa fa-info\"></i> Opss!</h2>
                    <h3><b> Não existe editores cadastrados no sistema!!</b></h3>
                  </div>";
            }?>
        </div>
        <!--// end row -->
    </div>
</div>
<!-- End Service -->

<!-- Latest Products -->
<div class="content-lg container">
    <div class="row margin-b-40">
        <div class="col-sm-6">
            <h2>Notícias</h2>
            <p>O que acontece em nossa cidade e região.Vocẽ fica sabendo e atualizado.</p>
        </div>
    </div>
    <!--// end row -->

    <div class="row">
        <!-- Latest Products -->
        <?php
        if(!empty($PostFront)){
            foreach ($PostFront as $pts):
                extract($pts)?>
                <div class="col-sm-4 sm-margin-b-100 pg-bottom">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive"  title="Photo-<?=$title_post?>" src="<?= BASE . 'tim.php?src=uploads/' . $cover_post . '&w=980&h=647'?>" alt="Photo-<?=$slug_post?>">
                        </div>
                    </div>
                    <h4><a href="#"><?=$title_post?></a> <span class="text-uppercase margin-l-20">Por: <?=$autor_post?></span></h4>
                    <p><?=Check::Words($content_post, 30) ?></p>
                    <a class="link" href="<?BASE?>home/noticias/<?=$slug_post?>">Veja mais ...</a>
                </div>
                <!-- End Latest Products -->
            <?php
            endforeach;
        }else{
            echo "<div class=\"alert alert-info alert-dismissible\">
                    <h2><i class=\"icon fa fa-info\"></i> Opss!</h2>
                    <h3><b> Não existe Artigos cadastrados no sistema!!</b></h3>
                  </div>";
        }?>
    </div>
    <!--// end row -->
</div>
<!-- End Latest Products -->

<!-- Clients -->
<div class="margin bg-color-sky-light">
    <div class="content-lg container">
        <!-- Swiper Clients -->
        <div class="swiper-slider swiper-clients">
            <!-- Swiper Wrapper -->
               <div class="swiper-wrapper">
                    <?php
                    if(!empty($allEmpresas)){
                        foreach ($allEmpresas as $emps):
                            extract($emps)?>
                            <div class="swiper-slide">
                                <a href="<?=$link_cliente_empresa?>"target="_blank"><img class="swiper-clients-img" src="<?= BASE . 'tim.php?src=uploads/' . $image_cliente_empresa . '&w=208&h=77'?>" alt="Photo-<?=$slug_cliente_empresa?>"/></a>
                            </div>
                        <?php
                        endforeach;
                    }else{
                        echo "<div class=\"alert alert-info alert-dismissible\">
                                <h2><i class=\"icon fa fa-info\"></i> Opss!</h2>
                                <h3><b> Não existe empresas cadastrados no sistema nesse momento!!</b></h3>
                              </div>";
                    }?>
                </div>
            <!-- End Swiper Wrapper -->
        </div>
        <!-- End Swiper Clients -->
    </div>
</div>
<!-- End Clients -->

<!-- Testimonials -->
<div class="content-lg container">
    <div class="row">
        <div class="col-sm-9">
            <h2>Mensagens <span class="text-uppercase margin-l-20">Clique na mensagem para que apareça outras.</h2>

            <!-- Swiper Testimonials -->
            <div class="swiper-slider swiper-testimonials">
                <!-- Swiper Wrapper -->
                <div class="swiper-wrapper">
                    <?php
                    if(!empty($allMsg)){
                        foreach ($allMsg as $ms):
                            extract($ms)?>
                            <div class="swiper-slide">
                                <blockquote class="blockquote">
                                    <div class="col-md-offset-1 col-md-9">
                                        <div class="margin-b-20 colortextMsg">
                                            <div class="box-header with-border">
                                                <h3 class="box-title"><strong><?=$titulo_mensagem?></strong></h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <p>
                                                    <?=Check::Words($descricao_mensagem, 125)?>
                                                </p>
                                                <ul class="nav nav-stacked">
                                                    <li>
                                                        <span class="pull-left fweight-700 color-link margin-bottom colortextMsg">Autor: <?=$autor_mensagem?></span><br>
                                                        <span class="pull-right fweight-700 colortextMsg" style="margin-top: 25px"><i>Fonte: <?=$fonte_mensagem?></i></span>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- /.box-body -->
                                        </div><!-- /.box COLOR -->
                                    </div>
                                 </blockquote>
                            </div>
                        <?php
                        endforeach;
                    }else{
                        echo "<div class=\"alert alert-info alert-dismissible\">
                                <h2><i class=\"icon fa fa-info\"></i> Opss!</h2>
                                <h3><b> Não existe mensagens cadastradas no sistema!!</b></h3>
                              </div>";
                    }?>
                </div>
                <!-- End Swiper Wrapper -->
                <!-- Pagination -->
                <div class="swiper-testimonials-pagination"></div>
            </div>
            <!-- End Swiper Testimonials -->
        </div>
    </div>
    <!--// end row -->
</div>

<!-- End Testimonials -->
<div class="content-lg container">
    <div class="col-md-12">
        <h2>Entrevistas </h2>
        <div class="row">
            <?php
            if(!empty($allVideos)){
                foreach ($allVideos as $video):
                    extract($video)?>
                    <div class="col-sm-6 col-md-6 col-md-offset-1col-lg-6 col-lg-offset0">
                        <div class="accordion"><!--allVideos-->
                            <div class="panel-group" id="accordion1">
                                <div class="panel panel-default">
                                    <div class="panel-heading active">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" target="_blank" href="https://www.youtube.com/embed/<?=$embed_video?>"title="Video-<?=$titulo_video?>">
                                                <?=Check::Words($titulo_video, 10)?>
                                                <i class="fa fa-chevron-right pull-right"></i>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="media accordion-inner">
                                                <div class="pull-left">
                                                    <a target="_blank" href="https://www.youtube.com/embed/<?=$embed_video?>" title="Video-<?=$titulo_video?>">
                                                        <img class="img-responsive" src="<?=$thumb_video?>" title="" alt="img_video" width="160px" height="95"/>
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5><?=$titulo_video?></h5>
                                                    <p><?=Check::Words($descricao_video, 15)?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--/#accordion1-->
                    </div>

                <?php
                endforeach;
            }else{
                echo "<div class=\"alert alert-info alert-dismissible\">
                        <h2><i class=\"icon fa fa-info\"></i> Opss!</h2>
                        <h3><b> Não existe videos cadastrados no sistema nesse momento!!</b></h3>
                      </div>";
            }?>
        </div> <!--/#row-->
        </br>
        </br>
        </br>
        </br>
        </br>
    </div>

    <!-- Promo Section -->
    <div class="content-lg container promo-section overflow-h">
        <div class="container">
            <div class="clearfix">
                <div class="ver-center">
                    <div class="ver-center-aligned">
                        <div class="promo-section-col">
                            <h2>Web Site - Instituto Zezinho Friggi  </h2>
                            <p>Esse projeto tem como fundador e idealizador '<strong>ZEZINHO FRIGGI </strong>', nascido na centenária família Friggi
                                foi um dos grandes jogadores de futebol da sua história: José Antônio Walter Friggi, tido como o melhor
                                jogador de futebol de salão da cidade de São José dos Campos.<br>
                                Foi  o <strong> Pelé do Futebol de Salão</strong>,  afirmam orgulhosos, e torcedores da velha-guarda, assim como os antigos companheiros e adversários.</p>
                            <p>Através desse web site<strong> Instituto Zezinho Friggi </strong> podemos oferecer para a população de São José dos Campos um
                                projeto institucional, portal de notícias, e também conteúdos próprios de sua parceira a <strong>RÁDIO LOGUS  FM 105,9 </strong>
                                onde Zezinho friggi se apresenta todos os sábados.</p></br> <p>Esperamos com isso alcançar, um grande número de pessoas,e que de alguma forma o nosso conteúdo ajude e traga boas informações para a população da nossa cidade e região.</p></br>
                            <strong>Forte abraço!</strong></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="promo-section-img-right">
            <img class="img-responsive" src="<?= BASE?>assets/imagem/destaque-zezinho03.jpg" title="" alt="zezinho friggi" width="970px" height="970"/>
        </div>
    </div>
    <!-- End Promo Section -->

    <!-- Work -->
    <div class="bg-color-sky-light overflow-h">
        <div class="content-lg container margin-pd">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Nossa Galeria </h2>
                    <p>Fotos que marcaram e eternizaram momentos. </p>
                </div>
            </div>
            <!--// end row -->

            <!-- Masonry Grid -->
            <div class="masonry-grid">
                <div class="masonry-grid-sizer col-xs-6 col-sm-6 col-md-1"></div>
                <?php
                if(!empty($galeriasFt)){
                    foreach ($galeriasFt as $Gts):
                        extract($Gts)?>
                        <div class="masonry-grid-item col-xs-6 col-sm-6 col-md-4">
                            <!-- Work -->
                            <div class="work wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                                <div class="work-overlay">
                                    <img class="full-width img-responsive"  title="Photo-<?=$title_fto_albuns?>" src="<?= BASE . 'tim.php?src=uploads/' . $cover_fto_albuns .'&w=397&h=400'?>" alt="'Img'<?=$title_fto_albuns?>">
                                </div>
                                <div class="work-content">
                                    <h3 class="color-white margin-b-5"><?=$title_fto_albuns?></h3>
                                    <!--<p class="color-white margin-b-0">DESCRIÇÃO.</p>-->
                                </div>
                                <a class="content-wrapper-link" href="<?=BASE?>home/fts/<?=$slug_fto_albuns?>"></a>
                            </div>
                            <!-- End Work -->
                        </div>
                    <?php
                    endforeach;
                }else{
                    echo "<div class=\"alert alert-info alert-dismissible\">
                            <h2><i class=\"icon fa fa-info\"></i> Alert!</h2>
                            <h3><b> Não existe galerias de fotos cadastrados no sistema!!</b></h3>
                          </div>";
                }?>
            </div>
            <!-- End Masonry Grid -->
        </div>
    </div>
    <!-- End Work -->
    <!--========== END PAGE LAYOUT ==========-->
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 wow fadeInDown">
                    <div class="tab-wrap">
                        <div class="media">
                            <div class="parrent pull-left">
                                <ul class="nav nav-tabs nav-stacked">
                                    <li class=""><a href="#tab1" data-toggle="tab" class="analistic-01">Nosso Jornal</a></li>
                                    <li class="active"><a href="#tab2" data-toggle="tab" class="analistic-02">Orgulho para nós</a></li>
                                    <li class=""><a href="#tab3" data-toggle="tab" class="tehnical">Nossa História</a></li>
                                    <li class=""><a href="<?=BASE?>home/jornal">Edições Publicadas</a></li>
                                    <li class=""><a href="#tab5" data-toggle="tab" class="tehnical">Contato</a></li>
                                </ul>
                            </div>

                            <div class="parrent media-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="tab1">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="img-responsive" src="<?= BASE?>assets/imagem/jornal/01.jpg">
                                            </div>
                                            <div class="media-body">
                                                <h2>Opinião Regional</h2>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade active in" id="tab2">
                                        <div class="media">
                                            <div class="pull-left">
                                                <img class="img-responsive" src="<?= BASE?>assets/imagem/jornal/02.jpg">
                                            </div>
                                            <div class="media-body">
                                                <h2>Opinião Regional</h2>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="tab3">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                                    </div>

                                    <div class="tab-pane fade" id="tab4">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words</p>
                                    </div>

                                    <div class="tab-pane fade" id="tab5">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures,</p>
                                    </div>
                                </div> <!--/.tab-content-->
                            </div> <!--/.media-body-->
                        </div> <!--/.media-->
                    </div><!--/.tab-wrap-->
                </div><!--/.col-sm-6-->

                <div class="col-xs-12 col-sm-4 wow fadeInDown">
                    <div class="testimonial">
                        <h2>Editores</h2>
                        <div class="media testimonial-inner">
                            <div class="pull-left">
                                <img class="img-responsive img-circle" src="<?= BASE?>assets/imagem/jornal/ed001.jpg">
                            </div>
                            <div class="media-body">
                                <p>Queremos que o eleitor receba muita informação.</p>
                                <span class="jr-Editor"><strong>Zezinho Friggi</strong> Diretor</span>
                            </div>
                        </div>

                        <div class="media testimonial-inner">
                            <div class="pull-left">
                                <img class="img-responsive img-circle" src="<?= BASE?>assets/imagem/jornal/ed002.jpg">
                            </div>
                            <div class="media-body">
                                <p>Informação com  muita qualidade e estilo. </p>
                                <span class="jr-Editor"><strong>Juliana Friggi</strong> Editora de Moda</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#content-->
</div>