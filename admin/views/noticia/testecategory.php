<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        CATEGORIAS
        <small>Sub-Categorias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">CATEGORIAS</li>
    </ol>
</section>
<section class="content">
    <div class="col-md-3">
        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box box-primary">

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Álbuns</h3>
                </div>
                <div class="box-body">
                    <!-- the events -->
                    <div id="external-events">
                        <div class="external-event bg-default ui-draggable ui-draggable-handle">
                            <a class="link-black" href="#"><strong><i class="fa fa-book"></i> Education</strong></a>
                            <p class="text-muted">
                                Computer Science from the University
                            </p>
                        </div>
                        <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">
                            <a class="link-black" href="#"><strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong></a>
                            <p class="text-muted">
                                Computer Science from the University
                            </p>
                        </div>
                        <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">
                            <a class="link-black" href="#"><strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong></a>
                            <p class="text-muted">
                                Computer Science from the University
                            </p>
                        </div>
                        <div class="external-event bg-default ui-draggable ui-draggable-handle" style="position: relative;">
                            <a class="link-black" href="#"><strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong></a>
                            <p class="text-muted">
                                Computer Science from the University
                            </p>
                        </div>
                    </div>
                </div>
                <!-- About Me Box -->
            </div>
        </div>
    </div>
   <!-- Box color-->
    <div class="col-md-offset-2 col-md-9">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>Titulo de Categoria</strong></h3>
                <div class="btn-group pull-right">
                    <a href="http://localhost/Portal-News/admin/home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                    <a href="http://localhost/Portal-News/admin/post/editPost/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="" class="btn btn-danger btn-xs del " data-controller="post/excluiPost/" id="" onclick="return confirm('Tem certeza que deseja excluir esta Postagem?')"><i class="glyphicon glyphicon-ban-circle"></i></a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>
                    Specifies that the element should automatically get focus when the page loads
                    Specifies that the element should automatically get focus when the page loads
                    Specifies that the element should automatically get focus when the page loads
                </p>
                <ul class="nav nav-stacked">
                    <li>

                        <span class="pull-left product-description margin-bottom">Autor:cicrano de almeida </span><br>
                        <span class="pull-right product-description" style="margin-top: 25px"><i>Fonte:folha teste</i></span>

                        <span class="pull-left" style="margin: 5px 0 0 -145px;"><h5>05/03/2010</h5></span>

                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div><!-- /.box SUCCESS -->
    </div>
    <!-- FIM Box color-->

    <div class="col-md-9">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Área administrativa</h2>
            </div>
            <!--############# COMEÇO DE TUDO timeline ##############-->
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Álbuns Videos</a></li>
                                <li><a href="<?= BASEADMIN ?>gallery/addGal#timeline" data-toggle="tab">Cadastrar Videos</a></li>
                                <li><a href="<?= BASEADMIN ?>gallery/EditGal#settings" data-toggle="tab">Editar Videos</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <h2>
                                                <i class="fa fa-globe"></i> Álbuns
                                                <small> & Videos</small>
                                            </h2>
                                            <span class="description">São Vídeos de conteúdos relacionados  do youtube</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /col-sm-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <h2>
                                                <i class="fa fa-globe"></i> Álbuns
                                                <small> & Videos</small>
                                            </h2>
                                            <span class="description">São Vídeos de conteúdos relacionados  do youtube</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /col-sm-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.post -->
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <h2>
                                                <i class="fa fa-globe"></i> Álbuns
                                                <small> & Videos</small>
                                            </h2>
                                            <span class="description">São Vídeos de conteúdos relacionados  do youtube</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /col-sm-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">  <!-- #######################  The timeline @@@@@@@@@@@@@@@@-->
                                    <!-- The timeline -->
                                    <div class="box-header with-border">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                            <div class="row">
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div><!-- /.box -->
                                    </div>
                                </div><!-- #######################  Fim /// The timeline @@@@@@@@@@@@@@@@-->
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings"><!-- #######################  The Form  @@@@@@@@@@@@@@@@-->
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                        <div class="row">
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div><!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div><!-- ####################### Fim The Form @@@@@@@@@@@@@@@@-->
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div><!-- /row.############### fim col3 -->
            </section>
            <!-- Main content --><!--############# COMEÇO DE TUDO timeline ##############-->
            <section class="content">
                <div class="row"><!-- /. col3 -->
                    <div class="col-md-3">
                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Vídeos</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                                <p class="text-muted">Malibu, California</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                                <p>
                                    <span class="label label-danger">UI Design</span>
                                    <span class="label label-success">Coding</span>
                                    <span class="label label-info">Javascript</span>
                                    <span class="label label-warning">PHP</span>
                                    <span class="label label-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>

                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Álbuns Videos</a></li>
                                <li><a href="<?= BASEADMIN ?>gallery/addGal#timeline" data-toggle="tab">Cadastrar Videos</a></li>
                                <li><a href="<?= BASEADMIN ?>gallery/EditGal#settings" data-toggle="tab">Editar Videos</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <h2>
                                                <i class="fa fa-globe"></i> Álbuns
                                                <small> & Videos</small>
                                            </h2>
                                            <span class="description">São Vídeos de conteúdos relacionados  do youtube</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /col-sm-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.post -->
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <h2>
                                                <i class="fa fa-globe"></i> Álbuns
                                                <small> & Videos</small>
                                            </h2>
                                            <span class="description">São Vídeos de conteúdos relacionados  do youtube</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /col-sm-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.post -->
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <h2>
                                                <i class="fa fa-globe"></i> Álbuns
                                                <small> & Videos</small>
                                            </h2>
                                            <span class="description">São Vídeos de conteúdos relacionados  do youtube</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo4.jpg" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                        <br>
                                                        <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                                                        <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /col-sm-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">  <!-- #######################  The timeline @@@@@@@@@@@@@@@@-->
                                    <!-- The timeline -->
                                    <div class="box-header with-border">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                            <div class="row">
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 col-md-2">
                                                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div><!-- /.box -->
                                    </div>
                                </div><!-- #######################  Fim /// The timeline @@@@@@@@@@@@@@@@-->
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings"><!-- #######################  The Form  @@@@@@@@@@@@@@@@-->
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                        <div class="row">
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-4 col-md-2">
                                                <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                                                <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div><!-- /.box -->
                                </div>
                                <!-- /.col -->
                            </div><!-- ####################### Fim The Form @@@@@@@@@@@@@@@@-->
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div><!-- /row.############### fim col3 -->
            </section>
            <!-- Main content -->
        </div>
    </div>
