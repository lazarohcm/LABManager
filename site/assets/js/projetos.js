$(document).ready(function () {
    $('#tabela-projetos').DataTable({
        "language": {
            "url": "../../assets/DataTables/dataTables.portugues.json"
        }
    });
    $('#inicio, #termino').datepicker();
    $(document).ajaxStop($.unblockUI);
    ajaxMessage();
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

    $('#btn-upload, #capa').on('click', function () {
        $('#input-capa').click();
    });
    
    $('.btn[data-target="#modalNewEdit"], .editar').on('click', function(){
       clearModal(); 
    });
    
    $('#modalNewEdit').on('hide.bs.modal', function () {
       $('#tabela-projetos').find('tr.selected').removeClass('selected');
    });
    
    $('.editar').on('click', function () {
        var dataPost;
        var id = $(this).parents('tr').data('id');
        dataPost = {idProjeto: id};
        ajaxMessage();
        $.post(js_site_url('index.php/projetos/buscarporid'), dataPost, function (response) {
            $('#capa').attr('src', response.projeto.capaProjeto);
            $('#nome').val(response.projeto.nome);
            $('#inicio').val(response.projeto.inicio);
            $('#termino').val(response.projeto.termino);
            $('#laboratorios').val(response.projeto.laboratorio);
            $('#coordenadores').val(response.projeto.coordenador);
            $('#descricao').val(response.projeto.descricao);
        });

    });

    $('#btnSalvar').on('click', function () {
        var nome, inicio, termino, laboratorio, descricao, coordenador, capa, dataPost, id;
        nome = $('#nome').val();
        inicio = $('#inicio').val();
        termino = $('#termino').val();
        laboratorio = $('#laboratorios').val();
        coordenador = $('#coordenadores').val();
        descricao = $('#descricao').val();
        capa = $('#capa').attr('src');
        id = $('#tabela-projetos').find('tr.selected').data('id');
        dataPost = {id: id, nome: nome, laboratorio: laboratorio, inicio: inicio, termino: termino, descricao: descricao, coordenador: coordenador, capa: capa};
        ajaxMessage();
        if (typeof id === 'undefined') {
            $.post(js_site_url('index.php/projetos/cadastrar'), dataPost, function (response) {
                initNotification(response);
                if (response.sucesso) {
                    disablePage();
                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }

            });
        } else {
            $.post(js_site_url('index.php/projetos/atualizar'), dataPost, function (response) {
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
        var id, dataPost;
        id = $('#tabela-projetos').find('tr.selected').data('id');
        dataPost = {idProjeto: id};
        ajaxMessage();
        $.post(js_site_url('index.php/projetos/remover'), dataPost, function (response) {
            initNotification(response);
            if (response.sucesso) {
                var row = $('#tabela-projetos').find('tr.selected');
                $('#tabela-projetos').DataTable().row(row).remove().draw();
            }
        });
        $('#modalRemover').modal('hide');
    });

    $('.editar, .remover').on('click', function () {
        $('#tabela-projetos').find('tr.selected').removeClass('selected');
        $(this).parents('tr').addClass('selected');
    });

    $('#modalAddMembro').on('show.bs.modal', function () {
        var idProjeto = id, dataPost;
        dataPost = {idProjeto: idProjeto};
        ajaxMessage();
        $.post(js_site_url('index.php/membros/buscarmembrosprojeto'), dataPost, function (response) {
            if (response.sucesso) {
                var membros = response.arrayMembros;
                for (var i in membros) {
                    $('#tabelaMembros > tbody').append(
                            '<tr>'
                            + '<td data-id="' + membros[i].id + '">' + membros[i].nome + '</td>'
                            + '<td>B</td>'
                            + '</tr>'
                            );
                }
            }
        });
    });
    
    function clearModal() {
        $('a.editar').removeClass('clicked');
        $('#nome').val('');
        $('#capa').attr('src', 'http://placehold.it/700x300/81326D/ffffff&text=Projeto');
        $("#laboratorios").val($("#laboratorios option:first").val());
        $("#coordenadores").val($("#coordenadores option:first").val());
        $('#descricao').val('');
        $('#termino').datepicker('update', '');
        $('#inicio').datepicker('update' ,'');

//        $('#tabela-noticias > tbody').find('tr').removeClass('selected');
    };

});