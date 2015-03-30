<!-- Datatables -->
<link href="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">


<div class="col-md-9">
    <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modalNewEdit">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        Adicionar Novo
    </button>
    <h1>Projetos</h1>
    <hr>
    <table id="tabela-projetos" class="table table-hover">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Coordenador</th>
                <th>Laboratório</th>
                <th>Data de Início</th>
                <th>Data de Termino</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($projetos as $projeto) { ?>
                <tr data-id="<?php echo $projeto->getId(); ?>">
                    <td>
                        <a href="#">
                            <?php echo $projeto->getNome(); ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $projeto->getCoordenador()->getNome(); ?> 
                    </td>
                    <td>
                        <?php echo $projeto->getLaboratorio()->getSigla(); ?> 
                    </td>
                    <td>
                        <?php   $projeto->getData_inicio() != NULL ? printf($projeto->getData_inicio()->format('d/m/Y')) : printf('Sem data'); ?>
                    </td>
                    <td>
                        <?php $projeto->getData_termino() != NULL ? printf($projeto->getData_termino()->format('d/m/Y')) : printf('Sem data'); ?>
                    </td>
                    <td>
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
    <div class="modal-dialog modal-lg modal-lg-projeto">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Novo Projeto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <input style="display: none" type="file" id="input-capa" onchange="previewFile('capa', 'input-capa')">
                        <img id="capa" src="http://placehold.it/700x300/81326D/ffffff&text=Projeto" class="img-responsive img-upload upload-capa-projeto" alt="Capa Labarotório"/>
                        <button id="btn-upload" type="button" class="btn btn-primary btn-block">
                            <i class="fa fa-cloud-upload"></i> Carregar imagem
                        </button>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group has-feedback">
                            <label>Nome:</label>
                            <input id="nome" type="text" class="form-control" placeholder="Nome do Projeto"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Laboratório:</label>
                            <select id="laboratorios" class="form-control">
                                <option value="0">Selecione um laboratório</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Coordenador:</label>
                            <select id="coordenadores" class="form-control">
                                <option value="0">Selecione um coordenador</option>
                            </select>
                        </div>
                        <div class="form-inline">
                            <div class="form-group has-feedback">
                                <label>Data de Início:</label>
                                <input id="inicio" type="text" class="form-control" data-date-format="dd/mm/yyyy"/>
                            </div>
                            <div class="form-group has-feedback pull-right">
                                <label>Data de Termino:</label>
                                <input id="termino" type="text" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li id="tabelaDados" class="active"><a href="#tab-descricao" data-toggle="tab">Descrição</a></li>
                            <li id="tabelaDados"><a href="#tab-membros" data-toggle="tab">Membros</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-descricao">
                                <div class="col-md-12">
                                    <br>
                                    <textarea  id="descricao" class="form-control" placeholder="Descrição do projeto" rows="6"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-membros">
                                <div class="col-md-12">
                                    <button id="btnModalAddMemebro" class='btn btn-primary pull-right' data-target='#modalAddMembro' data-toggle='modal'>
                                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                                        Adicionar Membro
                                    </button>
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
            <div class="modal-footer">
                <button id="btnNao" type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                <button id="btnRemover" type="button" class="btn btn-danger">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Cadastrar Membro -->
<div class="modal fade" id="modalAddMembro" tabindex="-1" role="dialog" aria-labelledby="modalRemover" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Adicione membros ao projeto</h4>
            </div>
            <div class="modal-body">
                <table id="tabelaMembros" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button id="btnNao" type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                <button id="btnAdicionarMembroProjeto" type="button" class="btn btn-danger">Sim</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/projetos.js"></script>

<script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>



<script>
                            $(document).ready(function () {
                                $('#btnModalAddMemebro').on('click', function () {
                                    $('#modalNewEdit').modal('hide');
                                });
                                $('#modalAddMembro').on('hidden.bs.modal', function () {
                                    $('#modalNewEdit').modal('show');
                                });

                                $('.dashboard-options > li.active').removeClass('active');
                                $('.dashboard-options > li:contains("Projetos")').addClass('active');
                            });

                            var js_site_url = function (urlText) {
                                var url = "<?php echo base_url(); ?>" + urlText;
                                return url;
                            };
</script>

