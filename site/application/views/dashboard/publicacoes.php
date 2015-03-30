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
                    <td>
                        <a href="#"><?php echo $publicacao->getTitulo(); ?></a>
                    </td>
                    <td>
                        <?php echo $publicacao->getProjeto()->getNome(); ?>
                    </td>
                    <td>
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
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>

<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/publicacoes.js"></script>
