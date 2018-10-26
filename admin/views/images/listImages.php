<section class="content-header">
    <h1>
        Galeria Fotos
        <small>Fotos Selecionar</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">LISTA DE GALERIAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>galImages/"><i class="fa fa-sign-out"></i>Galerias</a></li>
        <li><a href="<?=BASEADMIN?>images/addFotosG/"><i class="fa fa-sign-out"></i>Cadastrar Imagens</a></li>
    </ol>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border margin-bottom">
                <h2 class="box-title">Área administrativa</h2><?php //var_dump( $viewData);die;?>
            </div>
            <div class="col-md-offset-1 box-header with-border margin-bottom">
                <h3 class="box-title"><strong><i class="fa fa-list-ul margin-r-5"></i>Galeria
                        <?php
                        if(!empty($getGAL)){
                            foreach($getGAL as $gl):?>
                                <?=$gl['title_fto_albuns']?>
                            <?php
                            endforeach;
                        }
                        ?></strong></h3>
                <a href="<?=BASEADMIN?>/galImages/" class="col-md-offset-9 btn btn-default">
                    <span class="glyphicon glyphicon-share-alt"></span>&ensp;Voltar
                </a>
            </div>
            <div class="row margin">
                <div class="col-md-offset-1 col-md-11">
                    <?php
                    if(!empty($getImage)) {

                    foreach ($getImage as $img) :
                    extract($img);
                    ?>
                    <div class="col-sm-2 well well-sm margin">
                        <a title="'Foto-album-'" href="">
                            <img title="'Foto-album-'<?= $id_fto_albuns ?>" id="<?= $id_foto ?>"
                                 class="img-responsive removeFt"
                                 src="<?= BASE . 'tim.php?src=uploads/' . $cover_foto . '&w=180&h=120' ?>"
                                 data-ctr="images/delFotosG" alt="'Foto-album-'<?= $id_fto_albuns ?>">
                        </a>
                    </div>
                    <?php
                    endforeach;

                    } else {

                    echo "<div class=\"alert alert-info alert-dismissible\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                            <h4><i class=\"icon fa fa-info\"></i> Alert!</h4>
                            <h3>Não há imagens cadastradas nessa galeria</h3><br>
                            <a href=\"<?=BASEADMIN?>images/addFotosG/\">
                                <i class=\"fa fa-link\"></i>Cadastre Imagens
                            </a>
                        </div>";
                }
                    ?>
                </div>
            </div>

            <!--PAGINAÇÃO -->
            <div class="row text-center"><!-- /.row -->
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    <ul class="pagination">

                        <?php
                      $buscIDfto  = ( !empty($buscIDfto['id_fto_albuns'])) ?  $buscIDfto['id_fto_albuns'] :  $getGAL[0]['id_fto_albuns'];
                        if ($buscIDfto !== null && ($getGAL[0]['id_fto_albuns'] == $buscIDfto)){
                            for ($i = 1; $i <= $pgs; $i++):?>

                                <?php if ($pagAtual == $i) {
                                    ?>

                                    <li class="paginate_button active">
                                        <a href="<?= BASEADMIN ?>images/editFotosG/<?= $getGAL[0]['id_fto_albuns'] ?>/?p=<?= $i; ?>"
                                           aria-controls="example2" data-dt-idx="0" tabindex="0"><?= $i; ?></a>
                                    </li>
                                <?php } else { ?>
                                    <li class="paginate_button ">
                                        <a href="<?= BASEADMIN ?>images/editFotosG/<?= $getGAL[0]['id_fto_albuns'] ?>/?p=<?= $i; ?>"
                                           aria-controls="example2" data-dt-idx="0" tabindex="0"><?= $i; ?></a>
                                    </li>

                                <?php }

                            endfor;
                        }else{
                             $buscIDfto = 0;
                        }

                        ?>
                    </ul>
                </div>
            </div><!-- /.fim paginação -->
        </div><!-- Fim col-md-9 -->
    </div><!-- Fim col-md-9 -->
</section>
