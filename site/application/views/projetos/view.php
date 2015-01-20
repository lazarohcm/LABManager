<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Projetos
                <small><?php echo $projeto->getNome(); ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url() . "/home"; ?>">Home</a>
                </li>
                <li class="active"><a href="<?php echo site_url() . "/projetos"; ?>">Projetos</a></li>
                <li class="active"><?php echo $projeto->getNome(); ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-7">
            <img class="img-responsive img-rounded" src="<?php echo stream_get_contents($projeto->getImagem()); ?>" alt="">
        </div>

        <div class="col-md-5">
            <h3>Descrição</h3>
            <p><?php echo $projeto->getTexto(); ?></p>
            <h3>Detalhes</h3>
            <ul>
                <li>
                    <div class="form-group">
                        <label>Laboratório:</label>
                        <p>
                            <a href="<?php echo site_url('/laboratorios/visualizar/' . strtolower($projeto->getLaboratorio()->getNome())); ?>">
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
    <!-- /.row -->
    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">Membros</h3>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive img-hover img-related" src="http://placehold.it/500x300" alt="">
            </a>
        </div>

    </div>
    <!-- /.row -->

    <hr>
</div>
<!-- /.container -->
