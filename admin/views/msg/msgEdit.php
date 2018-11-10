<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-comments"></i>&nbsp;MENSAGENS
        <small> & REFLECÇÕES</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">ATUALIZAR</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>message"><i class="fa fa-list-ul"></i>Lista de Mensagens</a></li>
        <li><a href="<?= BASEADMIN ?>message/caddMsg"><i class="fa fa-comment"></i>Cadastrar</a></li>
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
                    <h2><i class="fa fa-sign-out"></i>&nbsp;<strong>Atualizar</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-10">
                        <div class="row">
                            <?php
                            if(!empty($getMsgID)){
                                foreach ($getMsgID as $msgID):
                                    extract($msgID)?>
                                    <form class="form" action="" method="post" enctype="multipart/form-data" id="message/upMsg">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-sm-10 pull-right margin-bottom">
                                                    <!--<label>id</label>-->
                                                    <input type="hidden" class="form-control input-lg" name="msg_id" value="<?=$id_mensagem?>"/>
                                                </div>
                                                <div class="col-sm-10 pull-right margin-bottom">
                                                    <input type="hidden" class="form-control input-lg title_exist" name="title_exist" value="0">
                                                    <label>Título</label>
                                                    <input type="text" class="form-control input-lg title_post" data-controller="message/postExist/" name="msg_title" value="<?=$titulo_mensagem?>"/>
                                                </div>
                                                <div class="col-sm-10 pull-right margin-bottom">
                                                    <label>Descrição</label>
                                                    <textarea class="form-control input-lg myTextBasic" name="msg_desc" rows="6"><?=$descricao_mensagem?></textarea>
                                                </div>
                                                <div class="col-sm-10 pull-right margin-bottom">
                                                    <label>Autor</label>
                                                    <input type="text" class="form-control input-lg" name="msg_autor" value="<?=$autor_mensagem?>"/>
                                                </div>
                                                <div class="col-sm-10 pull-right margin-bottom">
                                                    <label>Fonte:</label>
                                                    <input type="text" class="form-control input-lg" name="msg_fonte" value="<?=$fonte_mensagem?>"/>
                                                </div>
                                                <div class="box-footer clearfix">
                                                    <div class="form-group">
                                                        <div class="col-md-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-primary" value="Atualizar"><i class="fa fa-caret-right"></i>Atualizar Mensagens</button>
                                                        </div>
                                                    </div>
                                                    <a href="<?=BASEADMIN?>message/" class="btn btn-primary pull-right">
                                                        <span class="fa fa-mail-reply-all"></span>&ensp;Voltar
                                                    </a>
                                                </div>
                                            </div>
                                        </div><!-- /.FIM box-body -->
                                    </form>
                                <?php endforeach;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Atualizando mensagens cadastradas no sistema.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>

