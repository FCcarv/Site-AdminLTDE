<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-newspaper-o"></i>&nbsp;JORNAL OPINIÃO REGIONAL
        <small> & Edições</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">LISTA DAS EDIÇÕES</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>jornal/caddJornal"><i class="fa fa-map-o"></i>Cadastrar Edições</a></li>
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
                    <h2><i class="fa fa-list-ul"></i>&nbsp;<strong>Exemplares do Jornal em PDF </strong></h2>
                    <p class="text-muted">
                        Se quiser fique a vontade e faça o download da edição de sua escolha.</br>
                        Ou apenas leia, basta clicar na imagem.</p>
                    </p>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <?php
                            if(!empty($getJornal)){
                                foreach($getJornal as $jorn):
                                    extract($jorn)?>
                                    <div class="col-sm-2 well well-sm margin">
                                          <span class=" pull-right margin-bottom">
                                           <div class="btn-group">
                                                <a href="http://localhost/Portal-News/admin/home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                                <a href="<?= BASEADMIN ?>jornal/editJornal/<?=$id_jornal?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="" class="btn btn-danger btn-xs del " data-controller="jornal/excluiJornal" id="<?=$id_jornal?>" onclick="return confirm('Tem certeza que deseja excluir esta Postagem?')"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                            </div>
                                        </span>
                                        <a href="<?=$link_jornal?>" id="embedURL"class="name  text-center link-black">
                                            <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/OpRegional1.png" title="<?=$titulo_jornal?>"  target="_blank" alt="<?=$titulo_jornal?>">
                                            <h4><i class="glyphicon glyphicon-save">&nbsp;</i><?=$titulo_jornal?></h4>
                                        </a>

                                    </div>

                                <?php
                                endforeach;
                            }?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Jornal Regional conheça!!
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
<!-- /.content -->