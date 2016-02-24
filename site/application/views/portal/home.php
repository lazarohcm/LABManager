<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <h1 class="page-header">
                Bem-vindo ao NCA!
            </h1>
            <h3> O Núcleo de Computação Aplicada é composto pelos seguintes laboratórios:</h3>
        </div>
        <div class="row painel-laboratorio">
            <?php foreach ($laboratorios as $laboratorio) { ?>
                <div class="col-md-4">
                    <div class="panel panel-default panel-lab">
                        <div class="panel-heading">
                            <h4><?php echo $laboratorio->getNome(); ?></h4>
                        </div>
                        <div class="panel-capa-laboratorio">
                            <img src="<?php echo stream_get_contents($laboratorio->getCapa()); ?>" class="img-responsive" alt="Capa Labarotório"/>
                            <h4><?php echo $laboratorio->getNome(); ?></h4>
                        </div>
                        <div class="panel-body">
                            <p><?php echo substr($laboratorio->getDescricao(), 0, 160) . '...'; ?></p>
                            <a href="<?php echo site_url('/laboratorios/visualizar/' . strtolower($laboratorio->getSigla())) ?>" 
                               class="btn btn-primary">Ir para página</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</header>
<!-- Projetos Section -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Projetos</h2>
    </div>
    <div class="row">
        <?php foreach ($projetos as $projeto) { ?>
            <div class="col-md-4 col-sm-6">
                <div class="thumbnail projeto">
                    <a href="<?php echo site_url() . "/projetos/visualizar/" . $projeto->getId(); ?>">
                        <img class="img-responsive img-inicio-projeto img-hover" src="<?php echo stream_get_contents($projeto->getImagem()); ?>" alt="...">
                    </a>
                    <div class="caption">
                        <h4>
                            <a href="<?php echo site_url() . "/projetos/visualizar/" . $projeto->getId(); ?>">
                                <?php echo $projeto->getNome(); ?>
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        <?php } ?>    
    </div>
</div>
<!-- Fim Projetos Section -->