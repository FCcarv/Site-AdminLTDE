<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-picture-o"></i>&nbsp;Galerias de Imagens
        <small>& Selecionar Imagens</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">ATUALIZAR GALERIAS</li>
        <li><a href="<?=BASEADMIN?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>galImages/"><i class="fa fa-list-ul"></i> Galerias</a></li>
        <li><a href="<?=BASEADMIN?>galImages/galFtadd/"><i class="fa fa-sign-out"></i> Cadastrar Galerias</a></li>
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
                <div class="col-md-offset-1 box-header with-border">
                    <h2><i class="fa fa-pencil"></i>&nbsp;<strong>Editar Galerias</strong></h2>
                </div>
                <div class="box-body">
                    <div class=" col-md-11">
                        <div class="row">
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
                                                            <input type="hidden" class="form-control input-lg title_exist" name="title_exist" value="0">
                                                            <label for="InputEmail1">Titulo da Galeria</label>
                                                            <input type="text" class="form-control input-lg title_post" data-controller="galImages/postExist/" name="title_galft" value="<?=$title_fto_albuns?>"/>
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
                                                            ><i class="fa"></i>Autualizar &
                                                                Publicar
                                                            </button>
                                                            <button type="submit" value="Cadastrar" id="idcad2"
                                                                    class="btn btn-primary btn-lg cad"
                                                            ><i class="fa "></i>Atualizar
                                                            </button>
                                                            <a href="<?=BASEADMIN?>/galImages/" class="btn btn-primary btn-lg pull-right">
                                                                <span class="fa fa-mail-reply-all"></span>&ensp;Voltar
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
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Atualizando galerias de imagens.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>




