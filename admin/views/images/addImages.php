<section class="content-header">
    <h1>
        Galeria Fotos
        <small>Cadastrar Galerias de Fotos</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRO DE GALERIAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>/galImages/"><i class="fa fa-list-ul"></i>Listas de Galerias</a></li>

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
            </div>
            <div class="col-sm-offset-1 col-sm-8 margin-bottom">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong><i class="fa fa-cubes margin-r-5"></i>Cadastrar Imagens</strong></h3>
                </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="imgForm" method="post" enctype="multipart/form-data" id="images/addFts">
                <div class="box-body">
                    <div class="col-sm-offset-1 col-sm-8">
                        <div class="form-group">
                            <label>Álbum de Fotos</label>
                            <select class="form-control input-lg select_img" name="album_image" required>
                                <option value="">Selecione o álbum...</option>
                                <?php
                                if(!empty($selectGallery)) {
                                    foreach ($selectGallery as $gallery):
                                        extract($gallery); ?>
                                        <option value="<?= $id_fto_albuns ?>" data-p="<?=$title_fto_albuns?>"><?= $title_fto_albuns ?></option>
                                <?php endforeach;
                                }
                                ?>
                            </select>
                         </div>
                        <div>
                            <!-- campo tb categorias Parent Cat input hidden-->
                            <input type="hidden" class="form-control input-lg albImg" name="title_image" value="<?=$title_fto_albuns?>"/>
                        </div>
                        <div class="form-group">
                            <label for="InputFile">Imagens</label>
                            <input type="file" name="cover_image[]" multiple>
                            <p class="help-block">Escolha as imagens para os álbuns de fotos.</p>
                        </div>
                        <div class="box-footer">
                            <button type="submit" value="Cadastrar"class="btn btn-success btn-lg">Cadastre as Imagens</button>
                            <a href="<?=BASEADMIN?>/galImages/" class="btn btn-primary btn-lg pull-right">
                                <span class="glyphicon glyphicon-share-alt"></span>&ensp;Voltar
                            </a>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </form>
        </div>
    </div>
</section>