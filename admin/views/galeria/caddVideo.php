<section class="content-header">
    <h1>
        <i class="fa fa-globe"></i> Área Administrativa
        <small> Videos & Galerias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="<?= BASEADMIN ?>gallery/">Listar</a></li>
    </ol>
</section>
<section class="content">
    <div class="row"><!-- /.############### col3 -->
        <!-- /.col 12 -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="user-block">
                        <h2>
                            <i class="fa fa-file-video-o"></i> Cadastrar
                            <small> & Videos</small>
                        </h2>
                        <span class="description"><b>Pode ser inseridos Vídeos de conteúdos relacionados ao <strong><i class="fa fa-youtube margin-r-5"></i>You tube  &  <i class="fa fa-vimeo-square margin-r-5">  </i>Vimeo</strong></b></span>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row margin-bottom">
                        <form class="form" action="" method="post" enctype="multipart/form-data" id="gallery/addVid">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10 margin-bottom">
                                                <strong>Videos</strong>
                                                <p class="text-muted">
                                                    Para cadastrar o video basta preencher o campo.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-offset-2 col-sm-10 pull-right margin-bottom">
                                           <label>URL:</label>
                                           <input type="text" class="form-control input-lg" name="gal_url" id="inputName" placeholder="Copie e Cole a URL do Vídeo" required/>
                                       </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="hidden" class="form-control input-lg" name="gal_status">
                                            </div>
                                        </div
                                       <div class="box-footer clearfix">
                                           <div class="form-group">
                                               <div class="col-sm-offset-2 col-sm-10">
                                                   <button type="submit" class="btn btn-primary" value="cadastraVideo">Cadastrar Video</button>
                                               </div>
                                           </div>
                                           <a href="<?=BASEADMIN?>gallery/" class="btn btn-primary pull-right">
                                               <span class="glyphicon glyphicon-share-alt"></span>&ensp;Voltar
                                           </a>
                                       </div>
                                   </div> <!-- /.FIM col-md-12 -->
                                </div>
                            </div>
                        </form>
                        <hr>
                    <canvas>fim</canvas><!--ESSA TAG FAZ COM QUE O CONTENT TENHA UMA MARGIN BOTTON-->
                    </div>
                    <!-- /.row -->
                 </div>
                <!-- /.post -->
            </div>
        </div>
    </div><!-- /row.############### fim col3 -->
</section>



