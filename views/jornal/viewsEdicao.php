<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            </br>
            </br>
            </br>
            </br>
            </br>
                   <div class="col-md-offset-1 box-header with-border">
                    <h2><i class="fa fa-newspaper-o"></i>&nbsp;<strong>Edições do Jornal em PDF </strong></h2></br>
                    <p class="text-muted">
                        Se quiser fique a vontade e faça o download da edição de sua escolha.</br>
                        Ou apenas leia, basta clicar na imagem.</p>
                    </p>
                </div>
            </br>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <?php
                            if(!empty($allJornal)){
                                foreach($allJornal as $jornal):
                                    extract($jornal)?>
                                    <div class="col-sm-2 well well-sm margin">
                                        <a target="_blank" href="<?=$link_jornal?>" id="embedURL"class="name  text-center link-black">
                                            <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/OpRegional1.png" title="<?=$titulo_jornal?>"  target="_blank" alt="<?=$titulo_jornal?>">
                                            <h5><i class="glyphicon glyphicon-save">&nbsp;</i><?=$titulo_jornal?></h5>
                                        </a>
                                    </div>
                                <?php
                                endforeach;
                            }?>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
<!-- /.content -->