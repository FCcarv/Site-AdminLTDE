<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-users"></i>&nbsp;USUÁRIOS
        <small>& ALL SYSTEM</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">USUÁRIOS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>users/add/"><i class="fa fa-user-plus"></i>Cadastrar Usuários</a></li>
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
                    <h2><i class="fa fa-list-ul"></i>&nbsp;<strong>Usuários</strong></h2>
                </div>
                 <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Foto</th>
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
                                            <td>
                                                <?php
                                                if(!empty($us['foto_user'])):?>
                                                    <img class="img-responsive" title="Photo-Usuario-<?=$us['nome_user']?>" src="<?= BASE . 'tim.php?src=admin/assets/img/ft-perfil/' . $us['foto_user'] . '&w=80&h=80'?>" alt="Photo-Usuario-<?=$us['nome_user']?>">
                                                <?php else:?>
                                                    <img title="Photo-Usuario-default" src="<?=BASEADMIN?>/assets/img/ft-perfil/user1-128x128.png" alt="Photo-Usuario-default" with="80" height="80"/>
                                                <?php endif; ?>
                                            </td>
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
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                   Listando usuários cadastrados no sistema.
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
