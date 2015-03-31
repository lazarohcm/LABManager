<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Publicações
        </h1>
    </div>
</div>
<div class="col-lg-12">
    <?php foreach ($publicacoesPorAno as $key => $ano) { ?>
        <div class="row">
            <div class="well well-sm"><strong><?php echo $key; ?></strong></div>
            <ul>
                <?php foreach ($ano as $publicacao) { 
                    $autores = explode('/', $publicacao->getAutores());
                    ?>
                    <li class="publication">
                        <?php 
                            foreach($autores as $autor){ ?>
                                <a href="#" class="author"><?php echo $autor ?>, </a>
                            <?php } ?>
                        et al. (<?php echo $publicacao->getData()->format('Y'); ?>).  
                        <a href="#" class="title"><?php echo $publicacao->getTitulo(); ?></a>
<!--                    <u class="">Revista/Evento.</u>-->
                    <a href="<?php echo $publicacao->getLinkDownload(); ?>" class="fa fa-file-pdf-o fa-2x">  </a>
                    </li>
    <?php } ?>
            </ul>
        </div>
<?php } ?>
</div>
