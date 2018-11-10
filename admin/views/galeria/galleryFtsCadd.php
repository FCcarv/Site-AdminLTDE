<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-picture-o"></i>&nbsp;Galerias de Imagens
        <small>& Selecionar Imagens</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRAR GALERIAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>/galImages/"><i class="fa fa-list-ul"></i> Galerias</a></li>
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
                    <h2><i class="fa fa-cubes"></i>&nbsp;<strong>Cadastrar</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <form class="imgForm" method="post" enctype="multipart/form-data" id="galImages/addgal">
                                <div class="box-body">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <div class="form-group">
                                            <label for="InputEmail1">Titulo da Galeria</label>
                                            <input type="text" class="form-control input-lg" name="title_galft" id="InputEmail1" placeholder="Titulo Galeria">
                                        </div>
                                        <div class="form-group"><!--id input hidden-->
                                            <input type="hidden" class="form-control status" name="status_galft" value="0"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputFile">Foto de Capa</label>
                                            <input type="file" class="form-control input-lg" name="img_galft" id="InputFile">

                                            <p class="help-block">Escolha uma imagem de capa</p>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
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
                    Cadastrando galerias de  imagens no sistema.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
