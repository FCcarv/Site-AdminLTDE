<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-picture-o"></i>&nbsp;Imagens
        <small>& Selecionar Imagens</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRAR IMAGENS</li>
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
                    <h2><i class="fa fa-file-photo-o"></i>&nbsp;<strong>Imagens</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <form class="imgForm" method="post" enctype="multipart/form-data" id="images/addFts">
                                <div class="box-body">
                                    <div class="col-sm-offset-1 col-sm-8">
                                        <div class="form-group">
                                            <label>Nome da galeria</label>
                                            <select class="form-control input-lg select_img" name="album_image" required>
                                                <option value="">Selecione a galeria...</option>
                                                <?php
                                                if(!empty($selectGallery)) {
                                                    foreach ($selectGallery as $gallery):
                                                        extract($gallery);


                                                            ?>

                                                        <option value="<?= $id_fto_albuns ?>" data-p="<?=$title_fto_albuns?>"><?= (!empty($title_fto_albuns) ? $title_fto_albuns : 'Não existe galerias cadastradas');?></option>
                                                    <?php endforeach;
                                                }else{

                                                    echo "<div class=\"alert alert-info alert-dismissible\">
                                                                   <h4><i class=\"icon fa fa-info\"></i>Opss!!</h4>
                                                                Você não tem postagens inseridas nessa sistema!!
                                                          </div>";
                                                }?>
                                             </select>
                                        </div>
                                        <div>
                                            <!-- campo tb categorias Parent Cat input hidden-->
                                            <input type="hidden" class="form-control input-lg albImg" name="title_image" value="<?= (!empty($title_fto_albuns) ? $title_fto_albuns : 'Não existe galerias cadastradas');?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputFile">Imagens</label>
                                            <input type="file" name="cover_image[]" multiple>
                                            <p class="help-block">Escolha imagens para as galerias.</p>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" value="Cadastrar"class="btn btn-success btn-lg">Cadastre as Imagens</button>
                                            <a href="<?=BASEADMIN?>/galImages/" class="btn btn-primary btn-lg pull-right">
                                                <span class="fa fa-mail-reply-all"></span>&ensp;Voltar
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Cadastrando imagens nas galerias.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
