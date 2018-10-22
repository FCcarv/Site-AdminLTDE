<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        POSTAGENS
        <small> & Mídias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>post/add/"><i class="fa fa-dashboard"></i> Cadastrar</a></li>
        <li class="active">POST</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Área administrativa</h2>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(!empty($allPost)){
                            foreach ($allPost as $p):
                            $status = ((!$p['status_post']) ? 'Style="border-right: solid 2px #3c8dbc" ' : '');

                            ?>
                                <div class="col-md-5 crewell well-sm margin">
                                    <div class="attachment-block clearfix" <?=$status?>>
                                        <div class="col-sm-4 col-md-4 margin">
                                            <img class="img-responsive"  src="<?= BASE . 'tim.php?src=uploads/' . $p['cover_post'] . '&w=173&h=130'?>" alt="Photo">
                                        </div>
                                        <div class="attachment-pushed">
                                            <div class="attachment-text">
                                                <h3 class="attachment-heading"><a href="#"><?=$p['title_post']?></a></h3>
                                                <?=Check::Words($p['content_post'], 14) ?>
                                            </div></br>
                                            <div class="btn-group">
                                                <a href="<?= BASEADMIN?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                                <a href="<?= BASEADMIN ?>post/editPost/<?=$p['id_post']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="" class="btn btn-danger btn-xs del " data-controller="post/excluiPost/" id="<?=$p['id_post']?>" onclick="return confirm('Tem certeza que deseja excluir esta Postagem?')"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                            </div>
                                            <span class="pull-right text-muted"><h5><strong>Date:<?= date(" d/m/Y ", strtotime($p['date_post']))?></strong></h5></span>
                                            <!-- /.attachment-text -->
                                        </div>
                                    </div>
                                </div><!-- /.FIM col-md-6 -->
                            <? endforeach;
                        }else{

                            echo "<div class=\"alert alert-info alert-dismissible\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                <h4><i class=\"icon fa fa-info\"></i> Alert!</h4>
                                    Você não tem postagens inseridas nessa sistema!!
                              </div>";
                        }?>
                    </div> <!-- /.FIM col-md-12 -->
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
                </div>  <!-- /.row -->
            </div>  <!-- /.box-body -->
        </div>  <!-- /.box-header -->
    </div>  <!-- /.box -->
    <!-- fim Default box -->
</section>
<!-- /.content -->

