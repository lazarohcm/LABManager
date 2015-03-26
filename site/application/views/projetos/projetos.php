<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Projetos</h1>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
        <?php foreach ($projetos as $projeto) { ?>
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail projeto">
                    <img src="<?php echo stream_get_contents($projeto->getImagem()); ?>" alt="...">
                    <div class="caption">
                        <h3>
                            <a href="<?php echo site_url() . "/projetos/visualizar/" . $projeto->getId(); ?>">
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