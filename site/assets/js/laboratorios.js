$(document).ready(function () {
    $(document).ajaxStop($.unblockUI);
    $('#btn-upload, #capa').on('click', function () {
        $('#input-capa').click();
    });

    function clearModal() {
        $('a.editar').removeClass('clicked');
        $('#nomeLaboratorio').val('');
        $('#capa').attr('src', 'http://placehold.it/700x250/e67e22/ffffff&text=Capa do Laboratório');
        $('#siglaLaboratorio').val('');
        $("#descricao").val('');
        $("#telefone").val('');

        $('#tabela-noticias > tbody').find('tr').removeClass('selected');
    }
    ;

    $('.btn[data-target="#modalNewEdit"]').on('click', function () {
        clearModal();
    });

    $('.editar, .remover').on('click', function () {
        $('.thumbnail').removeClass('selected');
        $(this).parents('.thumbnail').addClass('selected');
    });

    $('.remover').on('click', function () {
        $('#modalRemover').find('.lab-name').text($(this).parents('.thumbnail').find('h5').text());
    });

    $('.btn-new').on('click', function () {
        $('.thumbnail').removeClass('selected');
    });

    $('#btnSalvar').on('click', function () {
        var nome = $('#nomeLaboratorio').val();
        var descricao = $('#descricao').val();
        var telefone = $('#telefone').val();
        var capa = $('#capa').attr('src');
        var sigla = $('#siglaLaboratorio').val();
        var id = $('.thumbnail.selected').data('id');
        var dataPost = {nome: nome, descricao: descricao, telefone: telefone, capa: capa, id: id, sigla:sigla};
        ajaxMessage();
        if (typeof id === 'undefined') {
            $.post(js_site_url('index.php/laboratorios/cadastrar'), dataPost, function (response) {
                initNotification(response);
                if (response.sucesso) {
                    disablePage();
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }
            });
        } else {
            $.post(js_site_url('index.php/laboratorios/atualizar'), dataPost, function (response) {
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

    $('.editar').on('click', function () {
        var dataPost, id;
        id = $(this).parents('.thumbnail').data('id');
        dataPost = {id: id};
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/buscarporid'), dataPost, function (response) {
            if (response.sucesso) {
                $('#nomeLaboratorio').val(response.lab.nome);
                if (response.lab.sigla)
                    $('#siglaLaboratorio').val(response.lab.sigla);
                $('#descricao').val(response.lab.descricao);
                $('#telefone').val(response.lab.telefone);
                $('#capa').attr('src', response.lab.capa);
            }
        });
    });

    $('#btnRemover').on('click', function () {
        var id = $('.thumbnail.selected').data('id'), dataPost = {};
        dataPost = {id:id};
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/remover'), dataPost, function (response) {
            initNotification(response);
            if (response.sucesso) {
                $('.thumbnail[data-id="' + id + '"]').remove();
            }
            ;
        });
    });
});

