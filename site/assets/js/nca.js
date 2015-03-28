    function initNotification(dataResponse){
        var tipo;
        dataResponse.sucesso ? tipo = 'success': tipo = 'danger';
        $.notify(
                {
                    icon: 'fa fa-check',
                    title: '<strong>Sucesso: </strong>',
                    message: dataResponse.msg
                },
                {
                    type: tipo,
                    delay: 3000,
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
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                            '<span data-notify="icon"></span> ' +
                            '<span data-notify="title">{1}</span> ' +
                            '<span data-notify="message">{2}</span>' +
                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                            '</div>'
                }
        );
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

// Unblock when ajax activity stops 
$(document).ajaxStop($.unblockUI);

//$.noty.defaults = {
//    layout: 'topRight',
//    theme: 'default',
//    callback: ''
//};

