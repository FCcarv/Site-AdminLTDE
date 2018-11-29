<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-globe"></i>&nbsp;POSTAGENS
        <small> & Mídias</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">ARTIGOS</li>
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>post/add/"><i class="fa fa-compress"></i> Cadastrar Artigos</a></li>
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
                    <h2><i class="fa fa-list-ul"></i>&nbsp;<strong>Artigos</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <div class="box-body">
                                <div class="col-md-offset-1 col-md-11">
                                    <div class="row">
                                        <?php
                                        if(!empty($allPost)){
                                            foreach ($allPost as $p):
                                                $pub ="Publicado"; $Ped ="Rascunho";
                                                $status = (($p['status_post'] == 0) ?  $Ped  : $pub );
                                                ?>
                                                <div class="col-md-5 crewell well-sm margin">
                                                    <div class="attachment-block clearfix">
                                                        <div class="col-sm-5 margin">
                                                            <img class="img-responsive"  src="<?= BASE . 'tim.php?src=uploads/' . $p['cover_post'] . '&w=173&h=130'?>" alt="Photo-<?=$p['slug_post']?>">
                                                            <span class="pull-left product-description"><h5>Registro: <?= date(" d/m/Y ", strtotime($p['date_post']))?></h5></span>
                                                            <span class="pull-left product-description"><h5>Autor(a): <?=$p['autor_post']?></h5></span>
                                                        </div>
                                                        <div class="col-md-offset-1 product-info">
                                        <span class="pull-right">
                                                 <div class="btn-group"  style="margin-top=-40px">
                                                    <a href="<?= BASEADMIN?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                                    <a href="<?= BASEADMIN ?>post/editPost/<?=$p['id_post']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-xs del " data-controller="post/excluiPost/" id="<?=$p['id_post']?>" onclick="return confirm('Tem certeza que deseja excluir esta Postagem?')"><i class="glyphicon glyphicon-ban-circle"></i></a></br>
                                                </div>
                                            </span>
                                                            <a href="javascript:void(0)" class="product-title"><h4><b><?=$p['title_post']?></b></h4></a><br>
                                                            <p><?=Check::Words($p['content_post'], 14) ?></p>
                                                            <a href="javascript:void(0)" class="product-title"><i class="fa fa-check"><b><?=$status?></b></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <? endforeach;
                                        }else{

                                            echo "<div class=\"alert alert-info alert-dismissible\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                <h4><i class=\"icon fa fa-info\"></i> Alert!</h4>
                                    Você não tem postagens inseridas nessa sistema!!
                              </div>";
                                        }?>

                                    </div>
                                </div>
                                <!-- PAGINAÇÃO-->
                                <div class="row text-center"><!-- /.row -->
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <?php for ($q=1;$q<=$pags;$q++):?>
                                                <?php if($paginaAtual == $q){ ?>
                                                    <li class="paginate_button active">
                                                        <a href="<?=BASEADMIN?>post/?p=<?=$q;?>" aria-controls="example2" data-dt-idx="0" tabindex="0"><?=$q;?></a>
                                                    </li>
                                                <?php }else{?>
                                                    <li class="paginate_button ">
                                                        <a href="<?=BASEADMIN?>post/?p=<?=$q;?>" aria-controls="example2" data-dt-idx="0" tabindex="0"><?=$q;?></a>
                                                    </li>
                                                <?php }
                                            endfor;
                                            if($paginaAtual == $q){}

                                            ?>
                                        </ul>
                                    </div>
                                </div><!-- /.fim paginação -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Artigos cadastrados no sistema!!
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>




