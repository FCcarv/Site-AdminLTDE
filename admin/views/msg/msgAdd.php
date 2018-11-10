<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-comments"></i>&nbsp;MENSAGENS
        <small> & REFLECÇÕES</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRAR</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>message"><i class="fa fa-list-ul"></i>Lista de Mensagens</a></li>
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
                    <h2><i class="fa fa-sign-out"></i>&nbsp;<strong>Cadastrar</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-10">
                        <div class="row">
                            <form class="form" action="" method="post" enctype="multipart/form-data" id="message/addMsg">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-10 pull-right margin-bottom">
                                            <label>Título</label>
                                            <input type="text" class="form-control input-lg" name="msg_title"  placeholder="Titulo da Mensagem" required/>
                                        </div>
                                        <div class="col-sm-10 pull-right margin-bottom">
                                            <label>Descrição</label>
                                            <textarea class="form-control input-lg myTextBasic" name="msg_desc" rows="6" placeholder="Enter conteudo"></textarea>
                                        </div>
                                        <div class="col-sm-10 pull-right margin-bottom">
                                            <label>Autor</label>
                                            <input type="text" class="form-control input-lg" name="msg_autor" placeholder="Autor da Mensagem" required/>
                                        </div>
                                        <div class="col-sm-10 pull-right margin-bottom">
                                            <label>Fonte:</label>
                                            <input type="text" class="form-control input-lg" name="msg_fonte" placeholder="Fonte da Mensagem" required/>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <div class="form-group">
                                                <div class="col-md-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" value="cadastraVideo"><i class="fa fa-caret-right"></i>Cadastrar Mensagens</button>
                                                </div>
                                            </div>
                                            <a href="<?=BASEADMIN?>message/" class="btn btn-primary pull-right">
                                                <span class="fa fa-mail-reply-all"></span>&ensp;Voltar
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
                    Cadastrar mensagens no sistema.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>

