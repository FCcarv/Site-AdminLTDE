<section class="content-header">
    <h1>
        Galeria Fotos
        <small>Fotos Selecionar</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">LISTA DE GALERIAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>galImages/galFtadd/"><i class="fa fa-sign-out"></i>Cadastrar Galerias</a></li>
     </ol>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border margin-bottom">
                <h2 class="box-title">Área administrativa</h2>
            </div>
            <div class="col-md-offset-1 box-header with-border">
                <h3 class="box-title"><i class="fa fa-list-ul"></i><strong> Galerias</strong></h3>
                <a href="<?=BASEADMIN?>images/addFotosG/" class="mailbox-attachment-name col-md-offset-9">
                    <i class="glyphicon glyphicon-picture"></i> Cadastrar Imgens</a>
            </div>
            <div class="row margin">
                <div class="col-md-offset-1 col-md-11">
                    <?php
                    if(!empty($listGalFt)){
                        foreach ($listGalFt as $gl):
                            extract($gl);
                            $pub =" Publicado ";
                            $Ped =" Rascunho ";
                            $statusGallery = ((!$status_fto_albuns) ? $Ped  : $pub );
                        ?>

                            <div class="col-sm-2 well well-sm margin">
                                <img class="img-responsive" src="<?= BASE . 'tim.php?src=uploads/' . $cover_fto_albuns . '&w=180&h=120'?>" alt="'Img' <?=$title_fto_albuns?> ">
                                <a href="<?= BASEADMIN ?>images/editFotosG/<?=$id_fto_albuns?>" class="name  text-center"><h4><?=$title_fto_albuns?></h4></a>
                                <p class="text-center">Data: <?=date('d/m/Y', strtotime($date_fto_albuns))?></p>
                                <div class="btn-group mtest-bt">
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                    <a href="<?= BASEADMIN ?>galImages/galFtEdit/<?=$id_fto_albuns?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-xs del " data-controller="galImages/galFtDel/"
                                       id="<?=$id_fto_albuns?>" onclick="return confirm('Tem certeza que deseja excluir este Álbum de Fotos?')">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <a href="javascript:void(0)" class="product-title"><h5><i class="fa fa-check"></i><b><?=$statusGallery?></b></h5></a></h5>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    }?>
                </div>
            </div>
        </div><!-- Fim col-md-9 -->
</section>