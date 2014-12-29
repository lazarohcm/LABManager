$(document).ready(function() {
    $('.data-table-javascript').dataTable( {
            "language": {
                "url": "assets/js/plugins/dataTables/dataTables.brazilian.lang"
            }
        } );
    $('.mask-cep').mask("99.999-999");
    $('.mask-cnpj').mask("99.999.999/9999-99");
    $('.mask-cpf').mask("999.999.999-99");
    $('.mask-phone').mask("(99) 9999-9999?9").ready(function(event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if (phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    });
    $('.mask-date').mask("99/99/9999");
});


