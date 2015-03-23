$(document).ready(function () {
    var table = $('.table').DataTable();
    $('#id-image-preview').imagepreview();

    $('#modalNewEdit').on('show.bs.modal', function () {
        ajaxMessage();
        $('#laboratorios option').each(function () {
                $(this).remove();
        });
        $('#coordenadores option').each(function () {
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
        $.post(js_site_url('index.php/membros/buscarcoordenadores'), function (response) {
            if (response.sucesso) {
                var coordenadores = response.coordenadores;
                for (var index in coordenadores) {
                    $('#coordenadores').append(new Option(coordenadores[index], index));
                }
            }
        });
    });
    var id = null;
    $('.editar').on('click', function () {
        id = null;
        var dataPost;
        id = $(this).parents('tr').find('.projectname').data('id');
        dataPost = {idProjeto: id};
        ajaxMessage();
        $.post(js_site_url('index.php/projetos/buscarporid'), dataPost, function (response) {
            console.log(response.projeto);
            $('#capaProjeto').attr('src', response.projeto.capaProjeto);
            $('#nome').val(response.projeto.nome);
            $('#inicio').val(response.projeto.inicio);
            $('#termino').val(response.projeto.termino);
            $('#laboratorios').val(response.projeto.laboratorio);
            $('#coordenadores').val(response.projeto.coordenador);
            $('#descricao').val(response.projeto.descricao);
        });

    });

    $('#btnSalvar').on('click', function () {
        var nome, inicio, termino, laboratorio, descricao, coordenador, capa, dataPost;
        nome = $('#nome').val();
        inicio = $('#inicio').val();
        termino = $('#termino').val();
        laboratorio = $('#laboratorios').val();
        coordenador = $('#coordenadores').val();
        descricao = $('#descricao').val();
        capa = $('#capaProjeto').attr('src');
        dataPost = {id: id, nome: nome, laboratorio: laboratorio, inicio: inicio, termino: termino, descricao: descricao, coordenador: coordenador, capa: capa};
        ajaxMessage();
        if (id === null) {
            $.post(js_site_url('index.php/projetos/cadastrar'), dataPost, function (response) {

            });
        } else {
            $.post(js_site_url('index.php/projetos/atualizar'), dataPost, function (response) {

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

    $('#modalAddMembro').on('show.bs.modal', function () {
        var idProjeto = id, dataPost;
        dataPost = {idProjeto: idProjeto};
        ajaxMessage();
        $.post(js_site_url('index.php/membros/buscarmembrosprojeto'), dataPost, function (response) {
            if (response.sucesso) {
                var membros = response.arrayMembros;
                for(var i in membros){
                    $('#tabelaMembros > tbody').append(
                        '<tr>'
                            + '<td data-id="'+membros[i].id+'">'+membros[i].nome+'</td>'
                            + '<td>B</td>'
                        + '</tr>'
                        );
                }
            }
        });
    });

});