</section>
<!-- Main content -->

<!-- ======================  /.content ========================= -->



<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        CATEGORIAS
        <small>Sub-Categorias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">CATEGORIAS</li>
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
                <div class="col-md-6">
                    <h2 class="box-title box-default"><strong>titulo</strong><span> ( 21 posts ) ( 3 Categorias )</span></h2>
                    <div class="box-body table-responsive pad">
                        <h4><p>conteudo  ?></p></h4>
                        <div class="btn-group">
                            <h5><strong>Date: 2/10/2014</strong></h5> 
                            <a href="<?= BASEADMIN ?>home" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                            <a href="<?= BASEADMIN . "category/editCat/" //. $nome['id_categoria']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="<?= BASEADMIN ?>category/delCat/" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                        </div>
                    </div> <!-- table-responsive pad -->
                </div> <!-- /.FIM col-md-6 -->
                <!-- /CATEGORIAS -->
            </div><!-- /.row -->
        </div>  <!-- /.box-body -->
 <!-- /.subcategorias -->    
        <div class="box-footer">  
            <div class="row">
                <!-- /.AKI -->
                <div class="col-md-3">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-tag"></i><strong>  Sub categorias de vídeo aulas</strong></h3>
                        </div>
                        <div class="col-md-6">
                            <div class="attachment-block clearfix">

                                <span class="col-sm-3-offset-1"><img class="img-responsive"  src="../assets/dist/img/photo2.png" alt="Photo"></span><br>


                                <div class="attachment-pushed">
                                    <h3 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h3><br>
                                    <div class="btn-group">

                                        <a href="<?= BASEADMIN ?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                        <a href="<?= BASEADMIN ?>category/subCat/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="<?= BASEADMIN ?>category/delSub/" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                    </div>
                                    <span class="pull-right text-muted"><h5><strong>Date: 2/10/2014</strong></h5></span>
                                    <!-- /.attachment-text -->
                                </div>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#"><strong>Titulo</strong></a> ( 0 Posts)</h3>
                            <div class="btn-group">
                                <h5><strong>Date: 2/10/2014</strong></h5>
                                <a href="<?= BASEADMIN ?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                <a href="<?= BASEADMIN ?>category/subCat/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="<?= BASEADMIN ?>category/delSub/" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                            </div>
                        </div>
                    </div> <!-- /.box-footer-->
                </div>   <!-- /.col-md-4 -->
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="attachment-block clearfix">
                            <div class="col-sm-4 col-md-4">
                                <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png"  alt="Photo"> </div>

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
                    <div class="col-md-6">
                        <div class="attachment-block clearfix">
                            <div class="col-sm-4 col-md-4">
                                <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png"  alt="Photo">                                  </div>

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
            </div>  <!-- /.row -->
        </div><!-- /.box footer -->
