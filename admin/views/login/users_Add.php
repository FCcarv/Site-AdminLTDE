<div class="row">
    <div class="col-md-12">
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Cadastrar Usuários
                        <small class="pull-right">Date: 2/10/2014</small>
                    </h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-7 col-xs-offset-4 col-xs-offset-3">
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
