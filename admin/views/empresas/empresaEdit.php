<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-building-o"></i>&nbsp; Banner Empresas
        <small> & Company</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">EDITAR EMPRESAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>empresa/"><i class="fa fa-list-ul"></i>Listas de Empresas</a></li>
        <li><a href="<?=BASEADMIN?>empresa/empCad/"><i class="fa fa-sign-out"></i>Cadastrar Empresas</a></li>
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
                    <h2><i class="fa fa-pencil"></i>&nbsp;<strong>Atualizar</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <?php
                            if (!empty($getEmprID)){
                            foreach ($getEmprID as $empresa):
                            extract($empresa);?>

                            <!-- form start -->
                            <form class="form" method="post" enctype="multipart/form-data" id="empresa/editEmpr">
                                <div class="box-body">
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <div class="form-group margin-bottom">
                                            <label for="InputFile">Imagem ou Logomarca</label>
                                            <input type="file" class="form-control input-lg" name="image_emp"/>
                                            <p class="help-block">Atenção os dados com * são obrigatório o preenchimento.</p>
                                        </div>
                                        <div class="form-group">
                                            <!--  ID Empres-->
                                            <input type="hidden" class="form-control input-lg" name="id_emp" placeholder="Nome da Empresa" value="<?=$id_cliente_empresa?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nome do Contato (*)</p></label>
                                            <input type="text" class="form-control input-lg" name="nome_emp" placeholder="Nome da Empresa" value="<?=$nome_cliente_empresa?>"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control input-lg title_exist" name="title_exist" value="0">
                                            <label>Marca</p></label>
                                            <input type="text" class="form-control input-lg title_post" data-controller="empresa/postExist/" name="marca_emp" placeholder="Marca da Empresa" value="<?=$marca_cliente_empresa?>"/>
                                        </div>

                                        <div class="form-group">

                                            <label>E-mail</label>
                                            <input type="text" class="form-control input-lg" name="email_emp" placeholder="E-mail da Empresa" value="<?=$email_cliente_empresa?>"/>
                                        </div>


                                        <div class="form-group margin-bottom">
                                            <label>Site</label>
                                            <input type="text" class="form-control input-lg" name="link_emp" placeholder="http://" value="<?=$link_cliente_empresa?>"/>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Telefone</label>
                                                    <input type="text" class="form-control input-lg formPhone" name="telefone_emp" value="<?=$telefone_cliente_empresa?>"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label>Celular</label>
                                                    <input type="text" class="form-control input-lg formPhone" name="cel_emp" value="<?=$cel_cliente_empresa?>"/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box-footer">
                                            <button type="submit" value="Cadastrar"class="btn btn-success btn-lg"><i class="fa fa-pencil-square"></i>&nbsp;Atualizar</button>
                                            <a href="<?=BASEADMIN?>empresa/" class="btn btn-primary btn-lg pull-right">
                                                <span class="glyphicon glyphicon-share-alt"></span>&ensp;Voltar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <?php
                                endforeach;
                                }?>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Atualizando Empresas cadastradas.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
