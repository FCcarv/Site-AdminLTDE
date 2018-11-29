<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa  fa-youtube-play"></i>&nbsp;Galeria de Vídeos
        <small>& All Videos</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">LISTAGEM DOS VÍDEOS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>gallery/"><i class="fa fa-file-video-o"></i>Listar</a></li>
        <li><a href="<?= BASEADMIN ?>gallery/addGalVid"><i class="fa fa-film"></i>Cadastrar</a></li>
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
                    <h2><i class="fa fa-list-ul"></i>&nbsp;<strong>Vídeos</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <?php
                            if(!empty($getVideos)){
                                foreach ($getVideos as $g):
                                    $pub ="Publicado";
                                    $Ped ="Rascunho";
                                    $statusvideo = (($g['status_video'] == 0) ?  $Ped  : $pub );

                                    ?>
                                    <div class="well well-sm col-sm-offset-2 col-sm-8">
                                        <a class="alert-link" href="#">
                                            <div class="attachment-block margin"><!-- Attachment 03-->
                                                <img class="attachment-img" src="<?=$g['thumb_video'];?>" width="170" height="120" alt="Photo">
                                                <div class="attachment-pushed">
                                                    <h5 class="attachment-heading"><a href="<?= BASEADMIN ?>gallery/editGalVid/<?=$g['id_video']?>"><?=  $g['titulo_video'];?></a></h5>
                                                    <div class="attachment-text" style="padding-bottom:-20px;">
                                                        <h5><?=$g['descricao_video'];?></h5></br>
                                                        <a href="" class="col-sm-8 del " data-controller="gallery/delGalVid/" id="<?=$g['id_video']?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                                                            <h5 class="box-title"><i class="fa fa-trash"> <b>Excluir o video</b></i></h5>
                                                        </a>
                                                    </div>
                                                    <div class="checkbox pull-right">
                                                        <a class="col-sm-8" style="margin-bottom:-10px;" href="<?= BASEADMIN ?>gallery/checkGalVid/<?=$g['id_video']?>" onclick="return confirm('Deseja Publicar esse video?')">
                                                            <h5 class="box-title"><i class="fa fa-check"><b><?=$statusvideo?></b></i></h5>
                                                        </a>
                                                    </div>
                                                </div><!-- /.attachment-pushed     <div class="col-sm-10 text-center"></div>-->
                                            </div>
                                        </a>
                                    </div>
                                    <!-- /.col -->
                                <? endforeach;
                            }else{

                                echo "<div class=\"alert alert-info alert-dismissible\">
                                       <h4><i class=\"icon fa fa-info\"></i>Opss!!</h4>
                                    Você não tem postagens inseridas nessa sistema!!
                              </div>";
                            }?>
                            <!--/////////////////////////////  FIM COLUNA DIREITA \\\\\\\\\\\\\\\\\\\\\\\\\\\-->
                        </div>
                        <!-- /.row -->
                        <!--PAGINAÇÃO -->
                        <div class="row text-center"><!-- /.row -->
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <ul class="pagination">
                                    <?php for ($i=1;$i<=$pgs;$i++):?>
                                        <?php if($pagAtual == $i){ ?>
                                            <li class="paginate_button active">
                                                <a href="<?=BASEADMIN?>gallery/?p=<?=$i;?>" aria-controls="example2" data-dt-idx="0" tabindex="0"><?=$i;?></a>
                                            </li>
                                        <?php }else{?>
                                            <li class="paginate_button ">
                                                <a href="<?=BASEADMIN?>gallery/?p=<?=$i;?>" aria-controls="example2" data-dt-idx="0" tabindex="0"><?=$i;?></a>
                                            </li>
                                            <?php
                                        }
                                    endfor;?>
                                </ul>
                            </div>
                        </div><!-- /.fim paginação -->
                        </div>
                    </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Vídeos cadastrados no sistema.
                </div>
                <!-- /.box-footer-->
                </div>
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
