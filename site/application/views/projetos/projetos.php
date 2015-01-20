<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projetos
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url() . "/home"; ?>">Home</a>
                </li>
                <li class="active">Projetos</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <?php foreach ($projetos as $projeto) { ?>

        <div class="row">
            <div class="col-md-6 img-portfolio">
                <a href="<?php echo site_url() . "/projetos/visualizar/".$projeto->getId(); ?>">
                    <img class="img-responsive img-hover" src="<?php echo stream_get_contents($projeto->getImagem()); ?>" alt="">
                </a>
                <h3>
                    <a href="<?php echo site_url() . "/projetos/visualizar/".$projeto->getId(); ?>"><?php echo $projeto->getNome(); ?></a>
                </h3>
                <p><?php echo substr($projeto->getTexto(),0,140); ?></p>
            </div>            
        </div>

    <?php } ?>

    <hr>

    <!-- Pagination -->
<!--    <div class="row text-center">
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
    </div>-->
    <!-- /.row -->

    <hr>
</div>
<!-- /.container -->