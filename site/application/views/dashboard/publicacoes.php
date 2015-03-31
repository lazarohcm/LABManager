<!-- Datatables -->
<link href="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

<div class="col-md-9">
    <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modalNewEdit">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        Adicionar Nova
    </button>
    <h1>Publicações</h1>
    <hr>
    <table id="tabela-publicacoes" class="table table-hover">
        <thead>
        <th>Título</th>
        <th>Projeto</th>
        <th>Ações</th>
        </thead>

        <tbody>
            <?php foreach ($publicacoes as $publicacao) { ?>
                <tr data-id="<?php echo $publicacao->getId(); ?>">
                    <td class="td-name">
                        <a href="#"><?php echo $publicacao->getTitulo(); ?></a>
                    </td>
                    <td>
                        <?php echo $publicacao->getProjeto()->getNome(); ?>
                    </td>
                    <td>
                        <div class="dropdown pull-right">
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
                <h4 class="modal-title">Nova Publicação</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <input style="display: none" type="file" id="input-capa" onchange="previewFile('capa', 'input-capa')">
                        <img id="capa" src="http://placehold.it/700x300/81326D/ffffff&text=Publicação" class="img-responsive img-upload upload-capa-projeto" alt="Capa Labarotório"/>
                        <button id="btn-upload" type="button" class="btn btn-primary btn-block">
                            <i class="fa fa-cloud-upload"></i> Carregar imagem
                        </button>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group has-feedback">
                            <label>Título:</label>
                            <input id="titulo" type="text" class="form-control" placeholder="Nome do Projeto"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Projeto:</label>
                            <select id="projetos" class="form-control">
                                <option value="0">Selecione um projeto</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Link Arquivo:</label>
                            <input id="link" type="text" class="form-control" placeholder="Nome do Projeto"/>
                        </div>
                        <div class="form-inline">
                            <div class="form-group has-feedback">
                                <label>Data da Publicação:</label>
                                <input id="data" type="text" class="form-control" data-date-format="dd/mm/yyyy"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li id="tabelaDados" class="active"><a href="#tab-autores" data-toggle="tab">Autores</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab-autores">
                                <div class="col-md-12">
                                    <br>
                                    <textarea  id="autores" class="form-control" placeholder="Autores do Projeto" rows="6"></textarea>
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
                <h3 class="publicacao-name">Nome do Laboratório</h3>
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
<script src="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/publicacoes.js"></script>
<!-- DatePicker --> 
<script src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.js"></script>

<script>
                            $(document).ready(function () {
                                $('.dashboard-options > li.active').removeClass('active');
                                $('.dashboard-options > li:contains("Publicações")').addClass('active');
                            });
                            var js_site_url = function (urlText) {
                                var url = "<?php echo base_url(); ?>" + urlText;
                                return url;
                            };
</script>
