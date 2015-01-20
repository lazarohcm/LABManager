<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css">
<!-- Page Content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Membros
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url() . "/home"; ?>">Inicio</a>
                </li>
                <li class="active">Membros</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- /.row -->
    <div class="row" style="padding-top: 0px;">
        <div class="col-md-9" role="main">
            <div>
                <div class="col-lg-12">
                    <h2 id="professores" class="page-header">Professores</h2>
                </div>
                <?php foreach ($professores as $professor) { ?>
                    <div class="col-md-4 text-center">
                        <div class="thumbnail">
                            <a href="<?php echo site_url("/membros/visualizar/" . $professor->getId()); ?>">
                                <img class="img-responsive" src="<?php echo stream_get_contents($professor->getFoto()); ?>" alt="">
                            </a>
                            <img class="img-responsive" src="<?php echo stream_get_contents($professor->getFoto()); ?>" alt="">
                            <div class="caption">
                                <h3>
                                    <a href="<?php echo site_url("/membros/visualizar/" . $professor->getId()); ?>">
                                        <?php echo $professor->getNome(); ?>
                                    </a>

                                    <br>
                                    <small>Professor</small>
                                </h3>
                                <p>
                                    <?php
                                    echo substr($professor->getBiografia(), 0, 140);
                                    ?>
                                </p>
                                <ul class="list-inline">
                                    <li><a href="
                                        <?php
                                        if ($professor->getFacebook() != NULL) {
                                            echo $professor->getFacebook();
                                        }
                                        ?>">
                                            <i class="fa fa-2x fa-facebook-square"></i>
                                        </a>
                                    </li>
                                    <li><a href="<?php
                                        if ($professor->getLinkdl() != NULL) {
                                            echo $professor->getLinkdl();
                                        }
                                        ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                    </li>
                                    <li><a href="<?php
                                        if ($professor->getTwitter() != NULL) {
                                            echo $professor->getTwitter();
                                        }
                                        ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div >
                <div class="col-lg-12">
                    <h2 id="pesquisadores" class="page-header">Pesquisadores</h2>
                </div>
                <?php foreach ($pesquisadores as $pesquisador) { ?>
                    <div class="col-md-4 text-center">
                        <div class="thumbnail">

                            <a href="<?php echo site_url("/membros/visualizar/" . $pesquisador->getId()); ?>">
                                <img class="img-responsive" src="<?php echo stream_get_contents($pesquisador->getFoto()); ?>" alt="">
                            </a>
                            <div class="caption">
                                <h3>
                                    <a href="<?php echo site_url("/membros/visualizar/" . $pesquisador->getId()); ?>">
                                        <?php echo $pesquisador->getNome(); ?>
                                    </a>
                                    <br>
                                    <small>Professor</small>
                                </h3>
                                <p>
                                    <?php
                                    echo substr($pesquisador->getBiografia(), 0, 140);
                                    ?>
                                </p>
                                <ul class="list-inline">
                                    <li><a href="
                                        <?php
                                        if ($pesquisador->getFacebook() != NULL) {
                                            echo $pesquisador->getFacebook();
                                        }
                                        ?>">
                                            <i class="fa fa-2x fa-facebook-square"></i>
                                        </a>
                                    </li>
                                    <li><a href="<?php
                                        if ($pesquisador->getLinkdl() != NULL) {
                                            echo $pesquisador->getLinkdl();
                                        }
                                        ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                    </li>
                                    <li><a href="<?php
                                        if ($pesquisador->getTwitter() != NULL) {
                                            echo $pesquisador->getTwitter();
                                        }
                                        ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div >
                <div class="col-lg-12">
                    <h2 id="doutorantos" class="page-header">Doutorantos</h2>
                </div>
                <?php foreach ($doutorandos as $doutorando) { ?>
                    <div class="col-md-4 text-center">
                        <div class="thumbnail">

                            <a href="<?php echo site_url("/membros/visualizar/" . $doutorando->getId()); ?>">
                                <img class="img-responsive" src="<?php echo stream_get_contents($doutorando->getFoto()); ?>" alt="">
                            </a>
                            <div class="caption">
                                <h3>
                                    <a href="<?php echo site_url("/membros/visualizar/" . $doutorando->getId()); ?>">
                                        <?php echo $doutorando->getNome(); ?>
                                    </a>
                                    <small>Professor</small>
                                </h3>
                                <p>
                                    <?php
                                    echo substr($doutorando->getBiografia(), 0, 140);
                                    ?>
                                </p>
                                <ul class="list-inline">
                                    <li><a href="
                                        <?php
                                        if ($doutorando->getFacebook() != NULL) {
                                            echo $doutorando->getFacebook();
                                        }
                                        ?>">
                                            <i class="fa fa-2x fa-facebook-square"></i>
                                        </a>
                                    </li>
                                    <li><a href="<?php
                                        if ($doutorando->getLinkdl() != NULL) {
                                            echo $doutorando->getLinkdl();
                                        }
                                        ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                    </li>
                                    <li><a href="<?php
                                        if ($doutorando->getTwitter() != NULL) {
                                            echo $doutorando->getTwitter();
                                        }
                                        ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div >
                <div class="col-lg-12">
                    <h2 id="mestrandos" class="page-header">Mestrandos</h2>
                </div>
                <?php foreach ($mestrandos as $mestrando) { ?>
                    <div class="col-md-4 text-center">
                        <div class="thumbnail">

                            <a href="<?php echo site_url("/membros/visualizar/" . $mestrando->getId()); ?>">
                                <img class="img-responsive" src="<?php echo stream_get_contents($mestrando->getFoto()); ?>" alt="">
                            </a>
                            <div class="caption">
                                <h3>
                                    <a href="<?php echo site_url("/membros/visualizar/" . $mestrando->getId()); ?>">
                                        <?php echo $mestrando->getNome(); ?>
                                    </a>
                                    <br>
                                    <small>Professor</small>
                                </h3>
                                <p>
                                    <?php
                                    echo substr($mestrando->getBiografia(), 0, 140);
                                    ?>
                                </p>
                                <ul class="list-inline">
                                    <li><a href="
                                        <?php
                                        if ($mestrando->getFacebook() != NULL) {
                                            echo $mestrando->getFacebook();
                                        }
                                        ?>">
                                            <i class="fa fa-2x fa-facebook-square"></i>
                                        </a>
                                    </li>
                                    <li><a href="<?php
                                        if ($mestrando->getLinkdl() != NULL) {
                                            echo $mestrando->getLinkdl();
                                        }
                                        ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                    </li>
                                    <li><a href="<?php
                                        if ($mestrando->getTwitter() != NULL) {
                                            echo $mestrando->getTwitter();
                                        }
                                        ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div >
                <div class="col-lg-12">
                    <h2 id="graduandos" class="page-header">Graduandos</h2>
                </div>
                <?php foreach ($graduandos as $graduando) { ?>
                    <div class="col-md-4 text-center">
                        <div class="thumbnail">

                            <a href="<?php echo site_url("/membros/visualizar/" . $graduando->getId()); ?>">
                                <img class="img-responsive" src="<?php echo stream_get_contents($graduando->getFoto()); ?>" alt="">
                            </a>
                            <div class="caption">
                                <h3>
                                    <a href="<?php echo site_url("/membros/visualizar/" . $graduando->getId()); ?>">
                                        <?php echo $graduando->getNome(); ?>
                                    </a>
                                    <br>
                                    <small>Professor</small>
                                </h3>
                                <p>
                                    <?php
                                    echo substr($graduando->getBiografia(), 0, 140);
                                    ?>
                                </p>
                                <ul class="list-inline">
                                    <li><a href="
                                        <?php
                                        if ($graduando->getFacebook() != NULL) {
                                            echo $graduando->getFacebook();
                                        }
                                        ?>">
                                            <i class="fa fa-2x fa-facebook-square"></i>
                                        </a>
                                    </li>
                                    <li><a href="<?php
                                        if ($graduando->getLinkdl() != NULL) {
                                            echo $graduando->getLinkdl();
                                        }
                                        ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                    </li>
                                    <li><a href="<?php
                                        if ($graduando->getTwitter() != NULL) {
                                            echo $graduando->getTwitter();
                                        }
                                        ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div >
                <div class="col-lg-12">
                    <h2 id="membrosAntigos" class="page-header">Membros Antigos</h2>
                </div>
                <?php foreach ($membrosAntigos as $membroAntigo) { ?>
                    <div class="col-md-4 text-center">
                        <div class="thumbnail">

                            <a href="<?php echo site_url("/membros/visualizar/" . $membroAntigo->getId()); ?>">
                                <img class="img-responsive" src="<?php echo stream_get_contents($membroAntigo->getFoto()); ?>" alt="">
                            </a>
                            <div class="caption">
                                <h3>
                                    <a href="<?php echo site_url("/membros/visualizar/" . $membroAntigo->getId()); ?>">
                                        <?php echo $membroAntigo->getNome(); ?>
                                    </a>
                                    <br>
                                    <small><?php echo $membroAntigo->getTipo(); ?></small>
                                </h3>
                                <p>
                                    <?php
                                    echo substr($membroAntigo->getBiografia(), 0, 140);
                                    ?>
                                </p>
                                <ul class="list-inline">
                                    <li><a href="
                                        <?php
                                        if ($membroAntigo->getFacebook() != NULL) {
                                            echo $membroAntigo->getFacebook();
                                        }
                                        ?>">
                                            <i class="fa fa-2x fa-facebook-square"></i>
                                        </a>
                                    </li>
                                    <li><a href="<?php
                                        if ($membroAntigo->getLinkdl() != NULL) {
                                            echo $membroAntigo->getLinkdl();
                                        }
                                        ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                    </li>
                                    <li><a href="<?php
                                        if ($membroAntigo->getTwitter() != NULL) {
                                            echo $membroAntigo->getTwitter();
                                        }
                                        ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!--                <div class="col-md-3">
                            <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix sidebar">
                                <ul class="nav sidenav" data-spy="affix" data-offset-top="290" data-offset-bottom="450">
                                    <li class="active">
                                        <a href="#professores">Professores</a>
                                        <ul class="nav">
                                            <li><a href="#grunt-installing">Algo</a></li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a href="#pesquisadores">Pesquisadores</a>
                                    </li>
                                    <li>
                                        <a href="#doutorantos">Doutorandos</a>
                                    </li>
                                    <li>
                                        <a href="#mestrandos">Alunos de mestrado</a>
                                    </li>
                                    <li>
                                        <a href="#graduandos">Alunos da graduação</a>
                                        <ul class="nav">
                                            <li><a href="#examples-framework">Algo</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#membrosAntigos">Membros antigos</a>
                                        <ul class="nav">
                                            <li><a href="#tools-bootlint">Algo</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#tecnico-administrativo">Tecnico/Administrativo</a>
                                    </li>
                                    <li>
                                        <a class="back-to-top" href="#top">
                                            Topo
                                        </a>
                                    </li>
                                </ul>
        
        
                            </nav>
                        </div>-->
    </div>


    <hr>

</div>
<!-- /.container -->
<script>
    $('body').scrollspy({
        target: '.bs-docs-sidebar',
        offset: 40
    });
    $("#affix-ul").affix({
        offset: {
            top: 290
        }
    });
</script>