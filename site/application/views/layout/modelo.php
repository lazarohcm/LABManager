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
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-growl.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.blockUI.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img  id="imgLogo" src="<?php echo base_url(); ?>assets/img/nca.png" alt="">
                    </a>
                </div>
                <form class="navbar-form navbar-right" role="search">
                    <a type="button" class="btn btn-default" href="login.html">Sair</a>
                </form> 
            </div>
        </div>

        <div class="container-fluid">
            <?php
            if (isset($menu)) {
                echo $menu;
            }
            ?>
            <?php echo $contents; ?>
        </div>
    </body>
</html>

