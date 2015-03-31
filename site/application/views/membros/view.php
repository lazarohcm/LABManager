<div class="thumbnail content-usuario">
    <img src="<?php echo stream_get_contents($membro->getFoto()); ?>" alt="...">
    <div class="caption-full">
        <h4 class="text-center">
            <a target="_blank" href="<?php echo $membro->getLattes(); ?>">Lázaro Henrique de Carvalho Marques</a>
        </h4>
    </div>
    <div class="row">
        <ul class="list-inline text-center">
            <li>
                <a target="_blank" class="btn-user-social" href="<?php echo $membro->getFacebook(); ?>">
                    <i class="fa fa-fw fa-facebook"></i>
                </a>
            </li>
            <li>
                <a target="_blank" class="btn-user-social" href="<?php echo $membro->getLinkdl(); ?>">
                    <i class="fa fa-fw fa-twitter"></i>
                </a>
            </li>
            <li>
                <a target="_blank" class="btn-user-social" href="<?php echo $membro->getTwitter(); ?>">
                    <i class="fa fa-fw fa-linkedin"></i>
                </a>
            </li>
        </ul>
        <div class="text-center">

            <ul class="list-inline">
                <li>
                    <span><strong>Áreas de interesse: </strong></span>
                </li>
                <?php
                $areas = explode(',', $membro->getArea_interesse());
                $labels = array('warning', 'info', 'success');
                foreach ($areas as $key => $area) { ?>
                <li>
                    <span class="label label-<?php echo $labels[$key%3] ?>"><?php echo $area ?></span>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <br>
        <div class="text-center">
            <ul class="list-inline">
                <li>
                    <i class="fa fa-phone"></i> <?php echo $membro->getTelefone(); ?>
                </li>
                <li>
                    <i class="fa fa-envelope"> <?php echo $membro->getEmail(); ?></i>
                </li>
            </ul>
        </div>
    </div>


    <hr>
    <div class="row">
        <div class="col-md-5 col-sm-4 col-xs-6">
            <label>Laboratório:</label>
            <a href="<?php echo site_url("/laboratorios/visualizar/").'/'.strtolower($membro->getLaboratorio()->getNome()); ?>">
                <?php echo $membro->getLaboratorio()->getNome(); ?>
            </a>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
            <label>Membro desde: </label>
            <?php echo $membro->getData_entrada()->format('d/m/Y'); ?>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-6">
            <label>Até: </label>
            <?php echo $membro->getData_saida() != NULL ? $membro->getData_saida()->format('d/m/Y') : 'Hoje'; ?>
        </div>

        <div class="col-md-12 col-lg-12 col-xs-12 text-justify">
            <hr>
            <label>Bio:  </label>
            <p><?php echo $membro->getBiografia(); ?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <h3>Projetos</h3>
            <div class="col-sm-6 col-md-4 col-xs-6">
                <div class="thumbnail projeto">
                    <img src="http://placehold.it/460x250/e67e22/ffffff&text=HTML5" alt="...">
                    <div class="caption">
                        <h3><a href="projeto.html">Título do Projeto</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xs-6">
                <div class="thumbnail projeto">
                    <img src="http://placehold.it/460x250/e67ede/ffffff&text=HTML5" alt="...">
                    <div class="caption">
                        <h3><a href="projeto.html">Título do Projeto</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xs-6">
                <div class="thumbnail projeto">
                    <img src="http://placehold.it/460x250/2c7e22/ffffff&text=HTML5" alt="...">
                    <div class="caption">
                        <h3><a href="projeto.html">Título do Projeto</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-xs-6">
                <div class="thumbnail projeto">
                    <img src="http://placehold.it/460x250/e62d22/ffffff&text=HTML5" alt="...">
                    <div class="caption">
                        <h3><a href="projeto.html">Título do Projeto</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>