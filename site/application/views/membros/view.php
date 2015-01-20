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
                <?php echo $membro->getBiografia(); ?>
            </div>
        </div>
    </div>
</div>

