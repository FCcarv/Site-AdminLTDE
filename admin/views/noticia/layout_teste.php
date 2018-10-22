<!-- /.LAYOUT 1-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        POSTAGENS
        <small> & Mídias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">POTS</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">

        <div class="box-header with-border">
            <h2 class="box-title">Área administrativa</h2>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="attachment-block clearfix">
                            <div class="col-sm-4 col-md-4">
                                <img class="img-responsive"  src="../assets/img/photo2.png" alt="Photo">                                    </div>

                            <div class="attachment-pushed">
                                <h3 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h3><br><br>
                                <div class="btn-group">

                                    <a href="<?= BASEADMIN ?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                    <a href="<?= BASEADMIN ?>category/subCat/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="<?= BASEADMIN ?>category/delSub/" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                </div>
                                <span class="pull-right text-muted"><h5><strong>Date: 2/10/2014</strong></h5></span>
                                <!-- /.attachment-text -->
                            </div>
                        </div>
                    </div><!-- /.FIM col-md-6 -->
                </div> <!-- /.FIM col-md-12 -->
                <!-- /LISTA DE POSTS-->

                <div class="row text-center"><!-- /.row -->
                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="example2_previous">
                                <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Primeira</a>
                            </li>
                            <li class="paginate_button active">
                                <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a>
                            </li>
                            <li class="paginate_button ">
                                <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a>
                            </li>
                            <li class="paginate_button next" id="example2_next">
                                <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Última</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.row -->
            </div>  <!-- /.box-body -->


</section>


<!-- /.LAYOUT 2-->


<div class="row">
    <div class="col-md-12">
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Cadastrar Posts
                    </h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-10">
                        <div class="nav-tabs-custom ">
                            <div class="tab-pane">
                                <form class="form" method="post" id="category/addCat">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="capa">Enviar Capa</label>
                                            <input type="file" id="capa"name="capa_post">
                                        </div>
                                        <div class="form-group">
                                            <label for="nome">Titulo</label>
                                            <input type="text" class="form-control input-lg"  name="title_post" placeholder="Enter titulo">
                                        </div>
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control input-lg js_editor" name="content_post" rows="10" placeholder="Enter conteudo"></textarea>
                                        </div></br>
                                        <div class="row">
                                            <div class="form-group col-xs-6">
                                                <label>Categoria</label>
                                                <select class="form-control input-lg" name="parent_post">
                                                    <option value="">Esta Categoria é uma seção</option>

                                                </select>
                                            </div>

                                            <div class="form-group col-xs-6">
                                                <label>Author</label>
                                                <input type="text" class="form-control input-lg" placeholder="Author">
                                            </div>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="gall">Galeria</label>
                                            <input type="file" name="gall_post[]" id="gallary">
                                        </div></br>

                                        <div class="col-sm-4 col-md-2">
                                            <span class="col-sm-1-offset-1"><img class="img-responsive"  src="../../assets/img/photo2.png" alt="Photo"></span><br>

                                        </div>
                                        <div class="col-sm-4 col-md-2">
                                            <span class="col-sm-1-offset-1"><img class="img-responsive"  src="../../assets/img/photo2.png" alt="Photo"></span><br>

                                        </div>
                                        <div class="col-sm-4 col-md-2">
                                            <span class="col-sm-1-offset-1"><img class="img-responsive"  src="../../assets/img/photo2.png" alt="Photo"></span><br>

                                        </div>
                                        <div class="col-sm-4 col-md-2">
                                            <span class="col-sm-1-offset-1"><img class="img-responsive"  src="../../assets/img/photo2.png" alt="Photo"></span><br>

                                        </div>  <div class="col-sm-4 col-md-2">
                                            <span class="col-sm-1-offset-1"><img class="img-responsive"  src="../../assets/img/photo2.png" alt="Photo"></span><br>

                                        </div>
                                        <div class="col-sm-4 col-md-2">
                                            <span class="col-sm-1-offset-1"><img class="img-responsive"  src="../../assets/img/photo2.png" alt="Photo"></span><br>

                                        </div>
                                        <div class="col-sm-4 col-md-2">
                                            <span class="col-sm-1-offset-1"><img class="img-responsive"  src="../../assets/img/photo2.png" alt="Photo"></span><br>

                                        </div>
                                        <div class="col-sm-4 col-md-2">
                                            <span class="col-sm-1-offset-1"><img class="img-responsive"  src="../../assets/img/photo2.png" alt="Photo"></span><br>

                                        </div>
                                        <!-- /.box-body -->

                                        <div class="box-footer clearfix">
                                            <div class="col-xs-12">
                                                <button value="CadPosts" class="btn btn-primary btn-lg pull-right"><i class="fa "></i> Cadastrar Posts</button>
                                                <button value="Cad_post" class="btn btn-primary btn-lg pull-right"><i class="fa "></i> Cadastrar </button>
                                                <a href="<?= BASEADMIN ?>home" type="button" class="btn btn-primary btn-lg pull-right"
                                                   style="margin-right: 5px;"> <i class="fa-check-square"></i> voltar</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                    <!-- /.col -->
                </div>
        </section>
    </div>
