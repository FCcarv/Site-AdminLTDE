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
                    <div class="upload_progress none"
                         style="padding: 5px; background: #00B594; color: #fff; width: 0%; text-align: center; max-width: 100%;">
                        0%
                    </div>
                    <div style="overflow: auto; max-height: 300px;">
                        <img class="image image_default" alt="Nova Imagem" title="Nova Imagem"
                             src="<?= BASE . 'tim.php?src=admin/assets/img/no_image.jpg&w=500&h=300' ?>"/>
                    </div>
                    <div class="Control_imageupload_action">
                        <input class="loadimage" type="file" name="image" required/>
                        <span class="Control_imageupload_close Btn btn_red  fa fa-ban" id="post_control"
                              style="margin-right: 8px;"> Fechar</span>
                        <button class="Btn btn_green fa fa-check-circle-o"> Enviar e Inserir!</button>
                        <img class="form_load none" alt="Enviando Requisição!" title="Enviando Requisição!"
                             src="../../assets/dist/img/load.gif"/>
                    </div>
                    <div class="clear"></div>
                </form>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="form" method="post" enctype="multipart/form-data" id="post/edit">

                        <div class="col-md-8">
                            </br>
                            <?php
                            if (!empty($PostList)){
                                    foreach ($PostList as $post){
                                    extract($post);?>

                            <div class="form-group"><!--ID POST-->
                              <input type="hidden"  name="id_post" value="<?=$id_post?>">
                            </div>
                            <div class="form-group">

                                <label for="capa">Enviar Capa</label>
                                <input type="file" class="loadimage" name="cap_post">
                            </div>
                            </br>
                            <div class="form-group">
                                <input type="text" class="form-control input-lg title_exist" name="title_exist" value="0">
                                <label for="nome">Titulo</label>
                                <input type="text" class="form-control input-lg title_post" data-controller="post/postExist/" name="title_post"
                                       value="<?= $title_post ?>">
                            </div>
                            <div class="form-group"><!--id input hidden-->
                                <input type="hidden" class="form-control input-lg status" name="status_post"
                                       value="<?= $status_post ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="nome">Subtitulo</label>
                                <input type="text" class="form-control input-lg" name="subtitle_post"
                                       value="<?= $subtitle_post ?>">
                            </div>
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control input-lg myTexarea" name="content_post" rows="10"
                                         placeholder="Enter conteudo"><?= $content_post ?></textarea>
                            </div>
                            <div class="gbform">
                                <label for="gall">Galeria</label>
                                <input type="file" id="gallary" name="gall_post[]" multiple>
                                <br/>
                                <div class="right ">
                                    <?php
                                    //MOSTRA A GALLERY
                                    if (!empty($GalleryList)):
                                        foreach ($GalleryList as $Image):
                                            $ImageUrl = BASE . 'tim.php?src=uploads/' . $Image['image_gallery'] . '&w=190&h=125';
                                            echo "<img rel='post/excluiGallery' class='img-responsive thumb_small pdt_single_image remove' id='{$Image['id_gallery']}' alt='Imagem em {$post['title_post']}' title='Imagem em {$post['title_post']}' src='{$ImageUrl}'/>";
                                        endforeach;

                                    endif;?>
                                </div>
                            </div>
                        </div><!-- /.FIM col-md-8 -->
                        <div class="col-md-4">
                            <div class="box-body">
                                   <div class="form-group">
                                    <label>Categoria</label>
                                    <select class="form-control input-lg select_pai" name="subcat_post">
                                        <option value="">selecione a categoria:</option>
                                        <?php //Na tabela de Posts
                                        if (!empty($listCat_Subc)) { //variavel $Cat ==   cat_parent_post ->categoria mãe
                                            foreach ($listCat_Subc as $cat) {
                                                echo "<option disabled=\"disabled\"value=\"\" data-p=\"{$cat['id_categoria']}\"><strong>{$cat['title_categoria']}</strong></option>";


                                                if (!empty($cat['sub_categoria'])) {//tendo assim resultados
                                                    foreach ($cat['sub_categoria'] as $Sub) { //variavel $Sub == categoria_post subcategoria ->categoria filha
                                                        //vamos manter os dados no campo option
                                                        echo "<option value=\"{$Sub['id_categoria']}\" ";

                                                        if ($Sub['id_categoria'] == $categoria_post) {
                                                            echo ' selected="selected" ';
                                                        }
                                                        echo "value=\"{$Sub['id_categoria']}\" data-p=\"{$cat['id_categoria']}\">&raquo;&raquo; {$Sub['title_categoria']}</option>";
                                                    }

                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <br/>
                                <div>
                                    <!-- campo tb categorias Parent Cat input hidden-->
                                    <input type="hidden" class="form-control input-lg cat_pai" name="Catparent_post"
                                           value="<?=$cat['id_categoria']?>"/>
                                </div>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label>Autor</label>
                                    <input type="text" class="form-control input-lg" name="autor_post"
                                           value="<?= ($_SESSION['userlogin']['nome_user'] == $autor_post) ? $autor_post : '' ?>"/>
                                </div>
                                <br/>
                                <br/>
                                <br/>
                                <div class="form-group">
                                    <label>Permissão</label>
                                    <select class="form-control input-lg" name="permissao_post">
                                        <?php foreach ($grup_List as $g):
                                            if ($g['id_grup_permissao'] == $post['permissao_post'] && $g['id_grup_permissao'] == 1) { ?>
                                                <option <?= ($g['id_grup_permissao'] == $post['autor_post']) ? 'selected="selected"' : ''; ?>
                                                        value="<?= $g['id_grup_permissao']; ?>">
                                                    <?= $g['nome_grup_permissao']; ?></option>

                                            <?php } else { ?>

                                                <option <?= ($g['id_grup_permissao'] == $post['permissao_post']) ? 'selected="selected"' : ''; ?>
                                                        value="<?= $g['id_grup_permissao']; ?>"
                                                        disabled="<?= $g['id_grup_permissao']; ?>">
                                                    <?= $g['nome_grup_permissao']; ?></option>
                                            <?php }
                                        endforeach; ?>
                                    </select>
                                </div>
                            </div><!-- /.box-body -->
                            <?php }
                            } ?>
                            </br>
                            </br>

                            <div class="box-footer clearfix" >
                                <button type="submit" value="Cadastrar" id="idcad"
                                        class="btn btn-success btn-lg cadPub"
                                        data-controller="post/add/"><i class="fa "></i>Atualizar &
                                    Publicar
                                </button>
                                <button type="submit" value="Cadastrar" id="idcad2"
                                        class="btn btn-primary btn-lg cad"
                                        data-controller="post/add/"><i class="fa "></i>Atualizar
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

