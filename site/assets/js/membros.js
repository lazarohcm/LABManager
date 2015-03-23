$(document).ready(function () {
    var table = $('.table').DataTable();
    $('#id-image-preview').imagepreview();

    $('#modalNewEdit').on('show.bs.modal', function () {
        ajaxMessage();
        $('#laboratorios option').each(function(){
           $(this).remove(); 
        });
        $.post(js_site_url('index.php/laboratorios/buscartodosarray'), function (response) {
            if (response.sucesso) {
                var labs = response.lab;
                for (var index in labs) {
                    $('#laboratorios').append(new Option(labs[index], index));
                }
            }
        });
    });
    
    var id = null;
    $('.editar').on('click', function () {
        id = null;
        var dataPost;
        id = $(this).parents('tr').find('.username').data('id');
        dataPost = {idUsuario: id};
        ajaxMessage();
        $.post(js_site_url('index.php/membros/buscarporid'), dataPost, function (response) {
            $('#imgFoto').attr('src', response.membro.foto);
            $('#nome').val(response.membro.nome);
            $('#usuario').val(response.membro.usuario);
            $('#email').val(response.membro.email);
            $('#entrada').val(response.membro.entrada);
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
        var nome, email, usuario, laboratorio, tipo, ativo = false, entrada, saida, admin = false, foto, dataPost;
        nome = $('#nome').val();
        email = $('#email').val();
        usuario = $('#usuario').val();
        laboratorio = $('#laboratorios').val();
        tipo = $('#tipo').val();
        entrada = $('#entrada').val();
        saida = $('#saida').val();
        foto = $('#imgFoto').attr('src');
        if ($('#ativo').is(':checked')) {
            ativo = true;
        }
        if ($('#admin').is(':checked')) {
            admin = true;
        }
        dataPost = {id: id, nome: nome, email: email, usuario: usuario, laboratorio: laboratorio, tipo: tipo, ativo: ativo, entrada: entrada, saida: saida,
            admin: admin, foto: foto};
        ajaxMessage();
        if (id === null) {
            $.post(js_site_url('index.php/membros/cadastrar'), dataPost, function (response) {
                
            });
        } else {
            $.post(js_site_url('index.php/membros/atualizar'), dataPost, function (response) {
                
            });
        }

        $("#modalNewEdit").modal('hide');
        id = null;
        //location.reload();
    });

    $('.remover').on('click', function () {
        var id, dataPost, row;
        id = $(this).parents('tr').find('.username').data('id');
        row = $(this).parents('tr');
        dataPost = {idUsuario: id};
        ajaxMessage();
        $.post(js_site_url('index.php/membros/remover'), dataPost, function (response) {
            if (response.sucesso) {
                table.row(row).remove().draw();
            }
        });

    });
});