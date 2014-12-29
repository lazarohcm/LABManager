$(document).ready(function () {

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

