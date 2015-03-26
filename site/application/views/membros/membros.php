<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Membros</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
        <h3>Professores</h3>
        <hr>
        <?php foreach ($professores as $professor) { ?>
            <div class="col-xs-6 col-sm-3 col-md-3 text-center col-membro">
                <div class="thumbnail">
                    <a href="<?php echo site_url("/membros/visualizar/" . $professor->getId()); ?>">
                        <img class="img-responsive" src="<?php echo stream_get_contents($professor->getFoto()); ?>" alt="">
                    </a>
                    <div class="caption">
                        <h3 class="nome-membro">
                            <a href="<?php echo site_url("/membros/visualizar/" . $professor->getId()); ?>">
                                <?php echo $professor->getNome(); ?>
                            </a>

                            <br>
                        </h3>
                        <p class="bio-membro">
                            <?php echo substr($professor->getBiografia(), 0, 140) . '...'; ?> 
                        </p>
                        <ul class="list-inline">
                            <li><a href="<?php echo $professor->getFacebook(); ?>"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="<?php echo $professor->getLinkdl(); ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="<?php echo $professor->getTwitter(); ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="row">
        <h3>Pesquisadores</h3>
        <hr>
        <?php foreach ($pesquisadores as $pesquisador) { ?>
            <div class="col-xs-6 col-sm-3 col-md-3 text-center col-membro">
                <div class="thumbnail">
                    <a href="<?php echo site_url("/membros/visualizar/" . $pesquisador->getId()); ?>">
                        <img class="img-responsive" src="<?php echo stream_get_contents($pesquisador->getFoto()); ?>" alt="">
                    </a>
                    <div class="caption">
                        <h3 class="nome-membro">
                            <a href="<?php echo site_url("/membros/visualizar/" . $pesquisador->getId()); ?>">
                                <?php echo $pesquisador->getNome(); ?>
                            </a>

                            <br>
                        </h3>
                        <p class="bio-membro">
                            <?php echo substr($pesquisador->getBiografia(), 0, 140) . '...'; ?> 
                        </p>
                        <ul class="list-inline">
                            <li><a href="<?php echo $pesquisador->getFacebook(); ?>"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="<?php echo $pesquisador->getLinkdl(); ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="<?php echo $pesquisador->getTwitter(); ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="row">
        <h3>Doutorantos</h3>
        <hr>
        <?php foreach ($doutorandos as $doutorando) { ?>
            <div class="col-xs-6 col-sm-3 col-md-3 text-center col-membro">
                <div class="thumbnail">
                    <a href="<?php echo site_url("/membros/visualizar/" . $doutorando->getId()); ?>">
                        <img class="img-responsive" src="<?php echo stream_get_contents($doutorando->getFoto()); ?>" alt="">
                    </a>
                    <div class="caption">
                        <h3 class="nome-membro">
                            <a href="<?php echo site_url("/membros/visualizar/" . $doutorando->getId()); ?>">
                                <?php echo $doutorando->getNome(); ?>
                            </a>

                            <br>
                        </h3>
                        <p class="bio-membro">
                            <?php echo substr($doutorando->getBiografia(), 0, 140) . '...'; ?> 
                        </p>
                        <ul class="list-inline">
                            <li><a href="<?php echo $doutorando->getFacebook(); ?>"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="<?php echo $doutorando->getLinkdl(); ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="<?php echo $doutorando->getTwitter(); ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="row">
        <h3>Mestrandos</h3>
        <hr>
        <?php foreach ($mestrandos as $mestrando) { ?>
            <div class="col-xs-6 col-sm-3 col-md-3 text-center col-membro">
                <div class="thumbnail">
                    <a href="<?php echo site_url("/membros/visualizar/" . $mestrando->getId()); ?>">
                        <img class="img-responsive" src="<?php echo stream_get_contents($mestrando->getFoto()); ?>" alt="">
                    </a>
                    <div class="caption">
                        <h3 class="nome-membro">
                            <a href="<?php echo site_url("/membros/visualizar/" . $mestrando->getId()); ?>">
                                <?php echo $mestrando->getNome(); ?>
                            </a>

                            <br>
                        </h3>
                        <p class="bio-membro">
                            <?php echo substr($mestrando->getBiografia(), 0, 140) . '...'; ?> 
                        </p>
                        <ul class="list-inline">
                            <li><a href="<?php echo $mestrando->getFacebook(); ?>"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="<?php echo $mestrando->getLinkdl(); ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="<?php echo $mestrando->getTwitter(); ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="row">
        <h3>Graduandos</h3>
        <hr>
        <?php foreach ($graduandos as $graduando) { ?>
            <div class="col-xs-6 col-sm-3 col-md-3 text-center col-membro">
                <div class="thumbnail">
                    <a href="<?php echo site_url("/membros/visualizar/" . $graduando->getId()); ?>">
                        <img class="img-responsive" src="<?php echo stream_get_contents($graduando->getFoto()); ?>" alt="">
                    </a>
                    <div class="caption">
                        <h3 class="nome-membro">
                            <a href="<?php echo site_url("/membros/visualizar/" . $graduando->getId()); ?>">
                                <?php echo $graduando->getNome(); ?>
                            </a>

                            <br>
                        </h3>
                        <p class="bio-membro">
                            <?php echo substr($graduando->getBiografia(), 0, 140) . '...'; ?> 
                        </p>
                        <ul class="list-inline">
                            <li><a href="<?php echo $graduando->getFacebook(); ?>"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="<?php echo $graduando->getLinkdl(); ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="<?php echo $graduando->getTwitter(); ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="row">
        <h3 id="professores">Técnico Admistrativo (Falta Implementar)</h3>
        <hr>
        <div class="col-xs-6 col-sm-3 col-md-3 text-center col-membro">
            <div class="thumbnail">
                <a href="usuario.html">
                    <img class="img-responsive" src="http://placehold.it/350x200/81326D/ffffff&text=Foto da Pessoa" alt="">
                </a>
                <div class="caption">
                    <h3 class="nome-membro">
                        <a href="usuario.html">
                            Lázaro Henrique de Carvalho Marques
                        </a>

                        <br>
                        <small>Professor</small>
                    </h3>
                    <p class="bio-membro">
                        Aluno do curso de Ciência da Computação 
                    </p>
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <h3>Graduandos</h3>
        <hr>
        <?php foreach ($membrosAntigos as $membroAntigo) { ?>
            <div class="col-xs-6 col-sm-3 col-md-3 text-center col-membro">
                <div class="thumbnail">
                    <a href="<?php echo site_url("/membros/visualizar/" . $membroAntigo->getId()); ?>">
                        <img class="img-responsive" src="<?php echo stream_get_contents($membroAntigo->getFoto()); ?>" alt="">
                    </a>
                    <div class="caption">
                        <h3 class="nome-membro">
                            <a href="<?php echo site_url("/membros/visualizar/" . $membroAntigo->getId()); ?>">
                                <?php echo $membroAntigo->getNome(); ?>
                            </a>
                            
                            <br>
                            <small><?php echo $membroAntigo->getTipo(); ?></small>
                        </h3>
                        <p class="bio-membro">
                            <?php echo substr($membroAntigo->getBiografia(), 0, 140) . '...'; ?> 
                        </p>
                        <ul class="list-inline">
                            <li><a href="<?php echo $membroAntigo->getFacebook(); ?>"><i class="fa fa-2x fa-facebook-square"></i></a>
                            </li>
                            <li><a href="<?php echo $membroAntigo->getLinkdl(); ?>"><i class="fa fa-2x fa-linkedin-square"></i></a>
                            </li>
                            <li><a href="<?php echo $membroAntigo->getTwitter(); ?>"><i class="fa fa-2x fa-twitter-square"></i></a>
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