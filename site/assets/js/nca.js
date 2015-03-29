function initNotification(dataResponse) {
    var tipo, titulo;
    if (dataResponse.sucesso) {
        titulo = 'Sucesso: ';
        tipo = 'success';
    } else {
        titulo = 'Erro: ';
        tipo = 'danger';
    }
    dataResponse.sucesso ? tipo = 'success' : tipo = 'danger';
    var notify = $.notify(
            {
                icon: 'fa fa-check',
                title: '<strong>' + titulo + '</strong>',
                message: dataResponse.msg
            },
    {
        type: tipo,
        delay: 0,
        z_index: 1042,
        placement: {
            from: "top",
            align: "right"
        },
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        newest_on_top: true
    }
    );
    setTimeout(function () {
        notify.close();
    }, 3000);
}

function traduzirTabela(tableSelector) {
    $(tableSelector).dataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });
}


function ajaxMessage() {
    $.blockUI({centerY: 0, css: {
            width: '35%',
            border: 'none',
        },
        baseZ: 2000,
        message: '<h1 style="font-size:150%"><img src="' + js_site_url('assets/img/loader.gif') + '"/> Aguarde...</h1>'
    });
}

function previewFile(idImg, idInput) {
    var preview = document.querySelector('#'+idImg); //selects the query named img
    var file = document.querySelector('#'+idInput).files[0]; //sames as here
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file); //reads the data as a URL
    } else {
        preview.src = "";
    };
}

function disablePage(){
    $('body').append('<div class="overlay"></div>');
}
