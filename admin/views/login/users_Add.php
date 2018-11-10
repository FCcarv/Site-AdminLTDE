<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-users"></i>&nbsp;USUÁRIOS
        <small>& ALL SYSTEM</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">USUÁRIOS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>users/"><i class="fa fa-users"></i>Listar Usuários</a></li>
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
                <div class="box-body">
                    <div class="col-md-offset-2 col-md-11">
                        <div class="row">
                            <div class="box-header with-border">
                                <h2 class="page-header">
                                    <i class="fa fa-user-plus"></i> Cadastrar Usuários
                                </h2>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-offset-1 col-md-8">
                                    <div class="nav-tabs-custom ">
                                        <div class="tab-pane">
                                            <form class="form" method="post" id="users/insertUser">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="nome">Nome</label>
                                                        <input class="form-control input-lg" type="text" name="nome_us" placeholder="Enter nome">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sobrenome">Sobrenome</label>
                                                        <input class="form-control input-lg" type="text" name="sobrenome_us" placeholder="Enter sobrenome">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input class="form-control input-lg" type="text" name="email_us" placeholder="Enter email"
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="senha">Password</label>
                                                        <input type="password" class="form-control input-lg" name="pass_us" placeholder="Password" >
                                                    </div>
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label for="grup_us">Grupos de Permissão</label>
                                                        <select class="form-control input-lg" name="grup_us" id="grup_us">
                                                            <?php foreach($grup_List as $g): ?>
                                                                <option value="<?=$g['id_grup_permissao'];?>"><?=$g['nome_grup_permissao'];?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="box-footer clearfix">
                                                        <div class="col-xs-12">
                                                            <button value="Cadastrar" class="btn btn-primary btn-lg pull-right"><i class="fa"></i>Cadastrar</button>
                                                            <a href="<?= BASEADMIN ?>users" type="button" class="btn btn-primary btn-lg pull-right"
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
                        <!-- /row -->

                    </div>
                </div>
                <div class="box-footer">
                    Cadastrando usuários no sistema!!
                </div>
                <!-- /.box-footer-->
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</section>
