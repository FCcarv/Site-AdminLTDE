<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-globe"></i>&nbsp;CATEGORIAS & Sub-Categorias
        <small>POSTAGENS</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRAR CATEGORIAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>category"><i class="fa fa-compress"></i>Listar Categorias</a></li>
        <?php if($listUserinfo['id_grup_permissao'] === $grup_List[0]['id_grup_permissao']){?>
            <li><a href="<?=BASEADMIN?>category/adminListCat/"><i class="fa fa-desktop"></i><strong> Todas Categorias</strong></a></li>
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
                    <h3><i class="fa fa-sign-out"></i><strong>Cadastrar</strong></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-7 col-xs-offset-4 col-xs-offset-3">
                                    <div class="nav-tabs-custom ">
                                        <div class="tab-pane">
                                            <form class="form" method="post" id="category/addCat">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="nome">Titulo</label>
                                                        <input type="text" class="form-control input-lg"  name="title_cat" placeholder="Enter titulo">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Descrição</label>
                                                        <textarea class="form-control input-lg" name="content_cat" rows="5" placeholder="Enter conteudo"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Categoria</label>
                                                        <select class="form-control input-lg" name="parent_cat">
                                                            <option value="">Esta Categoria é uma seção</option>
                                                            <?php
                                                            if (!empty($listCatg)) {
                                                                foreach ($listCatg as $categoria) {
                                                                    extract($categoria);
                                                                    ?>
                                                                    <option value="<?= $id_categoria; ?>"><?= $title_categoria; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Autor</label>
                                                        <select class="form-control input-lg" name="autor_cat">
                                                            <option value="<?= $_SESSION['userlogin']['nome_user']; ?>"> <?= "{$_SESSION['userlogin']['nome_user']} {$_SESSION['userlogin']['sobrenome_user']}"; ?> </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Permissão</label>
                                                        <select class="form-control input-lg" name="permissao_cat">
                                                            <?php foreach ($grup_List as $g):

                                                                echo '<option value="'.$g['id_grup_permissao'].'"';

                                                                if($listUserinfo['id_grup_permissao'] === $g['id_grup_permissao']){
                                                                    echo ' selected="selected"';
                                                                }
                                                                if($listUserinfo['id_grup_permissao'] !== $g['id_grup_permissao'] && $listUserinfo['id_grup_permissao'] !== 1 ){
                                                                    echo ' readonly="readonly" disabled="true"';
                                                                }
                                                                echo '> '.$g['nome_grup_permissao'].'</option>';

                                                            endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="box-footer clearfix">
                                                        <div class="col-xs-12">
                                                            <button value="Cadastrar" class="btn btn-primary btn-lg pull-right"><i class="fa "></i> Cadastrar Categoria</button>
                                                            <a href="<?= BASEADMIN ?>category" type="button" class="btn btn-primary btn-lg pull-right"
                                                               style="margin-right: 5px;"> <i class="fa fa-mail-reply-all"></i> voltar</a>
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
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Cadastrando Categorias e SubCategorias.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
