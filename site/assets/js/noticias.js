$(document).ready(function () {
    var table = $('.table').DataTable();
    $('#id-image-preview').imagepreview();
    $('#id-image-previewEditar').imagepreview();
    
    $('#modalNewEdit').on('show.bs.modal', function () {
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/buscartodosarray'), function (response) {
            if (response.sucesso) {
                var labs = response.lab;
                for (var index in labs) {
                    $('#laboratorios').append(new Option(labs[index], index));
                }
            }
        });
    });

    $(document).on('click', '.editar, .remover', function () {
        element = $(this).parents('tr');
        elementId = $(element).find('.titulo').data('id');
    });

    $('#btnRemover').on('click', function () {
        var id, dataPost;
        id = elementId;
        dataPost = {id: id};
        $.post(js_site_url('index.php/noticias/remover'), dataPost, function (response) {
            if (response.sucesso) {
                table.row(element).remove().draw();
                $("#modalRemover").modal('hide');
            }
        });
    });
    
    
    
    var id = null;
    
    $('.editar').on('click', function () {
        var dataPost;
        id = null;
        id = $(this).parents('tr').find('.titulo').data('id');
        ajaxMessage();
        dataPost = {id: id};
        $.post(js_site_url('index.php/noticias/buscarporid'), dataPost, function (response) {
            if (response.sucesso) {
                if (response.noticia.capa) {
                    $('#capa').attr('src', response.noticia.capa);
                    $('#titulo').val(response.noticia.titulo);
                    $('#editor').append(response.noticia.texto);
                }
            }
        });
    });
    
    $('#btnSalvar').on('click', function () {
        var titulo, capa, lab, projeto, conteudo, dataPost;
        titulo = $('#titulo').val();
        lab = $('laboratorios').val();
        projeto = $('#projetos').val();
        conteudo = $('#editor').html();
        capa = $('#capa').attr('src');
        dataPost = {id: id, titulo: titulo, lab: lab, projeto: projeto, capa: capa, conteudo: conteudo};
        ajaxMessage();
        if (id === null) {
            $.post(js_site_url('index.php/noticias/cadastrar'), dataPost, function (response) {
                
            });
        } else {
            $.post(js_site_url('index.php/noticias/atualizar'), dataPost, function (response) {
                
            });
        }
    });



    function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
                fontTarget = $('[title=Fonte]').siblings('.dropdown-menu');
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
            msg = "Formato inválido " + detail;
        }
        else {
            console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                '<strong>Erro ao carregar arquivo: </strong> ' + msg + ' </div>').prependTo('#alerts');
    }
    ;
    initToolbarBootstrapBindings();
    $('#editor').wysiwyg({fileUploadError: showErrorAlert});
    $('#editorEditor').wysiwyg({fileUploadError: showErrorAlert});
    window.prettyPrint && prettyPrint();
});

