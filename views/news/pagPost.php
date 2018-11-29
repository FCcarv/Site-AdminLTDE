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
                <!-- End main Content -->
                    <?php
                    endforeach;
                }?>
            </div>
            <div class="col-md-4">
            <aside class="six columns right-sidebar">

                <div class="sidebar-widget social">
                    <h2>O que acha?</h2>
                    <p>Textos relacionados com assunto do artigo</p>
                    <div class="featured-image img-wrapper">
                        <img src="<?=BASE?>assets/imagem/news/corrida1.jpeg" class="scale-with-grid thumb-link">
                    </div>
                    <p>Beef strip steak corned beef, shoulder short loin bresaola bacon filet mignon turkey pork chop
                        swine spare ribs shoulder jerky shankle pork belly ball tip leberkas pork chop biltong.
                        Andouille ball tip leberkas, shoulder pork loin chuck hamburger beef strip steak.</p>
                </div>


                <div class="recent-posts sidebar-widget six columns">
                    <h2>Artigo 2</h2>
                    <article class="six columns alpha">

                        <div class="two columns alpha">
                            <div class="featured-image img-wrapper">
                                <img src="<?=BASE?>assets/imagem/news/corrida1.jpeg" class="scale-with-grid thumb-link">
                            </div>
                        </div>

                        <div class="four columns omega">
                            <h4><a href="#">Titulo do artigo 2</a></h4>

                        </div>

                    </article>
                </div>

                <div class="sidebar-widget">
                    <h2>Citações de Motivação de Corrida</h2>
                    <blockquote class="testimonial no-after">
                        Icebrrrg is so pretty and easy to use it makes you feel like you can do anything.  Even fly.  Which for me, is huge!
                        <cite>A Daredevil Penguin</cite>
                    </blockquote>

                    <blockquote class="testimonial no-after">
                        Icebrrrg looked so smooth and tasty that I decided to lick it.  Of course, it was ice cold so my tongue got stuck to it!
                        <cite>Overeager Polar Bear</cite>
                    </blockquote>

                    <blockquote class="testimonial no-after">
                        80% of Iceberrrg's mass is beneath the surface. Super detailed grid.
                        <cite>Dr. Freeze</cite>
                    </blockquote>
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
