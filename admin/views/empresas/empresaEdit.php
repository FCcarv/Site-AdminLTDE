<section class="content-header">
    <h1>
        Banner
        <small> & Company</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">ATUALIZAR O CADASTRO DA EMPRESA</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>empresa/"><i class="fa fa-list-ul"></i>Listas Empresas</a></li>
        <li><a href="<?=BASEADMIN?>empresa/emprCadd/"><i class="fa fa-sign-out"></i>Cadastrar Empresas</a></li>

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
                    <h3 class="box-title"><strong><i class="glyphicon glyphicon-collapse-down margin-r-5"></i>Atualizar Empresas</strong></h3>
                </div>
            </div>
            <!-- form start -->
            <form class="form" method="post" enctype="multipart/form-data" id="">
                <div class="box-body">
                    <div class="col-sm-offset-2 col-sm-8">
                        <div class="form-group margin-bottom">
                            <label for="InputFile">Imagem ou Logomarca</label>
                            <input type="file" name="image_emp"/>
                        </div>
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome_image" placeholder="Nome da Empresa" />
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="email_emp" placeholder="E-mail da Empresa">
                        </div>


                        <div class="form-group margin-bottom">
                            <label>Link</label>
                            <input type="text" class="form-control " name="link_image" placeholder="http://">
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                ,<div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control formPhone" name="telefone_image"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                ,<div class="form-group">
                                    <label>Celular</label>
                                    <input type="text" class="form-control formPhone" name="telefone_image"/>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" value="Cadastrar"class="btn btn-success">Atualizar</button>
                            <a href="<?=BASEADMIN?>empresa/" class="btn btn-primary pull-right">
                                <span class="glyphicon glyphicon-share-alt"></span>&ensp;Voltar
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
    </div>
</section>