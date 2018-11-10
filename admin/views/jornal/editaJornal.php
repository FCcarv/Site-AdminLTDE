<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-newspaper-o"></i>&nbsp;JORNAL OPINIÃO REGIONAL
        <small> & Edições</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">ATUALIZAR EDIÇÕES</li>
        <li><a href="<?=BASEADMIN?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>jornal/"><i class="fa fa-list-ul"></i>Listas de Edições</a></li>
        <li><a href="<?=BASEADMIN?>jornal/caddJornal"><i class="fa fa-sign-out"></i>Cadastrar Edições</a></li>
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
                    <div class="col-md-offset-1 col-md-9">
                        <div class="row">
                            <form class="form" action="" method="post" enctype="multipart/form-data" id="jornal/upJornal">
                                <div class="box-body">
                                    <div class="row">
                                        <?php
                                        if(!empty($setJornalID)){
                                            foreach ($setJornalID as $SetJr):
                                                extract($SetJr);?>
                                                <div class="col-sm-offset-2 col-sm-10 pull-right margin-bottom">
                                                    <input type="hidden" class="form-control input-lg" name="jorn_id" value="<?=$id_jornal?>"/>
                                                </div>
                                                <div class="col-sm-offset-2 col-sm-10 pull-right margin-bottom">
                                                    <input type="hidden" class="form-control input-lg title_exist" name="title_exist" value="0">
                                                    <label>Título</label>
                                                    <input type="text" class="form-control input-lg title_post" data-controller="jornal/postExist/" name="jorn_title" value="<?=$titulo_jornal?>"/>
                                                </div>
                                                <div class="col-sm-offset-2 col-sm-10 pull-right margin-bottom">
                                                    <label>URL - Google-Drive:</label>
                                                    <input type="text" class="form-control input-lg" name="jorn_url" value="<?=$link_jornal?>"/>
                                                </div>
                                            <?php
                                            endforeach;
                                        } ?>
                                        <div class="box-footer clearfix">
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" value="Atualizar"><i class="fa fa-pencil-square-o"></i>Atualizar Jornal</button>
                                                </div>
                                            </div>
                                            <a href="<?=BASEADMIN?>gallery/" class="btn btn-primary pull-right">
                                                <span class="fa-mail-reply-all"></span>&ensp;Voltar
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
                    Atualizações de jornais salvos no sistema.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
<!-- /.content -->