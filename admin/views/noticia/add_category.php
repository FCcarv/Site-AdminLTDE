<div class="row">
    <div class="col-md-12">
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i>Cadastrar Categoria
                    </h2>
                </div>
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
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix">
                                            <div class="col-xs-12">
                                                <button value="Cadastrar" class="btn btn-primary btn-lg pull-right"><i class="fa "></i> Cadastrar Categoria</button>
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

