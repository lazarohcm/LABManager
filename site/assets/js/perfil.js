$(document).ready(function () {
    $('.image-preview').imagepreview();

    $('#btnSalvar').on('click', function () {
        var nome, email, telefone, lattes, areas, facebook, twitter, linkdin, sobre, foto, dataPost;
        nome = $('#nome').val();
        email = $('#email').val();
        telefone = $('#telefone').val();
        lattes = $('#lattes').val();
        areas = $('#areas').val();
        facebook = $('#facebook').val();
        twitter = $('#twitter').val();
        linkdin = $('#linkdin').val();
        sobre = $('#sobre').val();
        foto = $('#foto').attr('src');
        dataPost = {nome: nome, email: email, telefone: telefone, lattes: lattes, areas: areas, facebook: facebook, twitter: twitter, linkdin: linkdin,
            sobre: sobre, foto: foto};
        ajaxMessage();
        $.post(js_site_url('index.php/membros/atualizarperfil'), dataPost, function (response) {

        });
    });

    $('#btnAlterarSenha').on('click', function () {
        var senhaAtual, novaSenha, cfmNovaSenha, ok = false, dataPost;
        senhaAtual = $('#senhaAtual').val();
        novaSenha = $('#novaSenha').val();
        cfmNovaSenha = $('#cfmNovaSenha').val();

        if (!senhaAtual) {
            $('#senhaAtual').parent('div').addClass('has-error');
            $('#senhaAtual').parent('div').append('<strong class="alert-danger atual">Não pode ser nula</strong>');
        } else {
            $('#senhaAtual').parent('div').removeClass('has-error');
            $('#senhaAtual').parent('div').children('strong .atual').remove();
        }
        if (!novaSenha) {
            $('#novaSenha').parent('div').addClass('has-error');
            $('#novaSenha').parent('div').append('<strong class="alert-danger nova">Não pode ser nula</strong>');
        } else {
            $('#novaSenha').parent('div').removeClass('has-error');
            $('#novaSenha').parent('div').children('strong .nova').remove();
        }
        if (!cfmNovaSenha) {
            $('#cfmNovaSenha').parent('div').addClass('has-error');
            $('#cfmNovaSenha').parent('div').append('<strong class="alert-danger cfmNova">Não pode ser nula</strong>');
        } else {
            $('#cfmNovaSenha').parent('div').removeClass('has-error');
            $('#cfmNovaSenha').parent('div').children('strong .cfmNova').remove();
        }


        if ((novaSenha !== cfmNovaSenha) && !novaSenha && !cfmNovaSenha) {
            $('#cfmNovaSenha').parent('div').addClass('has-error');
            $('#cfmNovaSenha').parent('div').append('<strong class="alert-danger">As senhas não conferem</strong>');

        } else {
            if (senhaAtual && novaSenha && cfmNovaSenha) {
                ok = true;
            }
            $('#cfmNovaSenha').parent('div').removeClass('has-error');
            $('#cfmNovaSenha').parent('div').children('strong').remove();
        }

        dataPost = {senhaAtual: senhaAtual, novaSenha: novaSenha};

        if (ok) {
            ajaxMessage();
            $.post(js_site_url('index.php/membros/atualizarsenha'), dataPost, function (response) {
                if (!response.sucesso) {
                    $('#senhaAtual').parent('div').addClass('has-error');
                    $('#senhaAtual').parent('div').append('<strong class="alert-danger">' + response.msg + '</strong>');
                }
            });
        }

    });
});