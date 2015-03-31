<div class="col-lg-12">
    <h1 class="page-header"><?php echo $projeto->getNome(); ?></h1>

    <!-- Projeto Row -->
    <div class="row">
        <div class="col-md-7">
            <img class="img-responsive" src="<?php echo stream_get_contents($projeto->getImagem()); ?>" alt="">
        </div>
        <div class="col-md-5">
            <h3>Detalhes</h3>
            <ul>
                <li>
                    <div class="form-group">
                        <label>Laboratório:</label>
                        <p>
                            <a href="<?php echo site_url('/laboratorios/visualizar/' . strtolower($projeto->getLaboratorio()->getSigla())); ?>">
                                <?php echo $projeto->getLaboratorio()->getNome(); ?>
                            </a>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label>Coordenador:</label>
                        <p>
                            <a href="<?php echo site_url('membros/visualizar/' . $projeto->getCoordenador()->getId()); ?>">
                                <?php echo $projeto->getCoordenador()->getNome(); ?>
                            </a>
                        </p>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label>Data de início do projeto:</label>
                        <?php echo $projeto->getData_inicio()->format('d/m/Y'); ?>
                    </div>
                </li>
                <li>
                    <div class="form-group">
                        <label>Data de termino do projeto:</label>
                        <?php echo $projeto->getData_termino() != NULL ? $projeto->getData_termino()->format('d/m/Y') : 'Ainda em andamento'; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Notícias -->
    <div class="row">
        <h3>Notícias</h3>
        <div class="col-md-4 col-sm-4 col-xs-5">
            <hr>
            <h4><a href="#">Notícia sobre o projeto</a></h4>
            <hr>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-5">
            <hr>
            <h4><a href="#">Notícia sobre o projeto</a></h4>
            <hr>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-5">
            <hr>
            <h4><a href="#">Notícia sobre o projeto</a></h4>
            <hr>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-5">
            <hr>
            <h4><a href="#">Notícia sobre o projeto</a></h4>
            <hr>
        </div>
    </div>

    <!-- Membros -->
    <div class="row">
        <h3>Membros</h3>
        <?php if ($projeto->getMembroProjeto()->isEmpty()) { ?>
            <h4 class="text-center" style="color: #ddd">Não foram encontrados membros para este projeto</h4>
            <br>
            <?php
        } else {
            foreach ($projeto->getMembroProjeto() as $membroProjeto) {
                ?>
                <div class="col-sm-3 col-md-3 text-center col-membro">
                    <div class="thumbnail">
                        <a href="<?php echo site_url("/membros/visualizar/" . $membroProjeto->getMembro()->getId()); ?>">
                            <img class="img-responsive" src="<?php echo stream_get_contents($membroProjeto->getMembro()->getFoto()); ?>" alt="">
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
}
?> 

    </div>
</div>
