<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-comments"></i>&nbsp;MENSAGENS
        <small> & REFLECÇÕES</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">MENSAGENS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <div class="col-md-offset-2 box-header with-border">
                    <h2><i class="fa fa-list-ul"></i>&nbsp;<strong>Mensagens</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <?php if(!empty($getAllMsg)){
                            foreach ($getAllMsg as $msg):
                            extract($msg);?>
                            <div class="col-md-offset-1 col-md-9">
                                <div class="box box-default box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title"><strong><?=$titulo_mensagem?></strong></h3>
                                        <div class="btn-group pull-right">
                                            <a href="http://localhost/Portal-News/admin/home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                            <a href="<?=BASEADMIN?>message/editMsg/<?=$id_mensagem?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-xs del " data-controller="message/ExcluiMsg/" id="<?=$id_mensagem?>" onclick="return confirm('Tem certeza que deseja excluir essa Mensagem?')"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <p>
                                            <?=$descricao_mensagem?>
                                        </p>
                                        <ul class="nav nav-stacked">
                                            <li>
                                                <span class="pull-left product-description margin-bottom">Autor: <?=$autor_mensagem?></span><br>
                                                <span class="pull-right product-description" style="margin-top: 25px"><i>Fonte: <?=$fonte_mensagem?></i></span>
                                                <span class="pull-left" style="margin-top: 15px;"><h5>Data: <?=date('d/m/Y', strtotime($data_mensagem))?></h5></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.box-body -->
                                </div><!-- /.box COLOR -->
                            </div>
                            <?php endforeach;
                            }?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Listando mensagens cadastradas no sistema.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
