$(document).ready(function () {
    $(document).ajaxStop($.unblockUI);
    $('#tabela-membros').dataTable({
        "language": {
            "url": "../../assets/DataTables/dataTables.portugues.json"
        }
    });

    ajaxMessage();
    $.post(js_site_url('index.php/laboratorios/buscartodosarray'), function (response) {
        if (response.sucesso) {
            var labs = response.lab;
            for (var index in labs) {
                $('#laboratorios').append(new Option(labs[index], index));
            }
        }
    });

    function clearModal() {
        $('#foto').attr('src', 'http://placehold.it/700x300/81326D/ffffff&text=Foto de Usuário');
        $('#nome').val('');
        $('#usuario').val('');
        $('#email').val('');
        $('#tipo').val(0);
        $('#laboratorios').val(0);
        $('#entrada').datepicker('update', '');
        $('#saida').datepicker('update', '');
        $('#ativo').prop('checked', false);
        $('#admin').prop('checked', false);
        
        $('#tabela-membros').find('tr.selected').removeClass('selected');
        
    }
    ;

    $('button[data-target="#modalNewEdit"]').on('click', function () {
        clearModal();
    });

    $('#btn-upload, #foto').on('click', function () {
        $('#input-foto').click();
    });

    $('#entrada, #saida').datepicker();
    $('.editar, .remover').on('click', function () {
        $('#tabela-membros').find('tr.selected').removeClass('selected');
        $(this).parents('tr').addClass('selected');
    });
    $('.editar').on('click', function () {
        var dataPost, id;
        id = $(this).parents('tr').data('id');
        dataPost = {idUsuario: id};
        ajaxMessage();
        $.post(js_site_url('index.php/membros/buscarporid'), dataPost, function (response) {
            $('#foto').attr('src', response.membro.foto);
            $('#nome').val(response.membro.nome);
            $('#usuario').val(response.membro.usuario);
            $('#email').val(response.membro.email);
            $('#entrada').datepicker('update', response.membro.entrada);
            $('#saida').val(response.membro.saida);
            if (response.membro.ativo) {
                $('#ativo').prop('checked', true);
            }
            if (response.membro.admin) {
                $('#admin').prop('checked', true);
            }

            $('#tipo').val(response.membro.tipo);
            $('#laboratorios').val(response.membro.laboratorio);

        });

    });

    $('#btnSalvar').on('click', function () {
        var nome, email, laboratorio, tipo, ativo = false, entrada, saida, admin = false, foto, id, dataPost;
        nome = $('#nome').val();
        email = $('#email').val();
        laboratorio = $('#laboratorios').val();
        tipo = $('#tipo').val();
        entrada = $('#entrada').val();
        saida = $('#saida').val();
        foto = $('#foto').attr('src');
        if ($('#ativo').is(':checked')) {
            ativo = true;
        }
        if ($('#admin').is(':checked')) {
            admin = true;
        }
        id = $('#tabela-membros').find('tr.selected').data('id');
        dataPost = {id: id, nome: nome, email: email, laboratorio: laboratorio, tipo: tipo, ativo: ativo, entrada: entrada, saida: saida,
            admin: admin, foto: foto};
        ajaxMessage();
        if (typeof id === 'undefined') {
            $.post(js_site_url('index.php/membros/cadastrar'), dataPost, function (response) {
                initNotification(response);
                if (response.sucesso) {
                    disablePage();
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }
                ;
            });
        } else {
            $.post(js_site_url('index.php/membros/atualizar'), dataPost, function (response) {
                initNotification(response);

            });
        }
        //location.reload();
    });

    $('.remover').on('click', function () {
        var row;
        $('#nome-membro-remover').text($(row).find('.name').text());
    });

    $('#btnRemover').on('click', function () {
        var id, dataPost, row;
        row = $('tr.selected');
        id = row.data('id');
        dataPost = {idUsuario: id};
        ajaxMessage();
        $.post(js_site_url('index.php/membros/remover'), dataPost, function (response) {
            if (response.sucesso) {
                $('#table-membros').DataTable().row(row).remove().draw();
            }
        });

    });

});