</section>
 <!-- /.content -->







<section class="content">
    <div class="box color-palette-box">
        <div class="box-header with-border">
            <i class="fa fa-globe"></i>
            <h2 class="box-title">Categorias</h2></br></br>
        </div>
       <div class="box-body">
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Primary</h4>

                    <div class="color-palette-set">
                        <div class="bg-light-blue disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-light-blue color-palette"><span>#3c8dbc</span></div>
                        <div class="bg-light-blue-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Info</h4>

                    <div class="color-palette-set">
                        <div class="bg-aqua disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-aqua color-palette"><span>#00c0ef</span></div>
                        <div class="bg-aqua-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Success</h4>

                    <div class="color-palette-set">
                        <div class="bg-green disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-green color-palette"><span>#00a65a</span></div>
                        <div class="bg-green-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Warning</h4>

                    <div class="color-palette-set">
                        <div class="bg-yellow disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-yellow color-palette"><span>#f39c12</span></div>
                        <div class="bg-yellow-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Danger</h4>

                    <div class="color-palette-set">
                        <div class="bg-red disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-red color-palette"><span>#f56954</span></div>
                        <div class="bg-red-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Gray</h4>

                    <div class="color-palette-set">
                        <div class="bg-gray disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-gray color-palette"><span>#d2d6de</span></div>
                        <div class="bg-gray-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Navy</h4>

                    <div class="color-palette-set">
                        <div class="bg-navy disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-navy color-palette"><span>#001F3F</span></div>
                        <div class="bg-navy-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Teal</h4>

                    <div class="color-palette-set">
                        <div class="bg-teal disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-teal color-palette"><span>#39CCCC</span></div>
                        <div class="bg-teal-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Purple</h4>

                    <div class="color-palette-set">
                        <div class="bg-purple disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-purple color-palette"><span>#605ca8</span></div>
                        <div class="bg-purple-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Orange</h4>

                    <div class="color-palette-set">
                        <div class="bg-orange disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-orange color-palette"><span>#ff851b</span></div>
                        <div class="bg-orange-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Maroon</h4>

                    <div class="color-palette-set">
                        <div class="bg-maroon disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-maroon color-palette"><span>#D81B60</span></div>
                        <div class="bg-maroon-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Black</h4>

                    <div class="color-palette-set">
                        <div class="bg-black disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-black color-palette"><span>#111111</span></div>
                        <div class="bg-black-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
  
       <div class="box-body">
            <div class="row">
                
                <!-- /.AKI -->
                  <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tag"></i><strong>  Sub categorias de vídeo aulas</strong></h3>
                </div>
                <div class="timeline-item">
                    <h3 class="timeline-header"><a href="#"><strong>Titulo</strong></a> ( 0 Posts)</h3>

                    <div class="btn-group">
                        <h5><strong>Date: 2/10/2014</strong></h5> 
                        <a href="<?= BASEADMIN ?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                        <a href="<?= BASEADMIN ?>category/subCat/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= BASEADMIN ?>category/delSub/" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                    </div>  

                </div> 
            </div>
        </div><!-- /.ms 4 fim-->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Navy</h4>

                    <div class="color-palette-set">
                        <div class="bg-navy disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-navy color-palette"><span>#001F3F</span></div>
                        <div class="bg-navy-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Teal</h4>

                    <div class="color-palette-set">
                        <div class="bg-teal disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-teal color-palette"><span>#39CCCC</span></div>
                        <div class="bg-teal-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Purple</h4>

                    <div class="color-palette-set">
                        <div class="bg-purple disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-purple color-palette"><span>#605ca8</span></div>
                        <div class="bg-purple-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Orange</h4>

                    <div class="color-palette-set">
                        <div class="bg-orange disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-orange color-palette"><span>#ff851b</span></div>
                        <div class="bg-orange-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Maroon</h4>

                    <div class="color-palette-set">
                        <div class="bg-maroon disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-maroon color-palette"><span>#D81B60</span></div>
                        <div class="bg-maroon-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Black</h4>

                    <div class="color-palette-set">
                        <div class="bg-black disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-black color-palette"><span>#111111</span></div>
                        <div class="bg-black-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            
            
            
        </div>
    </div><!-- /.box -->
