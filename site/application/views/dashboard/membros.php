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
        width: 80%;
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
                <h1>Membros</h1> 
            </div>
            <div class="bs-example" data-example-id="striped-table">
                <table id="tabelaMembros" class="table table-hover">
                    <thead>
                        <tr>
                            <th style="width:30px"></th>
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
                            <tr>
                                <th>
                                    <span class="chat-img pull-left">
                                        <img alt="..." class="img-circle" src="<?php if ($membro->getFoto() != NULL) echo stream_get_contents($membro->getFoto()) ?>" width="150%" height="100%"/>
                                    </span> 
                                </th>
                                <td class="tdUsuario">
                                    <strong>
                                        <a href="#" class="username" data-id="<?php echo $membro->getId(); ?>">
                                            <?php echo $membro->getUsuario(); ?>
                                        </a>
                                    </strong>
                                </td>
                                <td><?php echo $membro->getNome(); ?></td>
                                <td><?php echo $membro->getEmail(); ?></td>
                                <td><?php echo $membro->getTipo(); ?></td>
                                <td>
                                    <?php if ($membro->getAtivo()) { ?>
                                        <input disabled="" checked="" type="checkbox">
                                    <?php } else { ?>
                                        <input disabled="" type="checkbox">
                                    <?php } ?>

                                </td>
                                <td>
                                    <?php if ($membro->getAdmin()) { ?>
                                        <input disabled="" checked="" type="checkbox">
                                    <?php } else { ?>
                                        <input disabled="" type="checkbox">
                                    <?php } ?>
                                </td>
                                <td style="position:relative;">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Ação&nbsp;&nbsp;&nbsp; <span class="caret"></span>
                                    </button>
                                    <ul style="top: 70%" class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalNewEdit">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Novo Membro</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="image-preview" id="id-image-preview">
                            <div class="image-wrap" data-image-width="220" data-image-height="200" data-img-name="foto">
                                <div class="image-default">
                                    <img class="img-responsive" id="imgFoto" data-src="holder.js/220x200" alt="..." />
                                </div>
                            </div>

                            <div class="message"></div>

                            <div class="action">
                                <button type="button" class="btn btn-primary btn-block btn-image-preview">
                                    <i class="fa fa-cloud-upload"></i> Carregar imagem
                                </button>
                            </div>
                        </div>
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
                        <div class="form-group has-feedback">
                            <label>Usuário:</label>
                            <input id="usuario" type="text" class="form-control"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
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
                                    <select id="laboratorios" style="width:100%;">
                                        <option value="">Selecione um laboratório</option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label>Tipo:</label>
                                    <select id="tipo" style="width:100%;">
                                        <option value="">Selecione um tipo</option>
                                        <option value="1">Professor</option>
                                        <option value="2">Pesquisador</option>
                                        <option value="3">Doutorando</option>
                                        <option value="4">Mestrando</option>
                                        <option value="5">Graduando</option>                                  
                                    </select>
                                </div>
                                <br>
                                <div class="form-group has-feedback">
                                    <label>Ativo:</label>
                                    <label>
                                        <input id='ativo' type="checkbox">
                                    </label>
                                </div>

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
                                <div class="form-group has-feedback">
                                    <label>Admin:</label>
                                    <label>
                                        <input id="admin" type="checkbox">
                                    </label>
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
<script src="<?php echo base_url(); ?>assets/js/membros.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-image-preview.js"></script>

<script>
    $(document).ready(function () {
        $('li.active').removeClass('active');
        $('li:contains("Membros")').addClass('active');
        $('#entrada,#saida').datepicker({dateFormat: 'dd/mm/yy',
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

