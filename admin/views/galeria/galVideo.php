<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa  fa-youtube-play"></i>&nbsp;Galeria de Vídeos
        <small>& All Videos</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">PLAY & VÍDEOS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>gallery/"><i class="fa fa-file-video-o"></i>Listar</a></li>
        <li><a href="<?= BASEADMIN ?>gallery/addGalVid"><i class="fa fa-film"></i>Cadastrar</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border margin-bottom">
                    <h2 class="box-title">Área administrativa</h2>
                </div>
                <div class="col-md-offset-2 box-header with-border">
                    <h2><i class="fa fa-play"></i>&nbsp;<strong>Play</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <div class="col-sm-offset-1 box-body">
                                <div class="row margin-bottom">
                                    <div class="col-sm-offset-2 col-sm-6">
                                        <?php
                                        if(!empty($setVideo)){
                                            foreach ($setVideo as $video):
                                                extract($video);
                                                if (strlen($embed_video) == 11){
                                                    ?>
                                                    <iframe width="640" height="360" src="https://www.youtube.com/embed/<?=$embed_video?>" frameborder="0" allowfullscreen></iframe>
                                                    <div class="text-center">
                                                        <h3 class="text-left"><strong>Titulo: </strong><?=$titulo_video?></h3>
                                                        <p class="text-left"> <strong>Descrição: </strong><?=$descricao_video?></p>
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <iframe width="640" height="360" src="https://player.vimeo.com/video/<?=$embed_video?>" frameborder="0" allowfullscreen></iframe>
                                                    <div class="col-sm-offset-2 col-sm-12 text-center">
                                                        <h3 class="text-left"><strong>Titulo: </strong><?=$titulo_video?></h3>
                                                       <p class="text-left"> <strong>Descrição: </strong><?=$descricao_video?></p>
                                                    </div>
                                                    <?php
                                                }
                                            endforeach;
                                        } ?>
                                    </div>
                                    <a href="<?=BASEADMIN?>gallery/" class="btn btn-primary pull-left col-sm-offset-9">
                                        <span class="fa fa-mail-reply-all"></span>&ensp;Voltar
                                    </a>
                                </div>
                                <!-- /.row -AKI-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                   Assista os vídeos do You Tube cadastrados na galeria.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
