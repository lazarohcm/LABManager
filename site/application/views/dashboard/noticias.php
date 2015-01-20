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
                    Adicionar Nova
                </button>
                <h1>Notícias</h1> 
            </div>
            <div class="bs-example" data-example-id="striped-table">
                <table id="tabelaMembros" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Laboratório</th>
                            <th>Projeto</th>
                            <th>Data</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($noticias as $noticia) { ?>
                            <tr>
                                <td>
                                    <strong>
                                        <a href="#" class="titulo" data-id="<?php echo $noticia->getId(); ?>">
                                            <?php echo $noticia->getTitulo(); ?>
                                        </a>
                                    </strong>
                                    
                                </td>
                                <td><?php //echo $noticia->getLaboratorio();   ?></td>
                                <td><?php //echo $noticia->getProjeto();   ?></td>
                                <td><?php
                                    if ($noticia->getData() != NULL) {
                                        echo $noticia->getData()->format('d/m/Y');
                                    } else {
                                        echo 'Sem data';
                                    }
                                    ?></td>
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
        </div>
    </div>
</div>

<!-- Modal Alterar Cadastrar -->
<div class="modal fade" id="modalNewEdit" tabindex="-1" role="dialog" aria-labelledby="modalNewEdit" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Nova Notícia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="image-preview" id="id-image-previewEditar" style="margin-left: 50px;">
                            <div class="image-wrap" data-image-width="320" data-image-height="200" data-img-name="capa">
                                <div class="image-default">
                                    <img class="img-responsive" id="capa" data-src="holder.js/320x200" alt="..." />
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
                            <label>Título:</label>
                            <input id="titulo" type="text" class="form-control" placeholder="Título da Notícia">
                        </div>
                        <div class="form-group has-feedback">
                            <label>Laboratorio:</label>
                            <select id="laboratorios" style="width:100%;">
                                <option value="">Selecione um laboratório</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Projeto:</label>
                            <select id="projetos" style="width:100%;">
                                <option value="">Selecione um tipo</option>
                                <option value="1">Professor</option>
                                <option value="2">Pesquisador</option>
                                <option value="3">Doutorando</option>
                                <option value="4">Mestrando</option>
                                <option value="5">Graduando</option>                                  
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div id="alerts"></div>
                        <div class="btn-toolbar col-lg-10" data-role="editor-toolbar" data-target="#editor">
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="glyphicon glyphicon-font"></i><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Tamanho da Fonte"><i class="glyphicon glyphicon-text-height"></i>&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                    <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                    <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a class="btn" data-edit="bold" title="Negrito (Ctrl/Cmd+B)"><i class="glyphicon glyphicon-bold"></i></a>
                                <a class="btn" data-edit="italic" title="Itálico (Ctrl/Cmd+I)"><i class="glyphicon glyphicon-italic"></i></a>
                                <a class="btn" data-edit="strikethrough" title="Tachado"><s style='font-size: 1.3em'><b>S</b></s></a>
                                <a class="btn" data-edit="underline" title="Sublinhado (Ctrl/Cmd+U)"><u style='font-size:1.3em'><b>U</b></u></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn" data-edit="insertunorderedlist" title="Lista com Marcadores"><i class="glyphicon glyphicon-list"></i></a>
                                <a class="btn" data-edit="insertorderedlist" title="Lista Numerada"><i class="glyphicon glyphicon-list"></i></a>
                                <a class="btn" data-edit="outdent" title="Recuar Identação (Shift+Tab)"><i class="glyphicon glyphicon-indent-left"></i></a>
                                <a class="btn" data-edit="indent" title="Identar (Tab)"><i class="glyphicon glyphicon-indent-right"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn" data-edit="justifyleft" title="Alinhar à esquerda (Ctrl/Cmd+L)"><i class="glyphicon glyphicon-align-left"></i></a>
                                <a class="btn" data-edit="justifycenter" title="Centralizar (Ctrl/Cmd+E)"><i class="glyphicon glyphicon-align-center"></i></a>
                                <a class="btn" data-edit="justifyright" title="Alinhar à direita(Ctrl/Cmd+R)"><i class="glyphicon glyphicon-align-right"></i></a>
                                <a class="btn" data-edit="justifyfull" title="Justificar(Ctrl/Cmd+J)"><i class="glyphicon glyphicon-align-justify"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="glyphicon glyphicon-link"></i></a>
                                <div class="dropdown-menu input-append">
                                    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                    <button class="btn" type="button">Add</button>
                                </div>
                                <a class="btn" data-edit="unlink" title="Remover Hyperlink"><i class="glyphicon glyphicon-remove"></i></a>

                            </div>

                            <div class="btn-group">
                                <a class="btn" title="Inserir Imagem (arraste e solte)" id="pictureBtn"><i class="glyphicon glyphicon-picture"></i></a>
                                <input id="inputPicture" type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                            </div>
                            <div class="btn-group">
                                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            </div>
                            <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
                        </div>
                        <div class="col-lg-11" id="editor" style="margin-right:20px; margin-left: 20px"></div>
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


<script src="<?php echo base_url(); ?>assets/js/jquery-image-preview.js"></script>
<link href="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/external/google-code-prettify/prettify.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/index.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/noticias.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/bootstrap-wysiwyg.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/external/google-code-prettify/prettify.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/external/jquery.hotkeys.js"></script>

<script>
    $(document).ready(function () {
        $('#editor').wysiwyg();
        $('#editor').cleanHtml();
        $('#editorEditar').wysiwyg();
        $('#editorEditar').cleanHtml();
        
        $('.btn-image-preview').on('click', function () {
            $('#inputPicture').click();
        });
        function initToolbarBootstrapBindings() {
            var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                'Times New Roman', 'Verdana'],
                    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
            $.each(fonts, function (idx, fontName) {
                fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
            });
            $('a[title]').tooltip({container: 'body'});
            $('.dropdown-menu input').click(function () {
                return false;
            })
                    .change(function () {
                        $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                    })
                    .keydown('esc', function () {
                        this.value = '';
                        $(this).change();
                    });

            $('[data-role=magic-overlay]').each(function () {
                var overlay = $(this), target = $(overlay.data('target'));
                overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
            });
            if ("onwebkitspeechchange"  in document.createElement("input")) {
                var editorOffset = $('#editor').offset();
                $('#voiceBtn').css('position', 'absolute').offset({top: editorOffset.top, left: editorOffset.left + $('#editor').innerWidth() - 35});
            } else {
                $('#voiceBtn').hide();
            }
        }
        ;
        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            }
            else {
                console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }
        ;
        initToolbarBootstrapBindings();
        $('#editor').wysiwyg({fileUploadError: showErrorAlert});
        $('#editorEditar').wysiwyg({fileUploadError: showErrorAlert});
        window.prettyPrint && prettyPrint();

        $('.nav-sidebar > li.active').removeClass('active');
        $('.nav-sidebar > li:contains("Notícias")').addClass('active');
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

