<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Notícias
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url() . "/home"; ?>">Home</a>
                </li>
                <li class="active">Notícias</li>
                <div style="position: relative; bottom: 14px" class="navbar-form navbar-right" role="search">
                    <div  class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar por título">
                    </div>
                    <button type="button" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Publicações Row -->
    <div class="row">
        <?php foreach ($noticias as $key => $noticia) { ?>
            <div class="col-md-4 img-portfolio lista-noticias">
                <a href="<?php
                echo site_url() . "/noticias/read/";
                echo $noticia->getId();
                ?>">
                    <img class="" src="<?php echo stream_get_contents($noticia->getCapa()); ?>" alt="...">
                </a>
                <h3>
                    <a href="<?php
                       echo site_url() . "/noticias/read/";
                       echo $noticia->getId();
                       ?>"><?php echo $noticia->getTitulo(); ?></a>
                </h3>
                <p><?php echo strip_tags(substr($noticia->getTexto(), 0, 140)); ?></p>
            </div>
            <?php } ?>
    </div>
    <!-- /.row -->
    <!-- Pagination
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
    .row -->
</div>
<!-- /.container -->
