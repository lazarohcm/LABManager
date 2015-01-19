<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $noticia->getTitulo(); ?>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo site_url() . "/home"; ?>">Home</a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url() . "/noticias"; ?>">Notícias</a>
                </li>
                <li class="active"><?php echo $noticia->getId(); ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="col-md-9 col-md-offset-2">

        <div class="thumbnail">
            <img class="img-responsive" src="<?php echo stream_get_contents($noticia->getCapa()); ?>" alt="" width="400">
            <div class="caption-full">
                <h4 class="text-center"><a href="#"><?php echo $noticia->getTitulo(); ?></a>
                </h4>
                <?php echo $noticia->getTexto(); ?>
            </div>
        </div>
    </div>
</div>

