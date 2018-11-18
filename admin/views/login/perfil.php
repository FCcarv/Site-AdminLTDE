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
        <li><a href="<?=BASEADMIN?>users/add/"><i class="fa fa-user-plus"></i> Cadastrar Usuários</a></li>
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
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <div class="box-header with-border">
                                <h4 class="pull-left margin"><i class="fa fa-smile-o"></i> Olá <b> <?=$infoUS['nome_user'] .' '. $infoUS['sobrenome_user'];?></b> seja bem vindo(a)
                                    <i class="fa fa-thumbs-o-up"></i></h4>
                            </div>
                            <br>
                            <br>
                            <div class="box-body">
                                <aside class="col-md-4">
                                    <div class="box-body box-profile">
                                        <form  class="form" method="Post" enctype="multipart/form-data" id="users/editFotosPerfil"/>
                                            <div class="widget-user-header bg-default">
                                                <div class="widget-user-image ft-user">
                                                    <?php
                                                    if(!empty($infoUS['foto_user'])):?>
                                                        <img class="img-circle" src="<?= BASEADMIN ?>/assets/img/ft-perfil/<?=$infoUS['foto_user'];?>" width="180" />
                                                    <?php else:?>
                                                        <img class="img-circle" src="<?= BASEADMIN ?>/assets/img/ft-perfil/user1-128x128.png" alt="User profile picture"width="180">
                                                    <?php endif;
                                                    ?>
                                                </div>
                                                <!-- /.widget-user-image -->
                                                <div class="nome-pf">
                                                    <h3 class="nome-us"><?=$infoUS['nome_user'] .' '.$infoUS['sobrenome_user'];?></h3>
                                                </div>
                                                <div class="box-body">
                                                    <input type="file"  name="ftos_us[]" id="ftos">
                                                    <input type="hidden" name="id_us" value="<?=$infoUS['id_user'];?>">
                                                </div>
                                                <button value="Atualizar" class="btn btn-sm btn-primary"><i class="fa fa-image"></i>&nbsp;Atualizar Foto</button>
                                            </div>
                                        </form>
                                    </div>
                                </aside>
                                <div class="col-md-6">
                                    <div class="nav-tabs-custom ">
                                        <div class="tab-pane">
                                            <form  class="form" method="Post" id="users/pefilEdit">
                                                <div class="form-group">
                                                    <label for="nome">Nome</label>
                                                    <input class="form-control input-lg" type="text" name="nome_us" value="<?=$infoUS['nome_user'];?>" placeholder="Enter nome">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sobrenome">Sobrenome</label>
                                                    <input class="form-control input-lg" type="text" name="sobrenome_us"value="<?=$infoUS['sobrenome_user'];?>" placeholder="Enter sobrenome">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input class="form-control input-lg" type="text" value="<?=$infoUS['email_user'];?>" disabled/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="senha">Password</label>
                                                    <input type="password" class="form-control input-lg" name="pass_us" placeholder="Password" >
                                                    <input type="hidden" name="id_us" value="<?=$infoUS['id_user'];?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="grup_us">Grupos de Permissão</label>
                                                    <select class="form-control input-lg " name="grup_us" id="grup_user" required>
                                                        <?php foreach($grup_List as $g):
                                                            if ($g['id_grup_permissao']==$infoUS['id_grup_permissao'] && $g['id_grup_permissao'] == 1) {?>
                                                                <option <?=($g['id_grup_permissao']==$infoUS['id_grup_permissao'])?'selected="selected"':''; ?> value="<?=$g['id_grup_permissao'];?>">
                                                                    <?=$g['nome_grup_permissao'];?></option>

                                                            <?php }else{?>

                                                                <option <?=($g['id_grup_permissao']==$infoUS['id_grup_permissao'])?'selected="selected"':''; ?> value="<?=$g['id_grup_permissao'];?>" disabled="<?=$g['id_grup_permissao'];?>">
                                                                    <?=$g['nome_grup_permissao'];?></option>

                                                            <?php }
                                                        endforeach;?>
                                                    </select>
                                                </div>
                                                <!-- /.box-body -->
                                                <div class="box-footer clearfix">
                                                    <div class="col-xs-12">
                                                        <button value="Atualizar" class="btn btn-primary btn-lg pull-right"><i class="fa "></i>Atualizar</button>
                                                        <a href="<?= BASEADMIN ?>users" type="button" class="btn btn-primary btn-lg pull-right"
                                                           style="margin-right: 5px;"> <i class="fa fa-mail-reply-all"></i> voltar</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                   <b> <?=$infoUS['nome_user'] .' '. $infoUS['sobrenome_user'];?></b> fique à vontade para atualizar o seu perfil!!
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
