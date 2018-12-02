<!-- Main content -->
<section class="content">
    <div class="row">
        </br>
        </br>
        </br>
        </br>
        </br>
        <div class="col-md-12">
            <div class="col-md-8">
                <?php
                if(!empty($Artigos)){
                    foreach($Artigos as $art):
                        extract($art)?>
                <article class="ten columns main-content">
                    <h1><?=$title_post?></h1>
                    <img class="img-responsive scale-with-grid"  src="<?= BASE . 'tim.php?src=uploads/' . $cover_post . '&w=940&h=625'?>" alt="Photo-<?=$slug_post?>">
                    </br>
                    </br>
                    <h3><?=$subtitle_post?></h3>
                    <?=$content_post?>
                </article>
                    <?php
                    endforeach;
                }?>
                <!-- End main Content -->
                <div class=" box-header with-border">

                </div>
                <div class="box-body">
                    <div class="col-md-11">
                        <div class="row">
                            <?php
                            if(!empty($GalleryPosts)){?>
                               <h2><i class="fa fa-file-photo-o"></i>
                                    Galeria
                                </h2>
                            <?php
                            foreach($GalleryPosts as $gall):
                            extract($gall)?>
                            <div class="col-sm-3 well well-sm margin">
                                <a title="'Image-<?= $id_gallery ?>'" href="<?= BASE . 'uploads/' . $image_gallery?>" alt="'Post-Foto-gallery-'<?= $id_gallery ?>" rel="shadowbox[vocation]">
                                    <img title="'Image-'<?= $id_gallery ?>"class="img-responsive"
                                         src="<?= BASE . 'tim.php?src=uploads/' . $image_gallery . '&w=940&h=625' ?>" alt="'Post-Foto-gallery-'<?= $id_gallery ?>">
                                </a>
                            </div>
                            <?php
                            endforeach;
                            }?>
                        </div>
                   </div>
                     <!-- /.box-footer -->
                </div>

            </div>
            <div class="col-md-4">
            <aside class="six columns right-sidebar">
                <?php
                if(!empty($postsDest)){
                foreach($postsDest as $dest):
                extract($dest)?>
                <div class="sidebar-widget social sider-post">
                    <h3><?=$title_post?></h3>
                    <p><?=Check::Words($subtitle_post, 30) ?></p>
                    <div class="featured-image img-wrapper">
                       <img class="img-responsive scale-with-grid"  src="<?= BASE . 'tim.php?src=uploads/' . $cover_post . '&w=270&h=180'?>" alt="Photo-<?=$slug_post?>">
                    </div>
                    <div class="featured-text">
                        <?=Check::Words($content_post, 25) ?>
                        <a class="" href="<?=$id_post?>"><b>Veja mais ...</b></a>
                    </div>
                    </br>

                </div>
                <?php
                endforeach;
                }?>
                <div class="sidebar-widget">
                    <h3 class="sider-post .featured-text">Citações de Motivação de Corrida</h3>
                    <?php
                    if(!empty($msgPost)){
                    foreach($msgPost as $ms):
                    extract($ms)?>
                    <blockquote class="testimonial no-after">
                       <strong><?=$titulo_mensagem?></strong></br>
                        <?=Check::Words($descricao_mensagem, 50)?></br></br>
                        <cite><?=$autor_mensagem?></cite><p class="pull-right"><?=$fonte_mensagem?></p>
                    </blockquote>
                    <?php
                    endforeach;
                    }?>
                </div>
            </aside>
            <!-- End Right Sidebar -->
             </div>
        </div>
        <!-- /.box -->
    </div><!-- /.col-md-12 -->
    </div>
</section>
<!-- /.content-->
