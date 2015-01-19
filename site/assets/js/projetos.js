$(document).ready(function () {
    var table = $('.table').DataTable();
    $('#id-image-preview').imagepreview();

    $('#modalNewEdit').on('show.bs.modal', function () {
        ajaxMessage();
        $('#laboratorios option').each(function(){
           if($(this).val()){
               $(this).remove();
           }
        });
        $('#coordenadores option').each(function(){
           if($(this).val()){
               $(this).remove();
           }
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
        id = $(this).parents('tr').find('.username').data('id');
        dataPost = {idUsuario: id};
        ajaxMessage();
        $.post(js_site_url('index.php/projetos/buscarporid'), dataPost, function (response) {
            console.log(response.membro);
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
        var nome, inicio, termino, laboratorio, descricao, coordenador, capa, dataPost;
        nome = $('#nome').val();
        inicio = $('#inicio').val();
        termino = $('#termino').val();
        laboratorio = $('#laboratorios').val();
        coordenador = $('#coordenadores').val();
        descricao = $('#descricao').val();
        capa = $('#capaProjeto').attr('src');
        dataPost = {id: id, nome: nome, laboratorio: laboratorio, inicio: inicio, termino: termino, descricao:descricao, coordenador: coordenador, capa: capa};
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
});