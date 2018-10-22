<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-globe"></i> POSTAGENS
        <small> & Mídias</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>post/">Postagens</a></li>
        <li class="active">POSTS</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h2 class="box-title">Área administrativa</h2>
        </div>
        <div class="Control_imageupload none" id="post_control">
            <div class="Control_imageupload_content">
                <form name="Control_post_upload" action="" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="post_id" value=""/>
                    <div class="upload_progress none" style="padding: 5px; background: #00B594; color: #fff; width: 0%; text-align: center; max-width: 100%;">0%</div>
                    <div style="overflow: auto; max-height: 300px;">
                        <img class="image image_default" alt="Nova Imagem" title="Nova Imagem" src="<?=BASE.'tim.php?src=admin/assets/img/no_image.jpg&w=500&h=300'?>"/>
                    </div>
                    <div class="Control_imageupload_action">
                        <input class="loadimage" type="file" name="image" required/>
                        <span class="Control_imageupload_close Btn btn_red  fa fa-ban" id="post_control" style="margin-right: 8px;"> Fechar</span>
                        <button class="Btn btn_green fa fa-check-circle-o"> Enviar e Inserir!</button>
                        <img class="form_load none"  alt="Enviando Requisição!" title="Enviando Requisição!" src="../../assets/dist/img/load.gif"/>
                    </div>
                    <div class="clear"></div>
                </form>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="post" enctype="multipart/form-data" id="post/createPost">
                         <div class="col-md-8">

                          </br>
                            <div class="form-group">
                                <label for="capa">Enviar Capa</label>
                                <input type="file" id="capa" name="cap_post">
                            </div>
                            </br>
                            <div class="form-group">
                                <label for="nome">Titulo</label>
                                <input type="text" class="form-control input-lg" name="title_post"
                                       placeholder="Enter titulo" required />
                            </div>
                            <div class="form-group"><!--id input hidden-->
                                <input type="hidden" class="form-control input-lg status" name="status_post"
                                       placeholder="Enter titulo" value="0"/>
                            </div>
                            <div class="form-group">
                                <label for="nome">Subtitulo</label>
                                <input type="text" class="form-control input-lg" name="subtitle_post"
                                       placeholder="Enter titulo" required />
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control input-lg myTexarea" name="content_post"
                                          rows="10" placeholder="Enter conteudo"></textarea>
                            </div>
                            <div class="gbform">
                                 <label for="gall">Galeria</label>
                                 <input type="file" id="gallary" name="gall_post[]" multiple>
                            </div>
                        </div><!-- /.FIM col-md-8 -->
                        <div class="col-md-4">
                            <div class="box-body">
                               <!-- <div class="box-tools">
                                    <img class="img-responsive cap_post" src="../../assets/img/no_image.jpg" width="400" title="Photo Capa" alt="Photo Capa" default="../../assets/img/no_image.jpg" >
                                </div>
                                <br/>-->

                                <br/>
                                 <div class="form-group">
                                    <label>Categoria</label>
                                    <select class="form-control input-lg select_pai" name="subcat_post" required>
                                        <option value="">Selecione a Subcategoria:</option>
                                        <?php
                                        if (!empty($listCat_Subc)) {
                                            foreach ($listCat_Subc as $cat) {
                                                echo "<option disabled=\"disabled\"value=\"\"  data-p=\"{$cat['id_categoria']}\"><strong>{$cat['title_categoria']}</strong></option>";

                                                //ler as categorias pra selecionar
                                                //e abaixo pegando só as categorias filhas de acordo com a seleção. //E se ler vai ser exibido senão nao exibe
                                                if (!empty($cat['sub_categoria'])) {//tendo assim resultados
                                                    foreach ($cat['sub_categoria'] as $Sub) {
                                                        //vamos manter os dados no campo option
                                                        echo "<option value=\"{$Sub['id_categoria']}\" data-p=\"{$cat['id_categoria']}\">&raquo;&raquo; {$Sub['title_categoria']}</option>";

                                                    }
                                                }
                                            }
                                        } ?>

                                    </select>
                                </div>
                                <div>
                                    <!-- campo tb categorias Parent Cat input hidden-->
                                    <input type="hidden" class="form-control input-lg cat_pai" name="Catparent_post" value=""/>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label>Autor</label>
                                    <select class="form-control input-lg" name="autor_post">
                                        <option value="<?= $_SESSION['userlogin']['nome_user']; ?>"> <?= "{$_SESSION['userlogin']['nome_user']} {$_SESSION['userlogin']['sobrenome_user']}"; ?> </option>
                                    </select>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label>Permissão</label>
                                    <select class="form-control input-lg" name="permissao_post">
                                        <?php foreach ($grup_List as $g):
                                            if ($g['id_grup_permissao'] == $listUserinfo['id_grup_permissao'] && $g['id_grup_permissao'] == 1) { ?>
                                                <option <?= ($g['id_grup_permissao'] == $listUserinfo['id_grup_permissao']) ? 'selected="selected"' : ''; ?>
                                                        value="<?= $g['id_grup_permissao']; ?>">
                                                    <?= $g['nome_grup_permissao']; ?></option>

                                            <?php } else {
                                                ?>

                                                <option <?= ($g['id_grup_permissao'] == $listUserinfo['id_grup_permissao']) ? 'selected="selected"' : ''; ?>
                                                        value="<?= $g['id_grup_permissao']; ?>"
                                                        disabled="<?= $g['id_grup_permissao']; ?>">
                                                    <?= $g['nome_grup_permissao']; ?></option>
                                            <?php }
                                        endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- /.box-body -->
                            </br>
                            <div class="box-footer clearfix">
                                <button type="submit" value="Cadastrar" id="idcad"
                                        class="btn btn-success btn-lg cadPub"
                                        data-controller="post/add/"><i class="fa "></i>Cadastrar &
                                    Publicar
                                </button>
                                <button type="submit" value="Cadastrar" id="idcad2"
                                        class="btn btn-primary btn-lg cad"
                                        data-controller="post/add/"><i class="fa "></i>Cadastrar
                                </button>
                            </div>
                        </div><!-- /.FIM col-md-4 -->
                    </form>
                </div> <!-- /.FIM col-md-12 -->
            </div>  <!-- /.row -->
        </div>  <!-- /.box-body -->
    </div>  <!-- /.box-body -->
</section>
<!-- /.content -->

