<div class="col-md-9">
    <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#modalNewEdit">
        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
        Adicionar Nova
    </button>
    <h1>Notícias</h1>
    <hr>
    <table id="tabela-noticias" class="table table-hover">
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
                <tr data-id="<?php echo $noticia->getId(); ?>">
                    <td>
                        <strong>
                            <a href="#" class="titulo">
                                <?php echo $noticia->getTitulo(); ?>
                            </a>
                        </strong>

                    </td>
                    <td><?php //echo $noticia->getLaboratorio();               ?></td>
                    <td><?php //echo $noticia->getProjeto();               ?></td>
                    <td><?php $noticia->getData() != NULL ? printf($noticia->getData()->format('d/m/Y')) : printf('Sem data'); ?></td>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Nova Notícia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <input style="display: none" type="file" id="input-capa" onchange="previewFile()"   >
                        <img id="capa" src="http://placehold.it/700x300/81326D/ffffff&text=Notícia" class="img-responsive img-upload" alt="Capa Labarotório"/>
                        <button id="btn-upload" type="button" class="btn btn-primary btn-block">
                            <i class="fa fa-cloud-upload"></i> Carregar imagem
                        </button>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-group has-feedback">
                            <label>Título:</label>
                            <input id="titulo" type="text" class="form-control" placeholder="Título da Notícia">
                        </div>
                        <div class="form-group has-feedback">
                            <label>Laboratorio:</label>
                            <select id="laboratorios" class="form-control">
                                <option value="0">Selecione um Laboratório</option>
                            </select>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Projeto:</label>
                            <select id="projetos" class="form-control">
                                <option value="0">Selecione um Projeto</option>                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div id="alerts"></div>
                        <div class="btn-toolbar col-lg-10" data-role="editor-toolbar" data-target="#editor">
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font fa-2x"></i><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class=" fa fa-text-height fa-2x"></i>&nbsp;<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                                    <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                                    <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                                </ul>
                            </div>
                            <div class="btn-group">
                                <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold fa-2x"></i></a>
                                <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class=" fa fa-italic fa-2x"></i></a>
                                <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough fa-2x"></i></a>
                                <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline fa-2x"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul fa-2x"></i></a>
                                <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol fa-2x"></i></a>
                                <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-outdent fa-2x"></i></a>
                                <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent fa-2x"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left fa-2x"></i></a>
                                <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center fa-2x"></i></a>
                                <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right fa-2x"></i></a>
                                <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify fa-2x"></i></a>
                            </div>
                            <div class="btn-group">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link fa-2x"></i></a>
                                <div class="dropdown-menu input-append">
                                    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
                                    <button class="btn" type="button">Add</button>
                                </div>
                                <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut fa-2x"></i></a>

                            </div>

                            <div class="btn-group">
                                <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o fa-2x"></i></a>
                                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                            </div>
                            <div class="btn-group">
                                <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo fa-2x"></i></a>
                                <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat fa-2x"></i></a>
                            </div>
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

<!-- Datatables -->
<link href="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">

<!-- Bootstrap wysiwyg -->
<link href="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/bootstrap-wysiwyg.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/external/google-code-prettify/prettify.css" rel="stylesheet">

<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.js"></script>
<!-- Datatables -->
<script src="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.js"></script>

<!-- Bootstrap WYSIWYG -->
<script src="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/bootstrap-wysiwyg.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/external/google-code-prettify/prettify.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap-wysiwyg/external/jquery.hotkeys.js"></script>

<script src="<?php echo base_url(); ?>assets/js/noticias.js"></script>

<script>
    $(document).ready(function () {
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
        window.prettyPrint && prettyPrint();

        $('.dashboard-options > li.active').removeClass('active');
        $('.dashboard-options > li:contains("Notícias")').addClass('active');
    });
    var js_site_url = function (urlText) {
        var url = "<?php echo base_url(); ?>" + urlText;
        return url;
    }
</script>