</section> 
<section class="content">
    <!-- START ALERTS AND CALLOUTS -->
    <h2 class="page-header">Alerts and Callouts</h2>
<section class="content">
    <div class="box color-palette-box">
        <div class="box-header with-border">
            <i class="fa fa-globe"></i>
            <h2 class="box-title">Categorias</h2></br></br>
        </div>
       <div class="box-body">
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Primary</h4>

                    <div class="color-palette-set">
                        <div class="bg-light-blue disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-light-blue color-palette"><span>#3c8dbc</span></div>
                        <div class="bg-light-blue-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Info</h4>

                    <div class="color-palette-set">
                        <div class="bg-aqua disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-aqua color-palette"><span>#00c0ef</span></div>
                        <div class="bg-aqua-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Success</h4>

                    <div class="color-palette-set">
                        <div class="bg-green disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-green color-palette"><span>#00a65a</span></div>
                        <div class="bg-green-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Warning</h4>

                    <div class="color-palette-set">
                        <div class="bg-yellow disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-yellow color-palette"><span>#f39c12</span></div>
                        <div class="bg-yellow-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Danger</h4>

                    <div class="color-palette-set">
                        <div class="bg-red disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-red color-palette"><span>#f56954</span></div>
                        <div class="bg-red-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Gray</h4>

                    <div class="color-palette-set">
                        <div class="bg-gray disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-gray color-palette"><span>#d2d6de</span></div>
                        <div class="bg-gray-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Navy</h4>

                    <div class="color-palette-set">
                        <div class="bg-navy disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-navy color-palette"><span>#001F3F</span></div>
                        <div class="bg-navy-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Teal</h4>

                    <div class="color-palette-set">
                        <div class="bg-teal disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-teal color-palette"><span>#39CCCC</span></div>
                        <div class="bg-teal-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Purple</h4>

                    <div class="color-palette-set">
                        <div class="bg-purple disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-purple color-palette"><span>#605ca8</span></div>
                        <div class="bg-purple-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Orange</h4>

                    <div class="color-palette-set">
                        <div class="bg-orange disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-orange color-palette"><span>#ff851b</span></div>
                        <div class="bg-orange-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Maroon</h4>

                    <div class="color-palette-set">
                        <div class="bg-maroon disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-maroon color-palette"><span>#D81B60</span></div>
                        <div class="bg-maroon-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Black</h4>

                    <div class="color-palette-set">
                        <div class="bg-black disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-black color-palette"><span>#111111</span></div>
                        <div class="bg-black-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div><!-- /.box -->
</section> 
    <div class="row">
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-tag"></i><strong>  Sub categorias de vídeo aulas</strong></h3>
                </div>
                <div class="timeline-item">
                    <h3 class="timeline-header"><a href="#"><strong>Titulo</strong></a> ( 0 Posts)</h3>

                    <div class="btn-group">
                        <h5><strong>Date: 2/10/2014</strong></h5> 
                        <a href="<?= BASEADMIN ?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                        <a href="<?= BASEADMIN ?>category/subCat/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= BASEADMIN ?>category/delSub/" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                    </div>  

                </div> 
            </div>
        </div><!-- /.ms 4 fim-->
    </div><!-- /.row-->


</section>





