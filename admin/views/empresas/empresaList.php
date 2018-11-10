<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-building-o"></i>&nbsp; Banner Empresas
        <small> & Company</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active">LISTA DE EMPRESAS</li>
        <li><a href="<?=BASEADMIN?>/home/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=BASEADMIN?>empresa/empCad/"><i class="fa fa-sign-out"></i>Cadastrar Empresas</a></li>
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
                    <h2><i class="fa fa-list-ul"></i>&nbsp;<strong>Empresas</strong></h2>
                </div>
                <div class="box-body">
                    <div class="col-md-offset-1 col-md-11">
                        <div class="row">
                            <?php if (!empty($getEmpresa)){
                                foreach ($getEmpresa as $emp):
                                    extract($emp);?>
                                    <div class="col-md-5 crewell margin">
                                        <div class="attachment-block clearfix" >
                                            <div class="col-sm-5 col-md-4 margin">
                                                <img class="img-responsive" src="<?= BASE . 'tim.php?src=uploads/' . $image_cliente_empresa . '&w=173&h=130'?>" alt="Photo-<?=$marca_cliente_empresa?>"></span>
                                                <span class="pull-left product-description"><h5>Registro: <?=date('d/m/y', strtotime($dataReg_cliente_empresa))?></h5></span>
                                            </div>
                                            <div class="col-md-offset-2 product-info">
                                                <a href="javascript:void(0)" class="product-title"><strong><?=$marca_cliente_empresa?></strong></a>
                                                <span class=" pull-right">
                                               <div class="btn-group">
                                                    <a href="<?= BASEADMIN?>home/" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
                                                    <a href="<?= BASEADMIN ?>empresa/EmpEdit/<?=$id_cliente_empresa?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                                    <a href="" class="btn btn-danger btn-xs del " data-controller="empresa/excluiEmp/" id="<?=$id_cliente_empresa?>" onclick="return confirm('Tem certeza que deseja excluir esta Postagem?')"><i class="glyphicon glyphicon-ban-circle"></i></a>
                                                </div>
                                            </span></br>
                                                <span class="product-description"><strong>Contato:</strong> <?=$nome_cliente_empresa?></span></br>
                                                <span class="product-description"><strong>Email:</strong> <?=$email_cliente_empresa?></span></br>
                                                <span class="product-description"><strong>Site:</strong> <?=$link_cliente_empresa?></span></br>
                                                <span class="product-description"><strong>Fone:</strong> <?=$telefone_cliente_empresa?></span></br>
                                                <span class="product-description"><strong>Celular:</strong> <?=$cel_cliente_empresa?></span>
                                            </div>
                                        </div>
                                    </div> <!-- /.item empresa-->
                                <?php
                                endforeach;
                            } else {

                                echo "<div class=\"alert alert-info alert-dismissible\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                                        <h4><i class=\"icon fa fa-info\"></i> Alert!</h4>
                                        <h3>Não há empresas cadastradas</h3><br>
                                        <a href=\"<?=BASEADMIN?>empresas/EmpCad/\">
                                            <i class=\"fa fa-link\"></i>Cadastrar Empresas
                                        </a>
                                    </div>";
                            }?>

                        </div>
                        <!--PAGINAÇÃO -->
                        <div class="row text-center"><!-- /.row -->
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <ul class="pagination">

                                    <?php for ($i=1;$i<=$pgs;$i++):?>

                                        <?php if($pagAtual == $i){ ?>
                                            <li class="paginate_button active">
                                                <a href="<?=BASEADMIN?>empresa/?p=<?=$i;?>" aria-controls="example2" data-dt-idx="0" tabindex="0"><?=$i;?></a>
                                            </li>
                                        <?php }else{?>
                                            <li class="paginate_button ">
                                                <a href="<?=BASEADMIN?>empresa/?p=<?=$i;?>" aria-controls="example2" data-dt-idx="0" tabindex="0"><?=$i;?></a>
                                            </li>
                                            <?php
                                        }
                                    endfor;?>
                                </ul>
                            </div>
                        </div><!-- /.fim paginação -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Empresas Cadastradas sejam bem vindas!!
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </div><!-- /.col-md-12 -->
    </div>
</section>
