<div class="row">
    <div class="col-md-12">
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="page-header"> 
                        <i class="fa fa-globe"></i> Atualizar Categoria
                    </h2>
                </div>
               
                <div class="box-body">
                    <div class="col-md-7 col-xs-offset-4 col-xs-offset-3">
                        <div class="nav-tabs-custom ">
                            <div class="tab-pane">
                                <form class="form" method="post" id="category/editarCateg">
                                    <div class="box-body">
                                     
                                        <div class="form-group">
                                            <label for="nome">Titulo</label>
                                            <input type="text" class="form-control input-lg"  name="title_cat" 
                                                   value="<?= (isset($editCat['title_categoria'])) ? $editCat['title_categoria'] : '' ?>"/>
                                            <input type="hidden" name="id_cat" value="<?=$editCat['id_categoria'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <textarea class="form-control input-lg" name="content_cat" rows="5" ><?=$editCat['content_categoria'];; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Categorias e SubCategorias </label>
                                            <select class="form-control input-lg" name="parent_cat">
                                                <option value="">Esta Categoria é uma seção</option>
                                                <?php
                                             if (!empty($listCatg)) {
                                                    foreach ($listCatg as $categoria) {
                                                        extract($categoria);
                                                    ?>
                                                    <option value="<?= $id_categoria; ?>" <?= (isset($editCat['parent_categoria']) && $editCat['parent_categoria'] == $id_categoria) ? 'selected' : '' ?>><?= $title_categoria; ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        <div class="box-footer clearfix">
                                            <div class="col-xs-12">
                                                <button value="Atualizar" class="btn btn-primary btn-lg pull-right"><i class="fa "></i> Atualizar Categoria</button>
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
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
</div>