<section class="content">
    <div class="box color-palette-box">
        <div class="box-header with-border">
            <i class="fa fa-globe"></i>
            <h2 class="box-title">Categorias Testando</h2></br></br>
        </div>
       <div class="box-body">
            <div class="row">
                <!-- /CATEGORIAS -->
            </div>
            <!-- /.row -->
  
       <div class="box-body">
            <div class="row">
                
                <!-- /.AKI SUBCATEGORIAS -->
                <div class="col-md-4">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-tag"></i><strong>  Sub categorias de vídeo aulas</strong></h3>
                        </div>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#"><strong>Titulo</strong></a> ( 0 Posts)</h3>

                            <div class="btn-group">
                                <h5><strong>Date: 2/10/2014</strong></h5> 
                                <a href="<?= BASEADMIN ?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                <a href="<?= BASEADMIN ?>category/subCat/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="<?= BASEADMIN ?>category/delSub/" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                            </div>  

                        </div> 
                    </div>
                </div><!-- /.ms 4 fim-->
            </div>
            <!-- /.row -->
        </div>
    </div><!-- /.box -->
</section> 

    <!-- START ALERTS AND CALLOUTS -->
    <h2 class="page-header">Alerts and Callouts</h2>
<section class="content">
    <div class="box color-palette-box">
        <div class="box-header with-border">
            <i class="fa fa-globe"></i>
            <h2 class="box-title">Categorias</h2></br></br>
        </div>
       <div class="box-body">
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Primary</h4>

                    <div class="color-palette-set">
                        <div class="bg-light-blue disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-light-blue color-palette"><span>#3c8dbc</span></div>
                        <div class="bg-light-blue-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Info</h4>

                    <div class="color-palette-set">
                        <div class="bg-aqua disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-aqua color-palette"><span>#00c0ef</span></div>
                        <div class="bg-aqua-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Success</h4>

                    <div class="color-palette-set">
                        <div class="bg-green disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-green color-palette"><span>#00a65a</span></div>
                        <div class="bg-green-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Warning</h4>

                    <div class="color-palette-set">
                        <div class="bg-yellow disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-yellow color-palette"><span>#f39c12</span></div>
                        <div class="bg-yellow-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Danger</h4>

                    <div class="color-palette-set">
                        <div class="bg-red disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-red color-palette"><span>#f56954</span></div>
                        <div class="bg-red-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Gray</h4>

                    <div class="color-palette-set">
                        <div class="bg-gray disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-gray color-palette"><span>#d2d6de</span></div>
                        <div class="bg-gray-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Navy</h4>

                    <div class="color-palette-set">
                        <div class="bg-navy disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-navy color-palette"><span>#001F3F</span></div>
                        <div class="bg-navy-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Teal</h4>

                    <div class="color-palette-set">
                        <div class="bg-teal disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-teal color-palette"><span>#39CCCC</span></div>
                        <div class="bg-teal-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Purple</h4>

                    <div class="color-palette-set">
                        <div class="bg-purple disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-purple color-palette"><span>#605ca8</span></div>
                        <div class="bg-purple-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Orange</h4>

                    <div class="color-palette-set">
                        <div class="bg-orange disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-orange color-palette"><span>#ff851b</span></div>
                        <div class="bg-orange-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Maroon</h4>

                    <div class="color-palette-set">
                        <div class="bg-maroon disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-maroon color-palette"><span>#D81B60</span></div>
                        <div class="bg-maroon-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <h4 class="text-center">Black</h4>

                    <div class="color-palette-set">
                        <div class="bg-black disabled color-palette"><span>Disabled</span></div>
                        <div class="bg-black color-palette"><span>#111111</span></div>
                        <div class="bg-black-active color-palette"><span>Active</span></div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div><!-- /.row -->