</div>
<!----home ->


<!-- Content Header (Page header) -->
<section class="content-header">

    <div class="box box-default">
        <div class="box-header with-border">
            <i class="fa fa-globe"></i>
            <h3 class="box-title">Controllers</h3></br></br>
        </div>
        <div class="btn-group">
            <div class="btn-group">
                <a href="<?= BASEADMIN ?>home/" class="btn btn-bg btn-primary btn-flat"><i class="fa fa-institution"></i> Home</a>
                <button type="button" class="btn btn-bg btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-signal"></i> Categorias
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="<?= BASEADMIN ?>category/add/">Cadastrar Categoria</a></li>
                    <li><a href="<?= BASEADMIN ?>category/teste">Cadastrar Sub-Categoria</a></li>
                    <li><a href="<?= BASEADMIN ?>category/">Listar Categoria e Sub-Categorias</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-bg btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-external-link"></i> Posts
                    <span class="caret"></span></button>
                </br>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="<?= BASEADMIN ?>post/add/"> Cadastrar</a></li>
                    <li><a href="<?= BASEADMIN ?>post/">Listar/Editar</a></li>
                </ul>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-bg btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-building-o"></i> Empresas
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Cadastrar</a></li>
                    <li><a href="#">Listar/Editar</a></li>
                </ul>
            </div>
        </div><!--->
    </div>
