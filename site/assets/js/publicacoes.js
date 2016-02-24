$(document).ready(function () {
    $(document).ajaxStop($.unblockUI);

    $('#tabela-publicacoes').DataTable({
        "language": {
            "url": "../../assets/DataTables/dataTables.portugues.json"
        }
    });
    $('#data').datepicker();

    $('#btn-upload, #capa').on('click', function () {
        $('#input-capa').click();
    });

    $('.btn[data-target="#modalNewEdit"], .editar').on('click', function () {
        clearModal();
    });

    $('.editar, .remover').on('click', function () {
        $('#tabela-publicacoes').find('tr.selected').removeClass('selected');
        $(this).parents('tr').addClass('selected');
    });

    $('#modalNewEdit').on('hide.bs.modal', function () {
        $('#tabela-publicacoes').find('tr.selected').removeClass('selected');
    });

    $('.remover').on('click', function () {
        $('.publicacao-name').text($(this).parents('tr.selected').find('.td-name a').text());
    });

    //Load de projetos
    ajaxMessage();
    $.post(js_site_url('index.php/projetos/buscartodosarray'), function (response) {
        if (response.sucesso) {
            var projetos = response.projetos;
            $.each(projetos, function (index, projeto) {
                $('#projetos').append(new Option(projeto, index));
            });
        }
    });

    $('.editar').on('click', function () {
        var id = id = $(this).parents('tr').data('id'), dataPost = {};
        dataPost = {id:id};
        ajaxMessage();
        $.post(js_site_url('index.php/publicacoes/buscarporid'), dataPost, function (response) {
            if (response.sucesso) {
                var publicacao = response.publicacao;
                $('#titulo').val(publicacao.titulo);
                $('#autores').val(publicacao.autores);
                $('#projetos').val(publicacao.projeto);
                $('#link').val(publicacao.linkDownload);
                $('#data').datepicker('update', publicacao.data);
                $('#capa').attr('src', publicacao.imagem);
                
            }
        });
    })

    $('#btnSalvar').on('click', function () {
        var id, titulo, capa, data, autores, projeto, link, dataPost = {};
        titulo = $('#titulo').val();
        capa = $('#capa').attr('src');
        data = $('#data').val();
        autores = $('#autores').val();
        projeto = $('#projetos').val();
        link = $('#link').val();
        id = $('#tabela-publicacoes').find('tr.selected').data('id');
        ajaxMessage();
        dataPost = {id: id, titulo: titulo, data: data, projeto: projeto, link: link, autores: autores, capa: capa};
        if (typeof id === 'undefined') {
            $.post(js_site_url('index.php/publicacoes/cadastrar'), dataPost, function (response) {
                initNotification(response);
                if (response.sucesso) {
                    disablePage();
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }

            });
        } else {
            $.post(js_site_url('index.php/publicacoes/atualizar'), dataPost, function (response) {
                initNotification(response);
                if (response.sucesso) {
                    disablePage();
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }

            });
        }
    });

    $('#btnRemover').on('click', function () {
        var id = $('tr.selected').data('id');

        $.post(js_site_url('index.php/publicacoes/remover'), {id: id}, function (data) {
            initNotification(data);
            if (data.sucesso) {
//                disablePage();
                var row = $('#tabela-publicacoes').find('tr.selected');
                $('#tabela-publicacoes').DataTable().row(row).remove().draw();
                $('#tabela-publicacoes > tbody').find('tr').removeClass('selected');
            }
        });
    });

    function clearModal() {
        $('#titulo').val('');
        $('#autores').val('');
        $('#link').val('');
        $('#capa').attr('src', 'http://placehold.it/700x300/81326D/ffffff&text=Publicação');
        $('#data').datepicker('update', '');
        $('#projetos').val($('#projetos option:first').val());
    }
});


