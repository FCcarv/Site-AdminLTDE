<div class="row">
    <div class="col-md-12">
        <section class="content">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> Editar Usuários
                    </h2>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <aside class="col-md-3">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="../assets/dist/img/user2-160x160.jpg " alt="User profile picture">

                            <h3 class="profile-username text-center">Nina Mcintire</h3>

                            <p class="text-muted text-center">Software Engineer</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="pull-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="pull-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="pull-right">13,287</a>
                                </li>
                            </ul>
                            <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                        </div>
                    </aside>
                    <div class="col-md-9">
                        <div class="nav-tabs-custom ">
                            <div class="tab-pane">
                                <form method="post">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input class="form-control input-lg" type="text" name="nome_us" value="<?=$user_info['nome_user'];?>" placeholder="Enter nome">
                                        </div>
                                        <div class="form-group">
                                            <label for="sobrenome">Sobrenome</label>
                                            <input class="form-control input-lg" type="text" name="sobrenome_us"value="<?=$user_info['sobrenome_user'];?>" placeholder="Enter sobrenome">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control input-lg" type="text" value="<?=$user_info['email_user'];?>" disabled/>
                                        </div>
                                        <div class="form-group">
                                            <label for="senha">Password</label>
                                            <input type="password" class="form-control input-lg" name="pass_us" placeholder="Password" >
                                        </div>
                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="grup_us">Grupos de Permissão</label>
                                            <select class="form-control input-lg " name="grup_us" id="grup_us" required>
                                            <?php foreach($grup_List as $g):?>
                                            <option <?=($g['id_grup_permissao']==$user_info['id_grup_permissao'])?'selected="selected"':''; ?> value="<?=$g['id_grup_permissao'];?>">
                                                <?=$g['nome_grup_permissao'];?></option>
                                             <?php endforeach;?>
                                            </select>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix">
                                            <div class="col-xs-12">
                                                <button type="submit" value="Atualizar" class="btn btn-primary btn-lg pull-right"><i class="fa fa-user-secret"></i>Atualizar</button>
                                                <a href="<?= BASEADMIN ?>users" type="button" class="btn btn-primary btn-lg pull-right"
                                                   style="margin-right: 5px;"> <i class="fa-fast-forward"></i> voltar</a>
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

