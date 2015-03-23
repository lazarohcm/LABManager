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
        <link href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <!-- NCA CSS-->
        <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet" type="text/css">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>

        <!--         Bootstrap core JavaScript
                ================================================== 
                 Placed at the end of the document so the pages load faster 
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
                            $(this).find('input').each(function () {
                                $(this).val('');
                            });
                            $(this).find('img').each(function () {
                                var width = $(this).data('image-width');
                                var height = $(this).data('image-height');
                                $(this).data('src', 'holder.js/' + width + 'x' + height);
                                $(this).attr('src', '');
                                Holder.run({});
                            });
                            $(this).find('select').each(function () {
                                $(this).prop('selectedIndex', 0);
                            });
                            $(this).find('input:checkbox').each(function () {
                                $(this).attr('checked', false);
                            });
        
                            $(this).find('textarea').each(function () {
                                $(this).val('');
                            });
                        });
                    });
        
                </script>-->
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-default">
            <div class="container container-navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-2">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo site_url() . "/home"; ?>">
                        <img alt="" src="<?php echo base_url(); ?>assets/img/nca.png">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse col-md-6" id="menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?php echo site_url() . "/noticias"; ?>">Notícias</a>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Laboratórios <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php foreach ($laboratorios as $laboratorio) { ?>
                                    <li>
                                        <a href="<?php
                                        echo site_url() . "/laboratorios/visualizar/";
                                        echo strtolower($laboratorio->getNome());
                                        ?>">
                                            <?php echo $laboratorio->getNome(); ?></a>
                                    </li> 
                                <?php } ?>
                                <li>
                                    <a href="laboratorio.html"> LabPAI</a>
                                </li>
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
                            <!--                            <li class="dropdown">
                                                            <a href="<?php echo site_url() . "/dashboard/"; ?>">Administração</a>
                                                        </li>-->
                        <?php } ?>
                        <li>
                            <a href="<?php echo site_url() . "/home/agendar"; ?>">Agendar</a>
                        </li>
                        <li class="page-scroll">
                            <a href="<?php echo site_url() . "/home/contato"; ?>">Contato</a>
                        </li>
                    </ul>
                    <?php if (isset($usuario) && $usuario != NULL) { ?>
                            <!--<a style="margin-top: 30px;" href="<?php echo site_url() . "/acesso/sair"; ?>" type="button" class="btn btn-danger navbar-btn pull-right">Sair</a>-->
                    <?php } else { ?>
                            <!--<a style="margin-top: 30px;" href="<?php echo site_url() . "/acesso"; ?>" type="button" class="btn btn-success navbar-btn pull-right">Entrar</a>-->
                    <?php } ?>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>


        <div class="container">
            <div class="dashboar-menu">
                <?php
                if (isset($menu)) {
                    echo $menu;
                }
                ?> 
            </div>
            <?php echo $contents; ?>
        </div>

        <!-- Footer -->
        <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3>Localização</h3>
                            <p>
                                Av. dos Portugueses, 1966
                                Bacanga - CEP 65080-805
                                São Luís - MA 
                            </p>
                            <a class="btn btn-default" href="<?php echo site_url() . "/home/contato"; ?>">Mais</a>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>Na Web</h3>
                            <ul class="list-inline">
                                <li>
                                    <a target="_blank" href="https://www.facebook.com/nucleo.decomputacaoaplicada" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/+nucleo.decomputacaoaplicada/" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com/nucleo.decomputacaoaplicada" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>Mais informações</h3>
                            <p>Algo a mais.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 copyright">
                            <a href="http://www.lazarohenrique.com"> Copyright &copy; Núcleo de Computação Aplicada 2015 </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>