<div class="row"><!-- /.############### col3 -->
<div class="col-md-3">
    <!-- About Me Box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

            <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted">Malibu, California</p>

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../img/user1-128x128.jpg" alt="user image">
                            <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                            <span class="description">Shared publicly - 7:30 PM today</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>
                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../img/user7-128x128.jpg" alt="User Image">
                            <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                            <span class="description">Sent you a message - 3 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                            Lorem ipsum represents a long-held tradition for designers,
                            typographers and the like. Some people hate it and argue for
                            its demise, but others ignore the hate as they create awesome
                            tools to help create filler text for everyone from bacon lovers
                            to Charlie Sheen fans.
                        </p>

                        <form class="form-horizontal">
                            <div class="form-group margin-bottom-none">
                                <div class="col-sm-9">
                                    <input class="form-control input-sm" placeholder="Response">
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="../../img/user6-128x128.jpg" alt="User Image">
                            <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                            <span class="description">Posted 5 photos - 5 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="row margin-bottom">
                            <div class="col-sm-6">
                                <img class="img-responsive" src="../../img/photo1.png" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="../../img/photo2.png" alt="Photo">
                                        <br>
                                        <img class="img-responsive" src="../../img/photo3.jpg" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-6">
                                        <img class="img-responsive" src="../../img/photo4.jpg" alt="Photo">
                                        <br>
                                        <img class="img-responsive" src="../../img/photo1.png" alt="Photo">
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <ul class="list-inline">
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                            <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                            </li>
                            <li class="pull-right">
                                <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                                    (5)</a></li>
                        </ul>

                        <input class="form-control input-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-envelope bg-blue"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-xs">Read more</a>
                                    <a class="btn btn-danger btn-xs">Delete</a>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-user bg-aqua"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-comments bg-yellow"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                    Take me to your leader!
                                    Switzerland is small and neutral!
                                    We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-camera bg-purple"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <li>
                            <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                    </ul>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div><!-- /row.############### fim col3 -->




    </div><!-- /.box -->
</section>
    <!-- ############################################ PROFILE ACTIVY ###################################### -->
    <section>

>
        </div>
        <!-- /.row -->
    </section>
    <!-- ############################################ FIM PROFILE ACTIVY ###################################################### -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CATEGORIAS TESTE
            <small>Sub-Categorias</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">CATEGORIAS</li>
        </ol>
    </section>
    <section class="content">
        <div class="col-md-3">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body color-palette-set">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>
                    <hr>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                    <p class="text-muted">Malibu, California</p>
                    <hr>
                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>
                    <hr>
                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-9">
            <!-- Default box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Área administrativa</h2>

                <!-- /.box-header -->
                <div class="row margin">
                    <div class="col-sm-3 img-bordered margin">
                        <img class="img-responsive" src="../assets/img/photo2.png" alt="Photo">
                        <a href="#" class="name  text-center"><h4>Alexander Pierce</h4></a>
                        <p class="message mtest-dr_esq">I would like to meet you to discuss the latest news about
                            the arrival of the new theme. They say it is going to be one the
                            best themes on the market</p>
                        <div class="btn-group mtest-esq">
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                            <a href=""  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href=""  class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                        </div>
                        <h6 class="text-muted pull-right mtest-dir"><strong>Date: 2/10/2014</strong></h6>
                    </div>
                    <div class="col-sm-3 img-bordered margin">
                        <img class="img-responsive" src="../assets/img/photo2.png" alt="Photo">
                        <a href="#" class="name  text-center"><h4>Alexander Pierce</h4></a>
                        <p class="message mtest-dr_esq">I would like to meet you to discuss the latest news about
                            the arrival of the new theme. They say it is going to be one the
                            best themes on the market</p>
                        <div class="btn-group mtest-esq">
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                            <a href=""  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href=""  class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                        </div>
                        <h6 class="text-muted pull-right mtest-dir"><strong>Date: 2/10/2014</strong></h6>
                    </div>
                    <div class="col-sm-3 img-bordered margin">
                        <img class="img-responsive" src="../assets/img/photo2.png" alt="Photo">
                        <a href="#" class="name  text-center"><h4>Alexander Pierce</h4></a>
                        <p class="message mtest-dr_esq">I would like to meet you to discuss the latest news about
                            the arrival of the new theme. They say it is going to be one the
                            best themes on the market </p><p class="text-muted pull-right dt">2/10/2014</p>
                        <div class="btn-group mtest-bt">
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                            <a href=""  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href=""  class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                        </div>
                        <div class="btn-check"><input class="check-inp" type="checkbox" name="check"><h5>Publicar</h5></div>
                    </div>

                </div>
            </div>
        </div>
        </div>
        <
    </section>
    <!-- Main content -->
<!--############################################################## TESTE @##################################################-->

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        CATEGORIAS TESTE
        <small>Sub-Categorias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">CATEGORIAS</li>
    </ol>
