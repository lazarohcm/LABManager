<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="A WEB application for share Lab informations">
        <meta name="author" content="Lázaro Henrique">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
        <title><?php echo $title; ?></title>
        <!-- Bootstrap CSS-->
        <link href="<?php echo base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
        <!-- NCA CSS-->
        <link href="<?php echo base_url(); ?>assets/css/nca.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>assets/css/dashboard.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/nca.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/holder.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-growl.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui.js"></script>
        <script src="<?php echo base_url(); ?>assets/DataTables/jquery.dataTables.js"></script>

        <script src="<?php echo base_url(); ?>assets/DataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $(document).ajaxStop($.unblockUI);
                $('.modal').on('show.bs.modal', function () {
                    $('.modal').find('input').each(function () {
                        $(this).val('');
                    });
                    $('.modal').find('img').each(function () {
                        var width = $(this).data('image-width');
                        var height = $(this).data('image-height');
                        $(this).attr('src', '');
                        Holder.run({});
                    });
                    $('.modal').find('select').each(function () {
                        $(this).prop('selectedIndex', 0);
                    });
                    $('.modal').find('input:checkbox').each(function () {
                        $(this).attr('checked', false);
                    });
                });
            });

        </script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    </head>

    <body style="height: 100%">
        <header class="navbar navbar-default navbar-static-top bs-docs-nav" id="top" role="banner">
            <div class="container">
                <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url() . "/home"; ?>">
                    <img  id="imgLogo" src="<?php echo base_url(); ?>assets/img/nca.png" alt="">
                </a>
                <nav class="collapse navbar-collapse bs-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo site_url() . "/noticias"; ?>">Notícias</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laboratórios<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php foreach ($laboratorios as $laboratorio) { ?>
                                    <li>
                                        <a href="<?php
                                        echo site_url() . "/laboratorios/lab/";
                                        echo strtolower($laboratorio->getNome());
                                        ?>">
                                            <?php echo $laboratorio->getNome(); ?></a>
                                    </li> 
                                <?php } ?>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo site_url() . "/projetos"; ?>">Projetos</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() . "/publicacoes"; ?>">Publicações</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() . "/membros"; ?>">Membros</a>
                        </li>
                        <?php if (isset($usuario) && $usuario != NULL) { ?>
                            <li>
                                <a href="<?php echo site_url() . "/dashboard/"; ?>">Dashboard</a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="agendar.html">Agendar</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url() . "/home/contato"; ?>">Contato</a>
                        </li>
                    </ul>
                    <?php if (isset($usuario) && $usuario != NULL) { ?>
                        <a style="margin-top: 16px;" href="<?php echo site_url() . "/acesso/sair"; ?>" type="button" class="btn btn-danger navbar-btn pull-right">Sair</a>
                    <?php } else { ?>
                        <a style="margin-top: 16px;" href="<?php echo site_url() . "/acesso"; ?>" type="button" class="btn btn-success navbar-btn pull-right">Entrar</a>
                    <?php } ?>
                </nav>
            </div>
        </header>

        <div class="container-fluid" style="min-height:100%;">
            <?php
            if (isset($menu)) {
                echo $menu;
            }
            ?>
            <?php echo $contents; ?>
            <hr>

            <!-- Footer -->
            <footer>
                <div class="container-fluid">
                    <p class="pull-right">Copyright &copy; Núcleo de Computação Aplicada 2014</p>
                </div>
            </footer>
        </div>
    </body>
</html>

