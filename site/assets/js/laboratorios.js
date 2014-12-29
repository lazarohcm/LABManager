$(document).ready(function () {
    $(document).ajaxStop($.unblockUI);
    $('#btnSalvar').on('click', function () {
        var nome = $('#txtNomeLaboratorio').val();
        var descricao = $('#txtDescricao').val();
        var telefone = $('#txtTelefone').val();
        var dataPost = {nome: nome, descricao: descricao, telefone: telefone};
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/cadastrar'), dataPost, function (response) {
            console.log(response);
        });
        $("#modalNewEdit").modal('hide');
    });
    $(document).on('click', '.editar, .remover', function () {
        element = $(this).parent();
        elementId = $(this).parent().find('h4').data('id');
    });
    $(document).on('click', '#btnRemover', function () {
        console.log(element);
        var dataPost = {id: elementId};
        ajaxMessage();
        $.post(js_site_url('index.php/laboratorios/remover'), dataPost, function (response) {
            $(element).remove();
        });
        $("#modalRemover").modal('hide');
    });
});