</section>
<section class="content">
    <div class="col-md-5">
        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
            </div><div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody><tr>
                        <th><i class="fa fa-book margin-r-5"></i>Title</th>
                        <th><i class="fa fa-book margin-r-5"></i>Capa</th>
                        <th><i class="fa fa-book margin-r-5"></i>Status</th>
                        <th><i class="fa fa-book margin-r-5"></i>Data</th>
                        <th><i class="fa fa-book margin-r-5"></i>Ações</th>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-success">Approved</span></td>
                        <td><span class="label label-success">Approved</span></td>
                        <td>
                            <a href="<?= BASEADMIN ?>category/subCat/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                            <a href="<?= BASEADMIN ?>category/delSub/" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i> Excluir</a>
                        </td>
                    </tr>
                    </tbody></table>
            </div>
        </div>
    </div><!-- col ms3 -->

    <div class="col-md-7">
        <div class="box box-primary">
            <div class="box-header with-border margin-bottom">
                <h2 class="box-title">Área administrativa</h2>
            </div>
            <div class="col-md-offset-1 box-header with-border">
                <h3 class="box-title"><strong><i class="fa fa-list-ul margin-r-5"></i> Listar Galerias</strong></h3>
            </div>
            <div class="col-md-offset-1 box-body">
                <div class="row">
                    <div class="col-sm-3 well well-sm margin">
                        <img class="img-responsive" src="http://placehold.it/150x100" alt="Img">
                        <a href="#" class="name  text-center"><h4>titulo</h4></a>
                    </div>
                    <div class="col-sm-3 well well-sm margin">
                        <img class="img-responsive" src="http://placehold.it/150x100" alt="Img">
                        <a href="#" class="name  text-center"><h4>titulo</h4></a>
                    </div>
                    <div class="col-sm-3 well well-sm margin">
                        <img class="img-responsive" src="http://placehold.it/150x100" alt="Img">
                        <a href="#" class="name  text-center"><h4>titulo</h4></a>
                    </div>
                </div>
            </div>
            <div class="row margin">
                <div class="col-md-offset-1 col-md-11">
                    <div class="col-sm-3 img-bordered margin">
                        <img class="img-responsive" src="../assets/img/photo2.png" alt="Photo">
                        <a href="#" class="name  text-center"><h4>Alexander Pierce</h4></a>
                        <p class="text-center">Data: 2/10/2014</p>
                        <div class="btn-group mtest-bt">
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                            <a href="" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                        </div>
                        <div class="checkbox pull-right">
                            <a class="col-sm-10" href="#">
                                <h5 class="box-title"><i class="fa fa-check"><b>Publicar</b></i></h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 img-bordered margin">
                        <img class="img-responsive" src="../assets/img/photo2.png" alt="Photo">
                        <a href="#" class="name  text-center"><h4>Alexander Pierce</h4></a>
                        <p class="text-center">Data: 2/10/2014</p>
                        <div class="btn-group mtest-bt">
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                            <a href="" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                        </div>
                        <div class="checkbox pull-right">
                            <a class="col-sm-10" href="#">
                                <h5 class="box-title"><i class="fa fa-check"><b>Publicar</b></i></h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 img-bordered margin">
                        <img class="img-responsive" src="../assets/img/photo2.png" alt="Photo">
                        <a href="#" class="name  text-center"><h4>Alexander Pierce</h4></a>
                        <p class="text-center">Data: 2/10/2014</p>
                        <div class="btn-group mtest-bt">
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                            <a href="" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                        </div>
                        <div class="checkbox pull-right">
                            <a class="col-sm-10" href="#">
                                <h5 class="box-title"><i class="fa fa-check"><b>Publicar</b></i></h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 img-bordered margin">
                        <img class="img-responsive" src="../assets/img/photo2.png" alt="Photo">
                        <a href="#" class="name  text-center"><h4>Alexander Pierce</h4></a>
                        <p class="text-center">Data: 2/10/2014</p>
                        <div class="btn-group mtest-bt">
                            <a href="" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                            <a href="" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                        </div>
                        <div class="checkbox pull-right">
                            <a class="col-sm-10" href="#">
                                <h5 class="box-title"><i class="fa fa-check"><b>Publicar</b></i></h5>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- Fim col-md-9 -->

</section>
<!-- Main content -->

<!-- ======================  /.content ========================= -->

<!--############################################################## FIM TESTE @##################################################-->
    <!-- ======================  /.content ========================= -->
    <section class="content-header">
        <h1>
            <i class="fa fa-globe"></i> Área Administrativa
            <small> Videos & Galerias</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i><b>Home</b></a></li>
            <li><a href="<?= BASEADMIN ?>category/"><b>Galeria Videos</b></a></li>
        </ol>
    </section>

