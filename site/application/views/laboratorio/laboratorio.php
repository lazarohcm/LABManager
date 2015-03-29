<!-- Page Heading/Breadcrumbs -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $laboratorio->getNome(); ?></h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="thumbnail">
        <img class="img-responsive" src="<?php echo stream_get_contents($laboratorio->getCapa()); ?>" alt="">
        <div class="caption-full">
            <h4 class="text-center"><a href="#">Laboratório de Processamento e Análise de Imagens - LabPAI</a>
            </h4>
            <p><?php echo nl2br($laboratorio->getDescricao()); ?><p>
        </div>
        <div class="ratings">
            <p>
                <span class="fa fa-phone"></span>
                <?php echo $laboratorio->getTelefone(); ?>
            </p>
        </div>
    </div>

    <!-- Projetos -->
    <div class="row">
        <h2 class="page-header">Projetos</h2>
        <div class="row" id="projetos-lab">
            <?php foreach ($laboratorio->getProjeto() as $projeto) { ?>
                <div class="col-sm-4 col-md-4">
                    <div class="thumbnail projeto">
                        <img src="<?php echo stream_get_contents($projeto->getImagem()) ?>" alt="...">
                        <div class="caption">
                            <h3>
                                <a href="<?php echo site_url() . "/projetos/visualizar/".$projeto->getId(); ?>">
                                    <?php echo $projeto->getNome(); ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <!-- Membros -->
    <div class="row">
        <h2 class="page-header">Membros</h2>
        <div class="row" id="membros-lab">
            <?php foreach ($laboratorio->getMembro() as $membro) { ?>
                <div class="col-xs-6 col-sm-3 col-md-3 text-center col-membro">
                    <div class="thumbnail membro-lab">
                        <a href="<?php echo site_url("/membros/visualizar/" . $membro->getId()); ?>">
                            <img class="img-responsive" src="<?php echo stream_get_contents($membro->getFoto()); ?>" alt="">
                        </a>
                        <div class="caption">
                            <h3 class="nome-membro">
                                <a href="<?php echo site_url("/membros/visualizar/" . $membro->getId()); ?>">
                                    <?php echo $membro->getNome(); ?>
                                </a>

                                <br>
                                <small><?php echo $membro->getTipo(); ?></small>
                            </h3>
                            <p class="bio-membro">
                                <?php echo substr($membro->getBiografia(), 0, 140) . '...'; ?> 
                            </p>
                            <ul class="list-inline">
                                <li><a target="_blank" href="<?php echo $membro->getFacebook(); ?>"><i class="fa fa-2x fa-facebook-square"></i></a>
                                </li>
                                <li><a target="_blank" href="<?php echo $membro->getLinkdl(); ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                                </li>
                                <li><a target="_blank" href="<?php echo $membro->getTwitter(); ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>