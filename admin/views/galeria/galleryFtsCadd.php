<section class="content-header">
    <h1>
        Galeria Fotos
        <small>Cadastrar Galerias de Fotos</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRO DE GALERIAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>/galImages/"><i class="fa fa-list-ul"></i>Listas de Galerias</a></li>

    </ol>
</section>
<section class="content">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Área administrativa</h2>
            </div>
            <div class="col-sm-offset-1 col-sm-8 margin-bottom">
                <div class="box-header with-border">
                    <h3 class="col-sm-offset-2 box-title"><strong><i class="fa fa-cubes margin-r-5"></i>Cadastrar Galerias</strong></h3>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="imgForm" method="post" enctype="multipart/form-data" id="galImages/addgal">
                <form class="imgForm" method="post" enctype="multipart/form-data" id="galImages/addgal">
                    <div class="box-body">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="form-group">
                                <label for="InputEmail1">Titulo da Galeria</label>
                                <input type="text" class="form-control" name="title_galft" id="InputEmail1" placeholder="Titulo Galeria">
                            </div>
                            <div class="form-group"><!--id input hidden-->
                                <input type="hidden" class="form-control input-lg status" name="status_galft" value="0"/>
                            </div>
                            <div class="form-group">
                                <label for="InputFile">Foto de Capa</label>
                                <input type="file" name="img_galft" id="InputFile">

                                <p class="help-block">Escolha uma imagem de capa.</p>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                              <a href="<?=BASEADMIN?>/galImages/" class="btn btn-primary pull-right">
                                <span class="glyphicon glyphicon-share-alt"></span>&ensp;Voltar
                            </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </form>
            </form>
        </div>
    </div>
</section>