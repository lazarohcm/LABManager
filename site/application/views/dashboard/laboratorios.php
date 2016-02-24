<div class="col-md-9">
    <button class="pull-right btn btn-primary btn-new" data-toggle="modal" data-target="#modalNewEdit">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        Adicionar Novo
    </button>
    <h1>Laboratórios</h1>
    <hr>
    <?php foreach ($laboratorios as $laboratorio) { ?>
        <div class="col-md-6 text-center">
            <div class="thumbnail thumbnail-dashboard-laboratorio" data-id="<?php echo $laboratorio->getId(); ?>">
                <img class="dashboard-capa-laboratorio" src="<?php echo stream_get_contents($laboratorio->getCapa()); ?>" alt="">
                <h5><?php echo $laboratorio->getNome(); ?></h5>
                <div class='form-group'>
                    <label>Descrição: </label>
                    <textarea disabled rows="5" class="form-control"><?php echo $laboratorio->getDescricao(); ?></textarea>
                </div>
                <div class='form-group'>
                    <label>Telefone: </label>
                    <span><?php echo $laboratorio->getTelefone(); ?></span>
                </div>
                <button class="btn btn-primary editar"  data-target='#modalNewEdit' data-toggle='modal'>
                    <span class="glyphicon glyphicon-edit"></span>
                    Editar
                </button>
                <button class="btn btn-danger remover" data-target='#modalRemover' data-toggle='modal'>
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    Remover
                </button>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Modal Alterar Cadastrar -->
<div class="modal fade" id="modalNewEdit" tabindex="-1" role="dialog" aria-labelledby="modalNewEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Novo Laboratório</h4>
            </div>
            <div class="modal-body">
                <input style="display: none" type="file" id="input-capa" onchange="previewFile('capa', 'input-capa')"   >
                <img id='capa' src="http://placehold.it/700x250/e67e22/ffffff&text=Capa do Laboratório" class="img-responsive img-upload upload-capa-laboratorio" alt="Capa Labarotório"/>
                <button id="btn-upload" type="button" class="btn btn-primary btn-block">
                    <i class="fa fa-cloud-upload"></i> Carregar imagem
                </button>
                <br>

                <div class="form-group">
                    <label>Nome do Laboratório: </label>
                    <input name="txtNome" id="nomeLaboratorio" type="text" class="form-control" placeholder="Digite aqui o nome do laboratório..." />
                </div>
                <div class="form-group">
                    <label>Sigla do Laboratório: </label>
                    <input name="txtNome" id="siglaLaboratorio" type="text" class="form-control" placeholder="Digite aqui a sigla do laboratório..." />
                </div>
                <div class="form-group">
                    <label>Telefone: </label>
                    <input name="txtTelefone" id="telefone" type="text" class="form-control" placeholder="Digite aqui o telefone do laboratório..." />
                </div>
                <div class='form-group'>
                    <label>Descrição: </label>
                    <textarea name="txtDescricao" id="descricao" rows='7' class="form-control" placeholder="Descrição do Laboratório"></textarea>
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
                <h3 class="lab-name">Nome do Laboratório</h3>
            </div>
            <div class="modal-footer">
                <button id="btnRemover" type="button" class="btn btn-danger" data-dismiss="modal">Remover</button>
                <button id="btnNao" type="button" class="btn btn-primary">Não remover</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script src="<?php echo base_url(); ?>assets/js/laboratorios.js"></script>
<script>
    $(document).ready(function () {
        //$('.dashboard-options > li.active').removeClass('active');
        $('.dashboard-options > li:contains("Laboratórios")').addClass('active');
    });
    var js_site_url = function (urlText) {
        var url = "<?php echo base_url(); ?>" + urlText;
        return url;
    }
</script>
