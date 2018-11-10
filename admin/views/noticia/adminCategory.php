<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-globe"></i>&nbsp;CATEGORIAS & Sub-Categorias
        <small>POSTAGENS</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CATEGORIAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>category/add/"><i class="fa fa-compress"></i>Cadastrar Categorias</a></li>
        <li><a href="<?= BASEADMIN ?>category"><i class="glyphicon glyphicon-signal"></i>Minhas Categorias</a></li>
        <?php if($listUserinfo['id_grup_permissao'] === $grup_List[0]['id_grup_permissao']){?>
            <li><a href="<?=BASEADMIN?>category/adminListCat/"><i class="fa fa-desktop"></i><strong> Todas Categorias</strong>s</a></li>
        <?php  }?>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border margin-bottom">
                    <h2 class="box-title">Área administrativa</h2>
                </div>
                <div class="col-md-offset-2 box-header with-border">
                    <h2><i class="fa fa-list-ul"></i>&nbsp;<strong>Todas Categorias</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-2 col-md-9">
                        <div class="row">
                            <?php  if (!empty($adminListCat)){
                                foreach ($adminListCat as $categ => $nome):
                                    $subCat = (($nome['sub_categoria']) !== null ? count($nome['sub_categoria']) : '0');
                                    ?>
                                    <div class="box box-success box-solid">
                                        <div class="box-header with-border">
                                            <h4 class="pull-right">Autor(a): <?= $nome['autor_categoria']?></h4><br>
                                            <h2 class="box-title box-default"><i class="glyphicon glyphicon-signal"></i>&nbsp;&nbsp;<strong><?=$nome['title_categoria'];?></strong><span> ( 21 posts ) ( <?=$subCat?>  Categorias )</span></h2>
                                            <br>

                                            <div class="btn-group pull-right">
                                                <a href="<?= BASE . "categoria/" . $nome['slug_categoria'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i><strong> Site</strong></a>
                                                <a href="<?= BASEADMIN . "category/editCat/" . $nome['id_categoria']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="#" class="btn btn-danger btn-xs del" data-controller="category/excluirCat/"  id="<?=$nome['id_categoria'];?>"
                                                ><i class="glyphicon glyphicon-ban-circle"></i></a>
                                            </div>

                                        </div>
                                        <!-- /.box-header -->

                                        <div class="box-body">
                                            <p> <strong> DESCRIÇÃO:</strong>
                                                <?= $nome['content_categoria']; ?>
                                            </p>
                                            <span class="pull-right"><h5><strong>Registro em:</strong> <?= date('d/m/y  H:i', strtotime($nome['date_categoria'])) ?></h5></span>

                                        </div><!-- /.box SUCCESS categoria-->
                                        <hr>
                                        <?php
                                        if (!empty($nome['sub_categoria'])) {
                                            foreach ($nome['sub_categoria'] as $sub_categoria) { ?>
                                                <div class="box-body">

                                                    <ul class="nav nav-stacked">
                                                        <li>
                                                            <div class="box-header with-border">
                                                                <h3 class="box-title pull-left"><i class="glyphicon glyphicon-signal"></i>&nbsp;&nbsp;<strong>Sub-Categoria de&nbsp;<?= (isset($nome['title_categoria']) && $sub_categoria['parent_categoria'] == $nome['id_categoria']) ? $nome['title_categoria'] : '' ?></strong></h3>
                                                                <div class="btn-group pull-right">
                                                                    <a href="<?= BASEADMIN ?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                                                    <a href="<?= BASEADMIN . "category/editCat/" . $sub_categoria['id_categoria']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                                    <a href="<?= BASEADMIN . "category/delCat/" . $sub_categoria['id_categoria']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')"
                                                                       class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                            <h4 class="box-title pull-left"><i class="fa fa-angle-double-right"></i>&nbsp;<strong>Titulo: <a href='"<?= BASEADMIN . "/category/up/{$sub_categoria['id_categoria']}" ?>'><strong><?= $sub_categoria['title_categoria'] ?></strong></a> ( 0 Posts)</strong></h4>
                                                            <h4>Autor(a) SubCategoria: <?= $sub_categoria['autor_categoria']?></h4>
                                                            <span class="pull-right margin-bottom-none"><h5><strong>Registro em:</strong> <?= date('d/m/y  H:i', strtotime($sub_categoria['date_categoria'])) ?></h5></span>
                                                        </li>
                                                    </ul>

                                                </div><!-- /.box-body -->
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                <?php
                                endforeach;
                            }else{
                                echo "<div class=\"alert alert-info alert-dismissible\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                    <h4><i class=\"icon fa fa-info\"></i> Alert!</h4>
                                    <h3>Não há categorias cadastradas!!!</h3><br>
                                    <a href=\"\">
                                        <i class=\"fa fa-link\"></i>Cadastre Imagens
                                    </a>
                                </div>";
                            }?>
                        </div><!-- /row-->
                    </div>
                </div><!-- /.item -->
            </div>
        </div><!-- /.box -->
    </div><!-- /.col-md-12 -->
    </div>
</section>
