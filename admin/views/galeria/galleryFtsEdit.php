<section class="content-header">
    <h1>
        <i class="fa fa-globe"></i> Área Administrativa
        <small> Videos & Galerias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="<?= BASEADMIN ?>galImages/">Listar</a></li>
    </ol>
</section>
<section class="content">
    <div class="row"><!-- /.############### col3 -->
        <!-- /.col 12 -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="col-sm-offset-2 box-header with-border">
                    <div class="user-block">
                        <h2>
                            <i class="fa fa-sticky-note-o"></i> Editar
                            <small> & Álbuns</small>
                        </h2>
                        <span class="description"><b>Editar álbuns de fotos</b></span>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row margin-bottom">
                        <?php
                        if(!empty($getDadosGal)){
                            foreach ($getDadosGal as $gall):
                                extract($gall);
                       ?>
                        <form class="form" action="" method="post" enctype="multipart/form-data" id="galImages/editgal">
                            <div class="col-sm-offset-2 box-body">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="col-sm-offset-1 col-sm-8">

                                            <div class="form-group"><!--ID-->
                                                <input type="hidden"  name="id_galft" value="<?=$id_fto_albuns?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="InputEmail1">Titulo da Galeria</label>
                                                <input type="text" class="form-control input-lg" name="title_galft" value="<?=$title_fto_albuns?>" id="InputEmail1" placeholder="Titulo Galeria">
                                            </div>
                                            <div class="form-group"><!--id input hidden-->
                                                <input type="hidden" class="form-control input-lg status" name="status_galft"
                                                       value="<?=$status_fto_albuns?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputFile">Foto de Capa</label>
                                                <input type="file"  class="form-control input-lg" name="img_galft" id="InputFile">

                                                <p class="help-block">Escolha uma imagem de capa.</p>
                                            </div>
                                            <div class="box-footer">
                                                <button type="submit" value="Cadastrar" id="idcad"
                                                        class="btn btn-success btn-lg cadPub"
                                                        ><i class="fa "></i>Autualizar &
                                                    Publicar
                                                </button>
                                                <button type="submit" value="Cadastrar" id="idcad2"
                                                        class="btn btn-primary btn-lg cad"
                                                        ><i class="fa "></i>Atualizar
                                                </button>
                                                <a href="<?=BASEADMIN?>/galImages/" class="btn btn-primary btn-lg pull-right">
                                                    <span class="glyphicon glyphicon-share-alt"></span>&ensp;Voltar
                                                </a>
                                            </div>
                                        </div>
                                    </div> <!-- /.FIM col-md-12 -->
                                </div>
                            </div>
                        </form>

                        <?php
                        endforeach;
                        }?>
                        <hr>

                    </div>

                    <!-- /.row -->
                </div>
                <canvas>fim</canvas><!--ESSA TAG FAZ COM QUE O CONTENT TENHA UMA MARGIN BOTTON-->
                <!-- /.post -->
            </div>
        </div>
    </div><!-- /row.############### fim col3 -->
</section>



