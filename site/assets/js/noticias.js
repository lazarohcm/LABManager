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

    function clearModal() {
        $('a.editar').removeClass('clicked');
        $('#titulo').val('');
        $('#capa').attr('src', 'http://placehold.it/700x300/81326D/ffffff&text=Notícia');
        $('#editor').empty();
        $("#laboratorios").val($("#laboratorios option:first").val());
        $("#projetos").val($("#projetos option:first").val());

        $('#tabela-noticias > tbody').find('tr').removeClass('selected');
    }
    ;

    $('#modalNewEdit').on('hide.bs.modal', function () {
        clearModal();
    });

    $(document).on('click', '.remover', function () {
        $('#tabela-noticias > tbody').find('tr').removeClass('selected');
        $(this).parents('tr').addClass('selected');
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
        id = $('#tabela-noticias').find('tr.selected').data('id');
        dataPost = {id: id};
        ajaxMessage();
        $.post(js_site_url('index.php/noticias/remover'), dataPost, function (data) {
            initNotification(data);
            if (data.sucesso) {
                var row = $('#tabela-noticias').find('tr.selected');
                $('#tabela-noticias').DataTable().row(row).remove().draw();
                $('#tabela-noticias > tbody').find('tr').removeClass('selected');
            }
        });
        $('#modalRemover').modal('hide');
    });

    $('.editar').on('click', function () {
        clearModal();
        var dataPost;
        $(this).parents('tr').addClass('selected');
        var id = $('#tabela-noticias').find('tr.selected').data('id');
        ajaxMessage();
        dataPost = {id: id};
        $.post(js_site_url('index.php/noticias/buscarporid'), dataPost, function (response) {
            if (response.sucesso) {
                $('#capa').attr('src', response.noticia.capa);
                $('#titulo').val(response.noticia.titulo);
                $('#editor').append(response.noticia.texto);
                $('#laboratorios').val(response.noticia.laboratorio);
                $('#projetos').val(response.noticia.projeto);
            }
        });
    });

    $('#btnSalvar').on('click', function () {
        var id, titulo, capa, lab, projeto, conteudo, dataPost;
        titulo = $('#titulo').val();
        lab = $('#laboratorios option:selected').val();
        projeto = $('#projetos').val();
        conteudo = $('#editor').html();
        capa = $('#capa').attr('src');
        id = $('#tabela-noticias').find('tr.selected').data('id');
        dataPost = {id: id, titulo: titulo, lab: lab, projeto: projeto, capa: capa, conteudo: conteudo};
        ajaxMessage();
        if (typeof id === 'undefined') {
            $.post(js_site_url('index.php/noticias/cadastrar'), dataPost, function (response) {
                initNotification(response);
                if (response.sucesso) {
                    //location.reload();
                }
                ;
            });
        } else {
            $.post(js_site_url('index.php/noticias/atualizar'), dataPost, function (response) {
                initNotification(response);
                if (response.sucesso) {
                    //location.reload();
                }
                ;
            });
        }
    });
});

