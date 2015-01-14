<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-2 main" style="top: -40px">
            <div class="page-header">
                <h1>Perfil</h1> 
            </div>
            <div class="bs-example" data-example-id="striped-table">
                <div class="row">
                    <div class="col-lg-3">
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
                    <div class="row col-lg-8">
                        <label>Sobre:</label>
                        <form>
                            <textarea style="height: 200px;" class="form-control" placeholder="Escreva algo sobre você" rows="3"></textarea>
                        </form>
                        <br>
                    </div>

                    <div class="row">

                    </div>

                    <ul class="nav nav-tabs" style="top: 30px;">
                        <li id="tabelaDados" class="active"><a aria-expanded="true" href="#dados" data-toggle="tab">Dados</a></li>
                        <li id="tabelaAcademico" ><a aria-expanded="false" href="#academico" data-toggle="tab">Acadêmico</a></li>
                        <li id="tabelaSocial" ><a aria-expanded="false" href="#social" data-toggle="tab">Social</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="dados">
                            <div class="col-md-5">
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
                            <div class="col-md-5">
                                <div class="form-group has-feedback">
                                    <label>Telefone:</label>
                                    <input id="telefone" type="tel" class="form-control"/>
                                </div>
                                <div class="form-group has-feedback">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalSenha">Alterar Senha</button>
                                </div>
                            </div>
                        </div> <!-- Tab Dados -->

                        <div class="tab-pane fade in" id="social">
                            <div class="col-md-5">
                                <div class="form-group has-feedback">
                                    <label>Facebook:</label>
                                    <input id="facebook" type="url" class="form-control"/>
                                </div>
                                <div class="form-group has-feedback">
                                    <label>Twitter:</label>
                                    <input id="twitter" type="url" class="form-control"/>
                                </div>
                                <div class="form-group has-feedback">
                                    <label>Linkdln:</label>
                                    <input id="linkdin" type="url" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-5">
                            </div>
                        </div> <!-- Tab Social -->

                        <div class="tab-pane fade in" id="academico">
                            <div class="col-md-5">
                                <div class="form-group has-feedback">
                                    <label>Lattes:</label>
                                    <input id="lattes" type="url" class="form-control"/>
                                </div>
                                <div class="form-group has-feedback">
                                    <label>Data de Entrada:</label>
                                    <input id="entrada" type="date" class="form-control" disabled=""/>
                                </div>
                                <div class="form-group has-feedback">
                                    <label>Data de Saída:</label>
                                    <input id="email" type="date" class="form-control" disabled=""/>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group has-feedback">
                                    <label>Áreas de Interesse:</label>
                                    <textarea class="form-control" placeholder="Escreva algo sobre você" rows="3"></textarea>
                                </div>
                            </div>
                        </div> <!-- Tab Acadêmico -->

                    </div>
                </div>
            </div>
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
                                <input name="senhAtual" id="senhAtual" type="password" class="form-control" value=""/>
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
                <button href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button href="#" class="btn btn-primary" id="password_modal_save">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/perfil.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-image-preview.js"></script>
<script>
    $(document).ready(function () {
        $('li.active').removeClass('active');
        $('li:contains("Perfil")').addClass('active');
    });
    var js_site_url = function (urlText) {
        var url = "<?php echo base_url(); ?>" + urlText;
        return url;
    }
</script>

