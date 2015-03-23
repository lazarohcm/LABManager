$(document).ready(function () {
    $('#id-image-preview').imagepreview();
    $(document).ajaxStop($.unblockUI);


    $('#btnSalvar').on('click', function () {
        var nome = $('#txtNomeLaboratorio').val();
        var descricao = $('#txtDescricao').val();
        var telefone = $('#txtTelefone').val();
        var capa = $('#capa').attr('src');
        var dataPost = {nome: nome, descricao: descricao, telefone: telefone, capa:capa};
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/cadastrar'), dataPost, function (response) {
            console.log(response);
        });
        $("#modalNewEdit").modal('hide');
        //location.reload();
    });

    $('#btnEditarSalvar').on('click', function () {
        var  id, nome, descricao, telefone, capa, dataPost;
        nome = $('#txtEditarNome').val();
        descricao = $('#txtEditarDescricao').val();
        telefone = $('#txtEditarTelefone').val();
        capa = $('#editarCapa').attr('src');
        id = elementId;
        dataPost = {id:id, nome: nome, descricao: descricao, telefone: telefone, capa: capa};
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/atualizar'), dataPost, function (response) {
            console.log(response);
        });
        $("#modalNewEdit").modal('hide');
        location.reload();
    });

    $(document).on('click', '.editar, .remover', function () {
        element = $(this).parent();
        elementId = $(this).parent().find('h4').data('id');
        
    });

    $('.editar').on('click', function () {
        var dataPost, id;
        id = $(this).parent().find('h4').data('id');
        dataPost = {id: id};
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/buscarporid'), dataPost, function (response) {
            if (response.sucesso) {
                console.log('foi');
                $('#txtEditarNome').val(response.lab.nome);
                $('#txtEditarDescricao').val(response.lab.descricao);
                $('#txtEditarTelefone').val(response.lab.telefone);
                $('#capa').attr('src', response.lab.capa);
            }
        });
    });

    $(document).on('click', '#btnRemover', function () {
        console.log(element);
        var dataPost = {id: elementId};
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/remover'), dataPost, function (response) {
            $(element).parent().remove();
        });
        $("#modalRemover").modal('hide');
    });
});

