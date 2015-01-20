<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css">
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $membro->getNome(); ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo site_url() . "/home"; ?>">Home</a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url() . "/noticias"; ?>">Notícias</a>
                </li>
                <li class="active"><?php echo $membro->getId(); ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="col-md-9 col-md-offset-2">

        <div class="thumbnail">
            <img class="img-responsive" src="<?php echo stream_get_contents($membro->getFoto()); ?>" alt="" width="350">
            <div class="caption-full">
                <h4 class="text-center"><a href="#"><?php echo $membro->getNome(); ?></a>
                </h4>
                <ul class="list-inline col-md-offset-5">
                    <li><a href="
                        <?php
                        if ($membro->getFacebook() != NULL) {
                            echo $membro->getFacebook();
                        }
                        ?>">
                            <i class="fa fa-2x fa-facebook-square"></i>
                        </a>
                    </li>
                    <li><a href="<?php
                        if ($membro->getLinkdl() != NULL) {
                            echo $membro->getLinkdl();
                        }
                        ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                    </li>
                    <li><a href="<?php
                        if ($membro->getTwitter() != NULL) {
                            echo $membro->getTwitter();
                        }
                        ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                    </li>
                    <li><a href="<?php
                        if ($membro->getLattes() != NULL) {
                            echo $membro->getLattes();
                        }
                        ?>"><strong>Lattes</strong></a>
                    </li>
                </ul>
                <div class="form-group text-center">
                    <label>Áreas de interesse:</label>
                    <p><?php echo $membro->getArea_interesse(); ?></p>
                    <hr>
                </div>
                <div class="container">
                    <h3>Sobre</h3>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Laboratório:</label>
                            <a href="<?php echo site_url('/laboratorios/lab/' . strtolower($membro->getLaboratorio()->getNome())); ?>">
                                <?php echo $membro->getLaboratorio()->getNome(); ?>
                            </a>
                        </div>
                        <div class=" form-group col-md-3">
                            <label>Desde de: </label>
                            <?php echo $membro->getData_entrada()->format('d/m/Y'); ?>
                        </div>
                        <div class=" form-group col-md-3">
                            <label>Até</label>
                            <?php echo $membro->getData_saida() != NULL ? $membro->getData_saida()->format('d/m/Y') : 'Hoje'; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Bio:</label>
                        <p><?php echo $membro->getBiografia(); ?></p>
                    </div>
                    <hr>
                </div>

                <div class="container">
                    <h3>Contato</h3>
                    <div class="row">
                        
                        <div class="form-group col-md-4">
                            <label>Email: </label><?php echo $membro->getEmail(); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Telefone: </label><?php echo $membro->getTelefone(); ?>
                        </div>
                    </div>

                </div>

                <div class="container">
                    <hr>
                    <div class="form-group">
                        <h3>Projetos</h3>
                    </div> 
                </div>

            </div>
        </div>
    </div>
</div>

