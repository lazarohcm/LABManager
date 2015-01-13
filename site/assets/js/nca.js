$(document).ready(function () {
    $('.table').dataTable({
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
});

function ajaxMessage() {
    $.blockUI({centerY: 0, css: {
            width: '35%',
            border: 'none',
        },
        baseZ: 2000,
        message: '<h1 style="font-size:150%"><img src="' + js_site_url('assets/img/ajax-loader.gif') + '"/> Aguarde...</h1>'
    });
}

// Unblock when ajax activity stops 
$(document).ajaxStop($.unblockUI);