<section>
    <div class="box-header with-border">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.box -->
    </div>
</section>
    <!--############# FIM    timeline ##############-->

    <div class="tab-pane" id="settings"><!-- #######################  The Form  @@@@@@@@@@@@@@@@-->
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                <div class="col-sm-10">
                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </div>
        </form>

        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-md-2">
                    <img  class="img-responsive" src="http://placehold.it/150x100" alt="..." class="margin">
                    <strong><h5 class="text-center">Alexander Pierce</h5></strong>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.box -->
    </div>
    <!-- /.col -->
    </div><!-- ####################### Fim The Form @@@@@@@@@@@@@@@@-->

<section class="content">
    <div class="row"><!-- /.############### col3 -->
        <div class="col-md-3">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-book"> Álbuns dos Videos</i></h3><br>
                    <span class="description">São Vídeos do youtube e Vimeo.</span>
                </div>
                <div class="box-body">
                    <!-- the events -->
                    <div id="external-events">
                        <div class="external-event bg-default ui-draggable ui-draggable-handle">
                            <a class="link-black" href="#"><strong><i class="fa fa-book"></i> Education</strong></a>
                        </div>
                        <div class="external-event bg-default ui-draggable ui-draggable-handle" style="position: relative;">
                            <a class="link-black" href="#"><strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong></a>
                        </div>
                        <div class="external-event bg-default ui-draggable ui-draggable-handle" style="position: relative;">
                            <a class="link-black" href="#"><strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong></a>
                        </div>
                        <div class="external-event bg-default ui-draggable ui-draggable-handle" style="position: relative;">
                            <a class="link-black" href="#"><strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong></a>
                        </div>
                    </div>
                </div>
                <!-- About Me Box -->
            </div>
        </div>

        <!-- /.col -->
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="user-block">
                        <h2>
                            <i class="fa fa-globe"></i> Listas
                            <small> & Videos</small>
                        </h2>
                        <span class="description">São Vídeos de conteúdos relacionados  do youtube</span>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row margin-bottom">
                        <div class="col-sm-6">
                            <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo1.png" alt="Photo">
                            <strong><h3 class="text-center">Alexander Pierce</h3></strong>

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                    <strong><h4 class="text-center">Alexander Pierce</h4></strong>
                                    <br>
                                    <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                    <strong><h4 class="text-center">Alexander Pierce</h4></strong>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo2.png" alt="Photo">
                                    <strong><h4 class="text-center">Alexander Pierce</h4></strong>
                                    <br>
                                    <img class="img-responsive" src="<?= BASEADMIN ?>assets/img/photo3.jpg" alt="Photo">
                                    <strong><h4 class="text-center">Alexander Pierce</h4></strong>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-5 crewell well-sm margin">
                            <div class="attachment-block clearfix">
                                <div class="col-sm-5 col-md-4 margin">
                                    <img class="img-responsive" src="http://localhost/Portal-News/admin/assets/img/photo2.png" alt="Photo">
                                    <span class="pull-left product-description"><h5>Registro: 05/03/2010</h5></span>
                                </div>
                                <div class="col-md-offset-2 product-info">
                                    <a href="javascript:void(0)" class="product-title">Samsung TV</a>
                                    <span class=" pull-right">
                                           <div class="btn-group">
                                                <a href="http://localhost/Portal-News/admin/home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                                <a href="http://localhost/Portal-News/admin/post/editPost/" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="" class="btn btn-danger btn-xs del " data-controller="post/excluiPost/" id="" onclick="return confirm('Tem certeza que deseja excluir esta Postagem?')"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                            </div>
                                        </span><br>
                                    <span class="product-description"> Nome: Geraldo Pompilio dasilva</span><br>
                                    <span class="product-description">Email: john.doe@example.com</span><br>
                                    <span class="product-description">http://localhost/Portal-News/admin/empresa/</span><br>
                                    <span class="product-description">Phone: (555) 539-1011</span><br>
                                    <span class="product-description">Phone Cel: (555) 539-1037</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -AKI-->

                </div>
            </div>
        </div><!-- /row.############### fim col3 -->
</section>
