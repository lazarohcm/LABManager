function previewFile() {
    var preview = document.querySelector('#capa'); //selects the query named img
    var file = document.querySelector('#input-capa').files[0]; //sames as here
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file); //reads the data as a URL
    } else {
        preview.src = "";
    }
    ;
}

$(document).ready(function () {
    $('#tabela-noticias').dataTable({
        "language": {
            "url": "../../assets/DataTables/dataTables.portugues.json"
        }
    });

    $('#editor').wysiwyg();
    $('#editor').cleanHtml();
    $('#editorEditar').wysiwyg();
    $('#editorEditar').cleanHtml();

    $(document).ajaxStop($.unblockUI);

    $('#modalNewEdit').on('hide.bs.modal', function () {
        $('a.editar').removeClass('clicked');
        $('#titulo').val('');
        $('#capa').attr('src', 'http://placehold.it/700x300/81326D/ffffff&text=Notícia');
        $('#editor').empty();
        $("#laboratorios").val($("#laboratorios option:first").val());
        $("#projetos").val($("#projetos option:first").val());
    });

    $(document).on('click', '.editar, .remover', function () {
        $(this).addClass('clicked');
    });

    $('#btn-upload, #capa').on('click', function () {
        $('#input-capa').click();
    });

    //Load de projetos e laboratórios
    ajaxMessage();
    $.post(js_site_url('index.php/laboratorios/buscartodosarray'), function (response) {
        if (response.sucesso) {
            var labs = response.lab;
            for (var index in labs) {
                $('#laboratorios').append(new Option(labs[index], index));
            }
        }
    });

    $.post(js_site_url('index.php/projetos/buscartodosarray'), function (response) {
        if (response.sucesso) {
            var projetos = response.projetos;
            $.each(projetos, function (index, projeto) {
                $('#projetos').append(new Option(projeto, index));
            });
        }
    });
    

    $('#btnRemover').on('click', function () {
        var id, dataPost;
        id = $('.remover.clicked').parents('tr').data('id');
        dataPost = {id: id};
        $.post(js_site_url('index.php/noticias/remover'), dataPost, function (data) {
            initNotification(data);
            if (data.sucesso) {
                $('#tabela-noticias').DataTable().row($('.remover.clicked').parents('tr')).remove().draw();
            }
        });
        $('#modalRemover').modal('hide');
    });

    $('.editar').on('click', function () {
        var dataPost;
        id = $(this).parents('tr').data('id');
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
});

