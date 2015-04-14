<div class="col-md-9">
    <h1>Perfil</h1>
    <hr>
    <div class="col-md-4">
        <input style="display: none" type="file" id="input-foto" onchange="previewFile('foto', 'input-foto')">
        <img id="foto" src="<?php echo stream_get_contents($membro->getFoto()); ?>" class="img-responsive img-upload" alt="Capa Labarotório" style="height:200px"/>
        <button id="btn-upload" type="button" class="btn btn-primary btn-block">
            <i class="fa fa-cloud-upload"></i> Carregar imagem
        </button>
        <br>
    </div>
    <div class="col-md-7">
        <div class="form-group has-feedback">
            <label>Nome:</label>
            <input id="nome" type="text" class="form-control" value="<?php echo $membro->getNome(); ?>"/>
        </div>
        <div class="form-group has-feedback">
            <label>Email:</label>
            <input id="email" type="text" class="form-control" value="<?php echo $membro->getEmail(); ?>"/>
        </div>
        <div class="form-group has-feedback">
            <label>Lattes:</label>
            <input id="lattes" type="url" class="form-control" value="<?php echo $membro->getLattes() != NULL ? $membro->getLattes() : NULL; ?>"/>
        </div>
        <div class="form-group has-feedback">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalSenha">Alterar Senha</button>
        </div>
    </div>

    <div class="col-md-11">
        <ul class="nav nav-tabs">
            <li id="tabelaDados" class="active"><a aria-expanded="true" href="#dados" data-toggle="tab">Dados</a></li>
            <li id="tabelaLaboratorio" ><a aria-expanded="false" href="#laboratorio" data-toggle="tab">Laboratório</a></li>
            <li id="tabelaSocial" ><a aria-expanded="false" href="#social" data-toggle="tab">Social</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="dados">
                <br>
                <div class="col-md-7 form-group">
                    <label>Sobre:</label>
                    <textarea id="sobre" class="form-control" placeholder="Escreva algo sobre você" rows="5"><?php echo $membro->getBiografia() != NULL ? $membro->getBiografia() : NULL; ?></textarea>
                </div>
                <div class="col-md-5">
                    <label>Áreas de interesse:</label>
                    <textarea id="areas" class="form-control" placeholder="Escreva algo sobre você" rows="5"><?php echo $membro->getArea_interesse() != NULL ? $membro->getArea_interesse() : NULL; ?></textarea>

                </div>
            </div>

            <div class="tab-pane fade in" id="social">
                <br>
                <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <label>Facebook:</label>
                        <input id="facebook" type="url" class="form-control" value="<?php echo $membro->getFacebook() != NULL ? $membro->getFacebook() : NULL; ?>"/>
                    </div>
                    <div class="form-group has-feedback">
                        <label>Twitter:</label>
                        <input id="twitter" type="url" class="form-control" value="<?php echo $membro->getTwitter() != NULL ? $membro->getTwitter() : NULL; ?>"/>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <label>Linkdln:</label>
                        <input id="linkdin" type="url" class="form-control" value="<?php echo $membro->getLinkdl() != NULL ? $membro->getLinkdl() : NULL; ?>"/>
                    </div>
                </div>
            </div> <!-- Tab Social -->

            <div class="tab-pane fade in" id="laboratorio">
                <br>
                <div class="col-md-12">
                    <h4 class="text-center"><?php echo $membro->getLaboratorio()->getNome(); ?></h4>
                </div>
                <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <label>Data de Entrada:</label>
                        <input id="entrada" type="date" class="form-control" disabled="" value="<?php echo $membro->getData_entrada() != NULL ? $membro->getData_entrada()->format('d/m/Y') : NULL; ?>"/>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group has-feedback">
                        <label>Data de Saída:</label>
                        <input id="email" type="date" class="form-control" disabled="" value="<?php echo $membro->getData_saida() != NULL ? $membro->getData_saida()->format('d/m/Y') : NULL; ?>"/>
                    </div>
                </div>
            </div> <!-- Tab Acadêmico -->

        </div>
    </div>
</div>

<div id="modalSenha" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3> Alterar Senha <span class="extra-title muted"></span></h3>
            </div>
            <div class="modal-body">
                <form id="frmAlterarSenha" method="post">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label>Senha atual:</label>
                                <input name="senhaAtual" id="senhaAtual" type="password" class="form-control" value=""/>
                            </div>
                            <div class="form-group">
                                <label>Nova Senha:</label>
                                <input name="novaSenha" id="novaSenha" type="password" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Confirme Nova Senha:</label>
                                <input name="cfmNovaSenha" id="cfmNovaSenha" type="password" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button href="#" class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                <button id="btnAlterarSenha" href="#" class="btn btn-primary" id="password_modal_save">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/perfil.js"></script>
<script>
            $(document).ready(function () {
                $('.dashboard-options > li.active').removeClass('active');
                $('.dashboard-options > li:contains("Perfil")').addClass('active');
            });
            var js_site_url = function (urlText) {
                var url = "<?php echo base_url(); ?>" + urlText;
                return url;
            }
</script>

