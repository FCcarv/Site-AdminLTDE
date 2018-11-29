<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-building-o"></i>&nbsp; Banner Empresas
        <small> & Company</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRO DE EMPRESAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>empresa/"><i class="fa fa-list-ul"></i>Listas de Empresas</a></li>
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
                    <h2><i class="fa fa-barcode"></i>&nbsp;<strong>Cadastrar</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <!-- form start -->
                            <form class="form" method="post" enctype="multipart/form-data" id="empresa/addEmpr">
                                <div class="box-body">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <div class="form-group margin-bottom">
                                            <label for="InputFile">Imagem ou Logomarca</label>
                                            <input type="file" class="form-control input-lg" name="image_emp"/>
                                            <p class="help-block">Atenção os dados com * são obrigatório o preenchimento.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Nome Completo (*)</p></label>
                                            <input type="text" class="form-control input-lg" name="nome_emp" placeholder="Nome da Empresa" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Marca</p></label>
                                            <input type="text" class="form-control input-lg" name="marca_emp" placeholder="Marca da Empresa" required/>
                                        </div>

                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control input-lg" name="email_emp" placeholder="E-mail da Empresa" required>
                                        </div>
                                        <div class="form-group margin-bottom">
                                            <label>Site</label>
                                            <input type="text" class="form-control input-lg" name="link_emp" placeholder="http://">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                ,<div class="form-group">
                                                    <label>Telefone</label>
                                                    <input type="text" class="form-control input-lg formPhone" name="telefone_emp"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                ,<div class="form-group">
                                                    <label>Celular</label>
                                                    <input type="text" class="form-control formPhone input-lg" name="cel_emp"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" value="Cadastrar"class="btn btn-success btn-lg"><i class="fa fa-caret-square-o-right"></i>&nbsp;Cadastrar</button>
                                            <a href="<?=BASEADMIN?>empresa/" class="btn btn-primary btn-lg pull-right">
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
                    Cadastro de empresas no sistema.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>

