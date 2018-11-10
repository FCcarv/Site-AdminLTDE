<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-newspaper-o"></i>&nbsp;JORNAL OPINIÃO REGIONAL
        <small> & Edições</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">LISTA DAS EDIÇÕES</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>jornal/"><i class="fa fa-list-ul"></i>Listas de Edições</a></li>
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
                    <h2><i class="fa fa-sign-out"></i>&nbsp;<strong>Cadastrar</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-9">
                        <div class="row">
                            <form class="form" action="" method="post" enctype="multipart/form-data" id="jornal/addJornal">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-offset-2 col-sm-10 pull-right margin-bottom">
                                            <label>Título</label>
                                            <input type="text" class="form-control input-lg" name="jorn_title" id="inputName" placeholder="Titulo do arquivo" required/>
                                        </div>
                                        <div class="col-sm-offset-2 col-sm-10 pull-right margin-bottom">
                                            <label>URL - Google-Drive:</label>
                                            <input type="text" class="form-control input-lg" name="jorn_url" id="inputName" placeholder="Copie e Cole a URL do Google-Drive" required/>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" value="cadastraVideo"><i class="fa  fa-plus"></i>&nbsp;Cadastrar Jornal</button>
                                                </div>
                                            </div>
                                            <a href="<?=BASEADMIN?>jornal/" class="btn btn-primary pull-right">
                                                <i class="fa fa-mail-reply-all"></i><span class=""></span>&ensp;Voltar
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- /.FIM box-body -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                   Cadastrar edições do Jornal Regional
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
