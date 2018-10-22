<main class="content">
    <h1>
        Grupos de Permissões / Editar
    </h1>
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <h1></h1>
            <!-- general form elements disabled -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Somente admin </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form role="form" method="POST" id="permissao/edit_grup">
                        <div class="form-group has-success">
                            <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Acessos
                                pertinentes</label>
                            <input type="text" class="form-control" name="nome_edit_Gp" value="<?=$grup_info['nome_grup_permissao']?>"
                                   placeholder="Entre  com o grupo...">
                        </div>
                        <h3 class="box-title">Permissoẽs </h3>
                        <?php foreach ($permissions_list as $p): ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="permissions[]" value="<?=$p['id_param_permissao'];?>"<?=(in_array($p['id_param_permissao'], $grup_info['params_grup_permissao']))?'checked="checked"':'';?>/>
                                    <?=$p['nome_param_permissao'];?>
                                </label>
                            </div>
                        <?php endforeach;?>
                        <button class="btn btn-success btn-flat"><i class="fa"></i>Editar Grupo</button>
                    </form>



                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
</main>

