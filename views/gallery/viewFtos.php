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
            <div class="box">
                <div class="col-md-offset-1 box-header with-border">
                    <h2 class="box-title"><i class="fa fa-file-photo-o"></i>&nbsp;<?=$gallSlug[0]['title_fto_albuns']?></h2>
                </div>
                </br>
                </br>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <?php
                            if(!empty($FtsGallery)) {
                                foreach ($FtsGallery as $ft) :
                                    extract($ft);
                                    ?>
                                    <div class="col-sm-2 well well-sm margin">
                                        <a title="'Foto-<?= $id_foto ?>'" href="<?= BASE . 'uploads/' . $cover_foto?>" alt="'Foto-album-'<?= $id_fto_albuns ?>" rel="shadowbox[vocation]">
                                            <img title="'Foto-album-'<?= $id_fto_albuns ?>"class="img-responsive removeFt"
                                                 src="<?= BASE . 'tim.php?src=uploads/' . $cover_foto . '&w=180&h=120' ?>" alt="'Foto-album-'<?= $id_fto_albuns ?>">
                                        </a>
                                    </div>
                           <?php endforeach;
                            } else {
                                echo "<div class=\"alert alert-info alert-dismissible\">
                                   <h4><i class=\"icon fa fa-info\"></i> Alert!</h4>
                                    <h3>Não há imagens cadastradas nessa galeria</h3><br>
                                </div>";
                            }?>
                        </div>
                    </div><!-- /.fim box body -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div><!-- /.col-md-12 -->
    </div>
</section>

