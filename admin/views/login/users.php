<div class="row">
    <div class="col-md-12">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-primary">
                <div class="box-header with-border">


                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Área dos Usuários.
                    </h2>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Email</th>
                                <th>Data Registro</th>
                                <th>Grupo</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <?php foreach ($users_list as $us): ?>
                            <tbody>
                            <tr>
                                <td><h4><?= $us['nome_user']; ?></h4></td>
                                <td><h4><?= $us['sobrenome_user']; ?></h4></td>
                                <td><h4><?= $us['email_user']; ?></h4></td>
                                <td><h4><?= date("d-m-y", strtotime($us['registro_user'])); ?></h4></td>
                                <td><h4><?= $us['nome_grup_permissao']; ?></h4></td>
                                <td>
                                    <a href="<?= BASEADMIN ?>users/editUs/<?= $us['id_user']; ?>"><span
                                                class=" btn btn-warning glyphicon glyphicon-edit"> Editar</span></a>
                                    <a href="<?= BASEADMIN ?>users/delete/<?= $us['id_user']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                                        <span class="btn btn-danger glyphicon glyphicon-trash"> Excluir</span></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="col-xs-12">
                        <a href="<?= BASEADMIN ?>users/add" type="button" class="btn btn-primary btn-lg pull-right"
                           style="margin-right: 5px;"> <i class="fa fa-user-plus"></i> Adicionar Usuários</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
        </section>
    </div>
    <!-- /.box -->
</div>