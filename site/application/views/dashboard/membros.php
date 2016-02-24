<div class="col-md-9">
    <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modalNewEdit">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        Adicionar Novo
    </button>
    <h1>Membros</h1>
    <hr>
    <table id="tabela-membros" class="table table-hover">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ativo</th>
                <th>Admin</th>
                <th>Remover</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($membros as $membro) { ?>
                <tr data-id="<?php echo $membro->getId(); ?>">
                    <td>
                        <img alt="..." class="img-responsive dashboard-img-membro-tabela" src="<?php if ($membro->getFoto() != NULL) echo stream_get_contents($membro->getFoto()); ?>"  />
                    </td>
                    <td class="text-center name"><?php echo $membro->getNome(); ?></td>
                    <td class="text-center"><?php echo $membro->getEmail(); ?></td>
                    <td class="text-center"><?php echo $membro->getTipo(); ?></td>
                    <td class="text-center">
                        <div class="checkbox">
                            <label>
                                <?php if ($membro->getAtivo()) { ?>
                                    <input disabled="" checked="" type="checkbox">
                                <?php } else { ?>
                                    <input disabled="" type="checkbox">
                                <?php }
                                ?>

                            </label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="checkbox">
                            <label>
                                <?php if ($membro->getAdmin()) { ?>
                                    <input disabled="" checked="" type="checkbox">
                                <?php } else { ?>
                                    <input disabled="" type="checkbox">
                                <?php }
                                ?>
                            </label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                Ação&nbsp;&nbsp;&nbsp; <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a class="editar" href="#" data-toggle="modal" data-target="#modalNewEdit">
                                        <span class="glyphicon glyphicon-pencil"></span> Editar
                                    </a>
                                </li>
                                <li>
                                    <a class="remover" href="#" data-toggle="modal" data-target="#modalRemover">
                                        <span class="glyphicon glyphicon-remove-circle"></span> Excluir
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Modal Alterar Cadastrar -->
<div class="modal fade" id="modalNewEdit" tabindex="-1" role="dialog" aria-labelledby="modalNewEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Novo Membro</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <input style="display: none" type="file" id="input-foto" onchange="previewFile('foto', 'input-foto')">
                        <img id="foto" src="http://placehold.it/700x300/81326D/ffffff&text=Foto de Usuário" class="img-responsive img-upload" alt="Capa Labarotório" style="height:200px"/>
                        <button id="btn-upload" type="button" class="btn btn-primary btn-block">
                            <i class="fa fa-cloud-upload"></i> Carregar imagem
                        </button>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group has-feedback">
                            <label>Nome:</label>
                            <input id="nome" type="text" class="form-control"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Email:</label>
                            <input id="email" type="text" class="form-control"/>
                        </div>
                        <div class="form-inline">
                            <div class="form-group has-feedback"> 
                                <label>Admin:</label>
                                <label>
                                    <input id="admin" type="checkbox">
                                </label>
                            </div>
                            <div class="form-group has-feedback">
                                <label>Ativo:</label>
                                <label>
                                    <input id='ativo' type="checkbox">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li id="tabelaDados" class="active"><a href="#dados" data-toggle="tab">Dados</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="dados">
                            <div class="col-md-6">
                                <label>Laboratorio:</label>
                                <div class="form-group has-feedback">
                                    <select id="laboratorios" class="form-control">
                                        <option value="0">Selecione um laboratório</option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label>Tipo:</label>
                                    <select id="tipo" class="form-control">
                                        <option value="0">Selecione um tipo</option>
                                        <option value="1">Professor</option>
                                        <option value="2">Pesquisador</option>
                                        <option value="3">Doutorando</option>
                                        <option value="4">Mestrando</option>
                                        <option value="5">Graduando</option>
                                        <option value="5">Administrativo</option> 
                                    </select>
                                </div>
                                <br>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label>Data Entrada:</label>
                                    <input id="entrada" type="text" class="form-control"/>
                                </div>
                                <div class="form-group has-feedback">
                                    <label>Data Saída:</label>
                                    <input id="saida" type="text" class="form-control"/>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnSalvarAlterarNao" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnSalvar" type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Alterar Remover -->
<div class="modal fade" id="modalRemover" tabindex="-1" role="dialog" aria-labelledby="modalRemover" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tem certeza que deseja remover?</h4>
            </div>
            <div class="modal-body">
                <h3 id="nome-membro-remover">Nome do usuário</h3>
            </div>
            <div class="modal-footer">
                <button id="btnNao" type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                <button id="btnRemover" type="button" class="btn btn-danger">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Datatables -->
<link href="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">


<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.js"></script>

<!-- DatePicker --> 
<script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/js/membros.js"></script>

<script>
                            $(document).ready(function () {
                                $('.dashboard-options > li.active').removeClass('active');
                                $('.dashboard-options > li:contains("Membros")').addClass('active');
                            });
                            var js_site_url = function (urlText) {
                                var url = "<?php echo base_url(); ?>" + urlText;
                                return url;
                            }
</script>

