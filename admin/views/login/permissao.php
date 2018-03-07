<div class="row">
    <div class="col-md-12">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Restrição de Usuário por Grupo</h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab"><h3>Permissoẽs dos Usuários</h3></a></li>
                    <li><a href="#tab_2" data-toggle="tab"><h3>Grupos de Permissoẽs</h3></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <a href="<?=BASEADMIN?>permissao/add/" class="btn bg-olive btn-flat margin"><i class="fa fa-edit"></i>Adicionar Permissões</a>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Nome</th>
                                                <th>Ações</th>
                                            </tr>
                                            <?php foreach ($permissions_list as $p): ?>
                                            <tr>
                                                <td><h4><?=$p['nome_param_permissao'];?></h4></td>
                                                <td> <a class="btn btn-danger" href="<?=BASEADMIN?>permissao/delete/<?=$p['id_param_permissao'];?>" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-edit"></i>Excluir</a></td>
                                            </tr>
                                            <?php endforeach;?>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-body table-responsive no-padding">
                                        <a href="<?=BASEADMIN?>permissao/add_grup/" class="btn bg-olive btn-flat margin"><i class="fa fa-edit"></i>Adicionar Grupo</a>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Nome</th>
                                                <th>Ações</th>
                                            </tr>
                                            <?php foreach ($permissions_grups_list as $g): ?>
                                                <tr>
                                                    <td><h4><?=$g['nome_grup_permissao'];?></h4></td>
                                                    <td> <a class="btn btn-warning" href="<?=BASEADMIN?>permissao/edit_grup/<?=$g['id_grup_permissao'];?>"><i class="fa fa-edit"></i>Editar</a>
                                                    <a class="btn btn-danger" href="<?=BASEADMIN?>permissao/delete_Grup/<?=$g['id_grup_permissao'];?>" onclick="return confirm('Tem certeza que deseja excluir?')"><i class="fa fa-edit"></i>Excluir</a></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </table>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.tab-content -->
        </section>
        <!-- /.content -->
    </div>
    <!-- nav-tabs-custom -->
</div>
<!-- /.col -->











