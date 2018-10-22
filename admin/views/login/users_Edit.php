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
                            <form  class="form" method="Post" enctype="multipart/form-data" id="users/editFotos"/>
                                <div class="widget-user-header bg-blue">
                                    <div class="widget-user-image ft-user">
                                        <?php if(!empty($user_info['foto_user'])):?>
                                            <img class="img-circle" src="../../assets/img/ft-perfil/<?=$user_info['foto_user'];?>" width="180" />
                                        <?php else:?>
                                            <img class="img-circle" src="../../assets/img/ft-perfil/user1-128x128.png" alt="User profile picture"width="180">
                                        <?php endif;?>
                                    </div>
                                    <!-- /.widget-user-image -->
                                    <div class="nome-pf">
                                        <h3 class="nome-us"><?=$user_info['nome_user'] .' '.$user_info['sobrenome_user'];?></h3>
                                    </div>
                                    <div class="box-body">
                                        <label for="ftos">Foto de Perfil</label>
                                        <input type="file"  name="ftos_us[]" id="ftos">
                                        <input type="hidden" name="id_us" value="<?=$user_info['id_user'];?>">
                                    </div>
                                    <button value="Atualizar" class="btn btn-primary btn-lg"><i class="fa "></i>Atualizar Foto</button>
                                </div>
                            </form>
                        </div>
                    </aside>
                    <div class="col-md-8">
                        <div class="nav-tabs-custom ">
                            <div class="tab-pane">
                                <form  class="form" method="Post" id="users/edit">
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
<!--                                            <input type="hidden" name="pass_us" value="--><?//=$user_info['pass_user'];?><!--">-->
                                            <input type="hidden" name="id_us" value="<?=$user_info['id_user'];?>">
                                        </div>
                                        <!-- select -->
                                        <div class="form-group">
                                            <label for="grup_us">Grupos de Permissão</label>
                                            <select class="form-control input-lg " name="grup_us" id="grup_user" required>
                                            <?php foreach($grup_List as $g):?>
                                            <option <?=($g['id_grup_permissao']==$user_info['id_grup_permissao'])?'selected="selected"':''; ?> value="<?=$g['id_grup_permissao'];?>">
                                                <?=$g['nome_grup_permissao'];?></option>
                                             <?php endforeach;?>
                                            </select>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer clearfix">
                                            <div class="col-xs-12">
                                                <button value="Atualizar" class="btn btn-primary btn-lg pull-right"><i class="fa "></i>Atualizar</button>
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

