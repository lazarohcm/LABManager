<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="top: -40px">
            <div class="page-header">
                <button class='btn btn-primary pull-right' data-target='#modalNewEdit' data-toggle='modal'>
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                    Adicionar Novo
                </button>
                <h1>Laboratórios</h1> 
            </div>

            <div class="row placeholders">

                <?php foreach ($laboratorios as $laboratorio) { ?> 
                    <div class="col-xs-6 col-sm-6 placeholder">
                        <div class="row">
                            <div class="thumbnail col-sm-5 col-md-offset-3" style="left: 20px;">
                                <img class="img-rounded" src="<?php echo stream_get_contents($laboratorio->getCapa()); ?>" alt="">
                            </div> 
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <h4 data-id='<?php echo $laboratorio->getId(); ?>'><?php echo $laboratorio->getNome(); ?></h4>  
                            </div>
                            <div class='form-group'>
                                <label>Descrição: </label>
                                <textarea disabled rows="3" class="form-control"><?php echo $laboratorio->getDescricao(); ?></textarea>
                            </div>

                            <div class='form-group'>
                                <label>Telefone: </label>
                                <span><?php echo $laboratorio->getTelefone(); ?></span>
                            </div>
                            <button class="btn btn-primary editar "  data-target='#modalEditar' data-toggle='modal'>Editar</button>
                            <button class="btn btn-danger remover" data-target='#modalRemover' data-toggle='modal'>
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </div>

                    </div>
                <?php } ?>
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
                <h4 class="modal-title">Novo Laboratório</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nome do Laboratório: </label>
                    <input name="txtNome" id="txtNomeLaboratorio" type="text" class="form-control" placeholder="Digite aqui o nome do laboratório..." />
                </div>
                <div class='form-group'>
                    <label>Descrição: </label>
                    <textarea name="txtDescricao" id="txtDescricao" type="text" class="form-control" placeholder="Descrição do Laboratório"></textarea>
                </div>
                <div class="form-group">
                    <label>Telefone: </label>
                    <input name="txtTelefone" id="txtTelefone" type="text" class="form-control" placeholder="Digite aqui o telefone do laboratório..." />
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

<!-- Modal Alterar Cadastrar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalNewEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Atualizar Laboratório</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8 col-md-offset-2">
                        <div class="image-preview" id="id-image-preview">
                            <div class="image-wrap" data-image-width="400" data-image-height="300" data-img-name="capa">
                                <div class="image-default">
                                    <img class="img-responsive" id="capa" data-src="holder.js/400x300" alt="..." />
                                </div>
                            </div>

                            <div class="message"></div>
                            <br>
                            <div class="action">
                                <button type="button" class="btn btn-primary btn-block btn-image-preview">
                                    <i class="fa fa-cloud-upload"></i> Carregar imagem
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Nome do Laboratório: </label>
                    <input name="txtEditarNome" id="txtEditarNome" type="text" class="form-control" placeholder="Digite aqui o nome do laboratório..." />
                </div>
                <div class='form-group'>
                    <label>Descrição: </label>
                    <textarea name="txtEditarDescricao" id="txtEditarDescricao" type="text" class="form-control" placeholder="Descrição do Laboratório"></textarea>
                </div>
                <div class="form-group">
                    <label>Telefone: </label>
                    <input name="txtEditarTelefone" id="txtEditarTelefone" type="text" class="form-control" placeholder="Digite aqui o telefone do laboratório..." />
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnEditarNao" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnEditarSalvar" type="button" class="btn btn-primary">Salvar</button>
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
<script src="<?php echo base_url(); ?>assets/js/laboratorios.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-image-preview.js"></script>
<script>
    $(document).ready(function () {
        $('.nav-sidebar > li.active').removeClass('active');
        $('.nav-sidebar > li:contains("Laboratórios")').addClass('active');
    });
    var js_site_url = function (urlText) {
        var url = "<?php echo base_url(); ?>" + urlText;
        return url;
    }
</script>
