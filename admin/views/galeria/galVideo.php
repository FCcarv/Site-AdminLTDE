<section class="content-header">
    <h1>
        <i class="fa fa-video-camera"></i> Galerias
        <small>& Videos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="<?= BASEADMIN ?>gallery/addGalVid">Cadastrar</a></li>
        <li><a href="<?= BASEADMIN ?>gallery/">Listar</a></li>
    </ol>
</section>
<section class="content">
    <div class="row"><!-- /.############### col3 -->
       <!-- /.col -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box box-primary">
                    <div class="box-header with-border margin-bottom">
                        <h2 class="box-title">Área administrativa</h2>
                    </div>
                </div>
                <div class="col-sm-offset-2 box-header with-border margin-bottom">
                    <div class="user-block">
                        <h2>
                            <i class="fa fa-play"></i> Play
                            <small> & Video</small>
                        </h2>
                        <span class="description">São Vídeos de conteúdos relacionados  do youtube</span>
                    </div>
                </div>
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
                                            <strong><h3 class="text-left"><?=$titulo_video?></h3></strong>
                                            <p class="text-left"><?=$descricao_video?></p>
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <iframe width="640" height="360" src="https://player.vimeo.com/video/<?=$embed_video?>" frameborder="0" allowfullscreen></iframe>
                                        <div class="col-sm-offset-2 col-sm-12 text-center">
                                            <strong><h3 class="text-left"><?=$titulo_video?></h3></strong>
                                            <p class="text-left"><?=$descricao_video?></p>
                                        </div>
                                        <?php
                                    }
                                endforeach;
                            } ?>
                        </div>
                        <a href="<?=BASEADMIN?>gallery/" class="btn btn-primary pull-left col-sm-offset-9">
                            <span class="glyphicon glyphicon-share-alt"></span>&ensp;Voltar
                        </a>
                    </div>
                    <!-- /.row -AKI-->
                </div>
            </div>
        </div><!-- /row.############### fim col3 -->
</section>
