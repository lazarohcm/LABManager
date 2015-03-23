<style> 
    .image-preview>.image-wrap {
        margin: 0 auto;
        margin-bottom: 15px;
        margin-top: 10px;    
    }

    .image-preview>.image-wrap {
        cursor: pointer;
    }

    .image-preview>.image-wrap img {
    }

    .image-preview>.action button {
        width: 50%;
        margin-left: 30px;
        margin: 0 auto;
    }

    .image-preview>.message.error {
        text-align: center;
        margin: 10px 0 10px 0;
        background-color: red;
        color: #fff;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="top: -40px">
            <div class="page-header">
                <button id="btnModal" class='btn btn-primary pull-right' data-target='#modalNewEdit' data-toggle='modal'>
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    Adicionar Novo
                </button>
                <h1>Projetos</h1> 
            </div>
            <div class="bs-example" data-example-id="striped-table">
                <table id="tabelaProjetos" class="table table-hover">
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
                            <tr>
                                <td class="tdUsuario">
                                    <strong>
                                        <a href="#" class="projectname" data-id="<?php echo $projeto->getId(); ?>">
                                            <?php echo $projeto->getNome(); ?>
                                        </a>
                                    </strong>
                                </td>
                                <td><?php echo $projeto->getCoordenador()->getNome(); ?></td>
                                <td><?php echo $projeto->getLaboratorio()->getNome(); ?></td>
                                <td><?php echo $projeto->getData_inicio()->format('d/m/Y'); ?></td>
                                <td>
                                <?php
                                    if($projeto->getData_termino() != NULL){
                                        echo $projeto->getData_termino()->format('d/m/Y');
                                    }else{
                                       'Indefinido'; 
                                    }
                                ?>
                                </td>
                                <td style="position:relative;">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Ação&nbsp;&nbsp;&nbsp; <span class="caret"></span>
                                    </button>
                                    <ul style="top: 70%" class="dropdown-menu" role="menu">
                                        <li>
                                            <a class="editar" href="#" data-toggle="modal" data-target="#modalNewEdit">
                                                <span class="glyphicon glyphicon-pencil"></span> Editar
                                            </a>
                                        </li>
                                        <li>
                                            <a class="remover" href="#" data-toggle="modal" data-target="#modalDelete">
                                                <span class="glyphicon glyphicon-remove-circle"></span> Excluir
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Alterar Cadastrar -->
<div class="modal fade" id="modalNewEdit" tabindex="-1" role="dialog" aria-labelledby="modalNewEdit" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Novo Projeto</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image-preview" id="id-image-preview">
                            <div class="image-wrap" data-image-width="400" data-image-height="300" data-img-name="capaProjeto">
                                <div class="image-default">
                                    <img class="" id="capaProjeto" data-src="holder.js/400x300" alt="..." />
                                </div>
                            </div>

                            <div class="message"></div>

                            <div class="action" style="margin-left:-80px">
                                <button type="button" class="btn btn-primary btn-block btn-image-preview">
                                    <i class="fa fa-cloud-upload"></i> Carregar imagem
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group has-feedback">
                            <label>Nome:</label>
                            <input id="nome" type="text" class="form-control" placeholder="Título do Projeto"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Data Início:</label>
                            <input id="inicio" type="text" class="form-control"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Data Termino:</label>
                            <input id="termino" type="text" class="form-control"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Laboratório:</label>
                            <select id="laboratorios" style="width:100%;">
                                <option value="">Selecione um laboratório</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Coordenador:</label>
                            <select id="coordenadores" style="width:100%;">
                                <option value="">Selecione um coordenador</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Descrição:</label>
                            <textarea  id="descricao" class="form-control" placeholder="Descrição do projeto" rows="3"></textarea>
                        </div>
                    </div>

                    <ul class="nav nav-tabs">
                        <li id="tabelaDados" class="active"><a href="#membros" data-toggle="tab">Membros</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="membros">
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
            <div class="modal-footer">
                <button id="btnSalvarAlterarNao" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnSalvar" type="button" class="btn btn-primary">Salvar</button>
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

<script src="<?php echo base_url(); ?>assets/js/projetos.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-image-preview.js"></script>

<script>
    $(document).ready(function () {
        $('#btnModalAddMemebro').on('click', function () {
            $('#modalNewEdit').modal('hide');
        });
        $('#modalAddMembro').on('hidden.bs.modal', function () {
            $('#modalNewEdit').modal('show');
        });
        $('.nav-sidebar > li.active').removeClass('active');
        $('.nav-sidebar > li:contains("Projetos")').addClass('active');
        $('#inicio,#termino').datepicker({dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'});
    });
    var js_site_url = function (urlText) {
        var url = "<?php echo base_url(); ?>" + urlText;
        return url;
    }
</script>

