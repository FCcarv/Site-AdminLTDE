<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-globe"></i>&nbsp; POSTAGENS
        <small> & Mídias</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">CADASTRAR ARTIGOS</li>
        <li><a href="<?= BASEADMIN ?>home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?= BASEADMIN ?>post/"><i class="fa fa-list-ul"></i>Lista de Artigos</a></li>
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
                <div class="col-md-offset-1 box-header with-border">
                    <h3><i class="fa fa-sign-out"></i>&nbsp;<strong>Cadastrar</strong></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
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
                                                            <option value="<?= $_SESSION['userlogin']['nome_user']; ?>"><?= "{$_SESSION['userlogin']['nome_user']} {$_SESSION['userlogin']['sobrenome_user']}"; ?> </option>
                                                        </select>
                                                    </div>
                                                    <br/>
                                                    <br/>
                                                    <div class="form-group">
                                                        <label>Permissão</label>
                                                        <select class="form-control input-lg" name="permissao_post">
                                                            <?php foreach ($grup_List as $g):

                                                                echo '<option value="'.$g['id_grup_permissao'].'"';

                                                                if($listUserinfo['id_grup_permissao'] == $g['id_grup_permissao'] && $listUserinfo['id_grup_permissao'] === 1){
                                                                    echo 'selected="selected"';
                                                                }
                                                                if($listUserinfo['id_grup_permissao'] !== $g['id_grup_permissao'] && $listUserinfo['id_grup_permissao'] !== 1 ){
                                                                    echo 'readonly="readonly" disabled="true"';
                                                                }
                                                                echo '> '.$g['nome_grup_permissao'].'</option>';

                                                            endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div><!-- /.box-body -->
                                                </br>
                                                <div class="box-footer clearfix">
                                                    <button type="submit" value="Cadastrar" id="idcad"
                                                            class="btn btn-success btn-lg cadPub"
                                                            data-controller="post/add/"><i class="fa "></i>Cadastrar & Publicar
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
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Cadastrando Artigos.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
