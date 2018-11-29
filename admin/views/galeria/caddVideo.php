<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa  fa-youtube-play"></i>&nbsp;Galeria de Vídeos
        <small>& All Videos</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRAR VÍDEOS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>gallery/"><i class="fa fa-file-video-o"></i>Listar</a></li>
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
                    <h2><i class="fa fa-list-ul"></i>&nbsp;<strong>Cadastrar</strong></h2>

                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <form class="form" action="" method="post" enctype="multipart/form-data" id="gallery/addVid">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <div class="col-sm-offset-2 col-sm-10 pull-right margin-bottom">
                                                <label>URL:</label>
                                                <input type="text" class="form-control input-lg" name="gal_url" id="inputName" placeholder="Copie e Cole a URL do Vídeo" required/>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type="hidden" class="form-control input-lg" name="gal_status" value="0">
                                                </div>
                                            </div
                                            <div class="box-footer clearfix">
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary" value="cadastraVideo"><i class="fa fa-video-camera"></i>&nbsp;Cadastrar Video</button>
                                                    </div>
                                                </div>
                                                <a href="<?=BASEADMIN?>gallery/" class="btn btn-primary pull-right">
                                                    <span class="fa fa-mail-reply-all"></span>&ensp;Voltar
                                                </a>
                                            </div>
                                        </div> <!-- /.FIM col-md-12 -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-footer">
                        Pode ser inseridos Vídeos de conteúdos relacionados ao <strong>
                            <i class="fa fa-youtube margin-r-5"></i>You tube  &  <i class="fa fa-vimeo-square margin-r-5"></i>Vimeo</strong>.
                   </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