</section>
<!-- Main content -->
<section class="content">
    <!-- COLOR PALETTE -->
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Estatísticas de Acesso</h3>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>

                        <p>Page Views</p>
                    </div>
                    <div class="icon">
                        <i class="ion icheckbox_square-blue"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais nformações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>Posts</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais nformações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>Usuários</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais nformações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Visitas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Mais nformações <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- START ALERTS AND CALLOUTS -->
    <h2 class="page-header">
        <i class="fa fa-newspaper-o"></i>
        Nossos Editores </h2>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-futbol-o"></i>

                    <h3 class="box-title">Esportes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="../assets/img/user6-128x128.jpg" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Shared publicly - 7:30 PM Today</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at</p>
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->

                    <!-- Social sharing buttons -->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-clone"></i>

                    <h3 class="box-title">Entreterimento</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="../assets/img/user6-128x128.jpg" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Shared publicly - 7:30 PM Today</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at</p>
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->

                    <!-- Social sharing buttons -->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-film"></i>

                    <h3 class="box-title">Cultura</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="../assets/img/user6-128x128.jpg" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Shared publicly - 7:30 PM Today</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at</p>
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->

                    <!-- Social sharing buttons -->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-keyboard-o"></i>

                    <h3 class="box-title">Bem-estar</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="../assets/img/user6-128x128.jpg" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Shared publicly - 7:30 PM Today</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at</p>
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->

                    <!-- Social sharing buttons -->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->


    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-cube"></i>

                    <h3 class="box-title">Comportamento</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="../assets/img/user6-128x128.jpg" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Shared publicly - 7:30 PM Today</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at</p>
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->

                    <!-- Social sharing buttons -->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-child"></i>

                    <h3 class="box-title">Social</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="../assets/img/user6-128x128.jpg" alt="User Image">
                        <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                        <span class="description">Shared publicly - 7:30 PM Today</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at</p>
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->

                    <!-- Social sharing buttons -->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- START ALERTS AND CALLOUTS -->
    <h2 class="page-header">
        <i class="glyphicon glyphicon-tags"> Áreas</i>
    </h2>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <i class="fa-2x fa fa-comments"></i>
                    <h3 class="box-title">Mensagens</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <div class="box box-default">
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            >>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="box-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                        labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            >>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="box-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                        labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel box box-primary">
                                <div class="box-header with-border">
                                    <h4 class="box-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            >>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="box-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                                        wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                        eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                                        assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                                        nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                        farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                                        labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="glyphicon glyphicon-tasks"></i>
                    <h3 class="box-title">Navegadores</h3>
                    <table class="table table-striped">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th style="width: 40px"></th>
                        </tr>
                        <tr>
                            <td><i class="fa-2x fa fa-chrome"> Chrome</i></td>
                            <td>  <strong>174 visitas</strong></td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar progress-bar-success"
                                         style="width: 90%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-green">90%</span></td>
                        </tr>
                        <tr>
                            <th style="width: 10px"></th>
                            <th style="width: 10px"></th>
                            <th style="width: 10px"></th>
                        </tr>
                        <tr>
                            <td><i class="fa-2x fa fa-firefox"> Firefox</i></td>
                            <td>  <strong>154 visitas</strong></td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar progress-bar-warning"
                                         style="width: 90%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-yellow">60%</span></td>
                        </tr>
                        <tr>
                            <th style="width: 10px"></th>
                            <th style="width: 10px"></th>
                            <th style="width: 10px"></th>
                        </tr>
                        <tr>
                            <td><i class="fa-2x fa fa-safari"> Safari</i></td>
                            <td>  <strong>114 visitas</strong></td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-info"
                                         style="width: 70%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-aqua">60%</span></td>
                        </tr>
                        <tr>
                            <th style="width: 10px"></th>
                            <th style="width: 10px"></th>
                            <th style="width: 10px"></th>
                        </tr>
                        <tr>
                            <td><i class="fa-2x fa fa-internet-explorer"> Interne Explorer</i></td>
                            <td>  <strong>154 visitas</strong></td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar progress-bar-primary"
                                         style="width:30px;"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-light-blue">50%</span></td>
                        </tr>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- START ALERTS AND CALLOUTS -->
    <h2 class="page-header">
        <i class="fa  fa-dedent"></i> Publicações
    </h2>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="glyphicon glyphicon-th"></i>
                    <h3 class="box-title">Artigos Mais Vistos</h3>
                </div>
                <div class="box-body"><!-- Attachment 01-->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">Veja mais</a>
                            </div>
                        </div>                            <!-- /.attachment-pushed -->
                    </div>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-desktop"><strong> Site</strong></i></button>
                    <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></button>
                    <small class="pull-right">Date: 2/10/2014</small>
                </div>
                <!-- fim Attachment 01-->
                <div class="box-body"><!-- Attachment 02-->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">Veja mais</a>
                            </div>
                        </div>                            <!-- /.attachment-pushed -->
                    </div>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-desktop"><strong> Site</strong></i></button>
                    <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></button>
                    <small class="pull-right">Date: 2/10/2014</small>
                </div>
                <!-- FIM Attachment 02-->
                <div class="box-body">
                    <div class="attachment-block clearfix"><!-- Attachment 03-->
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">Veja mais</a>
                            </div>
                        </div>                            <!-- /.attachment-pushed -->
                    </div>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-desktop"><strong> Site</strong></i></button>
                    <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></button>
                    <small class="pull-right">Date: 2/10/2014</small>
                </div>
                <!--  FIM Attachment 03-->
                <div class="box-body">
                    <div class="attachment-block clearfix"><!-- Attachment 04-->
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">Veja mais</a>
                            </div>
                        </div>                            <!-- /.attachment-pushed -->
                    </div>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-desktop"><strong> Site</strong></i></button>
                    <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></button>
                    <small class="pull-right">Date: 2/10/2014</small>
                </div>
                <!--  FIM Attachment 04-->
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="glyphicon glyphicon-th"></i>

                    <h3 class="box-title">Artigos Mais Recentes</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">Veja mais</a>
                            </div>
                        </div>                            <!-- /.attachment-pushed -->
                    </div>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-desktop"><strong> Site</strong></i></button>
                    <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></button>
                    <small class="pull-right">Date: 2/10/2014</small>
                </div>
                <!-- Attachment 01-->
                <div class="box-body">
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">Veja mais</a>
                            </div>
                        </div>                            <!-- /.attachment-pushed -->
                    </div>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-desktop"><strong> Site</strong></i></button>
                    <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></button>
                    <small class="pull-right">Date: 2/10/2014</small>
                </div>
                <!-- Attachment 02-->
                <div class="box-body">
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">Veja mais</a>
                            </div>
                        </div>                            <!-- /.attachment-pushed -->
                    </div>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-desktop"><strong> Site</strong></i></button>
                    <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></button>
                    <small class="pull-right">Date: 2/10/2014</small>
                </div>
                <!-- Attachment 03-->
                <div class="box-body">
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="../assets/img/photo1.png" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">Veja mais</a>
                            </div>
                        </div>                            <!-- /.attachment-pushed -->
                    </div>
                    <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-desktop"><strong>  Site</strong></i></button>
                    <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button>
                    <button type="button" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></button>
                    <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></button>
                    <small class="pull-right">Date: 2/10/2014</small>
                </div>
                <!-- Attachment 04-->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->



