<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        CATEGORIAS
        <small> & Sub-Categorias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
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
        <?php
        if (!empty($listCatg)) {
            foreach ($listCatg as $categoria => $nome) {
                ?>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-default">
                                <h3 class="box-title box-default"><strong><?= $nome['title_categoria']; ?></strong><span> ( 21 posts ) ( <?= count($nome['sub_categoria']) ?>  Categorias )</span></h3>
                                <div class="box-body table-responsive pad">
                                    <h4><p><?= $nome['content_categoria']; ?></p></h4>
                                    <div class="btn-group">
                                        <h5><strong>Data</strong> <?= date('d/m/y  H:i', strtotime($nome['date_categoria'])) ?></h5>
                                        <a href="<?= BASE . "categoria/" . $nome['slug_categoria'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                                        <a href="<?= BASEADMIN . "category/editCat/" . $nome['id_categoria']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-xs del" data-controller="category/excluirCat/"  id="<?=$nome['id_categoria'];?>"
                                           ><i class="glyphicon glyphicon-ban-circle"></i></a>
                                    </div>
                                </div> <!-- table-responsive pad -->
                            </div> <!-- box box-default -->
                        </div> <!-- /.FIM col-md-6 -->
                        <!-- /CATEGORIAS -->
                    </div><!-- /.row -->
                </div>  <!-- /.box-body -->
                <!-- /.subcategorias -->  
                    <?php
                    if (!empty($nome['sub_categoria'])) {
                        foreach ($nome['sub_categoria'] as $sub_categoria) { ?>   
                        <div class="box-footer">  
                            <div class="row">
                                <!-- /.AKI -->
                                <div class="col-md-4">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h4 class="box-title"><i class="fa fa-tag"></i><strong>  Sub categoria de <?= (isset($nome['title_categoria']) && $sub_categoria['parent_categoria'] == $nome['id_categoria']) ? $nome['title_categoria'] : '' ?></strong></h4>
                                        </div>
                                        <div class="timeline-item">
                                            <h4 class="timeline-header"><a href='"<?= BASEADMIN . "/category/up/{$sub_categoria['id_categoria']}" ?>'><strong><?= $sub_categoria['title_categoria'] ?></strong></a> ( 0 Posts)</h4>
                                            <div class="btn-group">
                                                <h5><strong>Data</strong> <?= date('d/m/y  H:i', strtotime($sub_categoria['date_categoria'])) ?></h5>
                                                <a href="<?= BASEADMIN ?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                                <a href="<?= BASEADMIN . "category/editCat/" . $sub_categoria['id_categoria']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="<?= BASEADMIN . "category/delCat/" . $sub_categoria['id_categoria']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')"
                                                   class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                            </div>
                                        </div>
                                    </div> <!-- /.box-footer-->
                                </div>   <!-- /.col-md-4 -->
                            </div>  <!-- /.row -->
                        </div><!-- /.box footer -->
                    <?php
                        }
                    }
                    ?>
            <?php
                }
            }
            ?>
    </div><!-- /.box footer -->
</section>
<!-- /.content -->


