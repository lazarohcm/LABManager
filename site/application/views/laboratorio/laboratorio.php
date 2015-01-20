<!-- Page Content -->
<div class="container page-content">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Laboratórios
                <small><?php echo $laboratorio->getNome(); ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url() . "/home"; ?>">Home</a>
                </li>
                <li>Laboratórios</li>
                <li class="active"><?php echo $laboratorio->getNome(); ?></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="form-group has-feedback">
                <img style="width: 700px; max-height: 300px" class="img-rounded" src="<?php echo stream_get_contents($laboratorio->getCapa()); ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group has-feedback" style="text-align: justify;">
                <label>Sobre:</label>
                <div class="well">
                    <p>
                        <?php echo $laboratorio->getDescricao(); ?> 
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group has-feedback">
                <label>Telefone:</label>
                <div class="well">
                    <p><?php echo $laboratorio->getTelefone(); ?></p>
                </div>

            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projetos Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Projetos</h2>
        </div>
        <?php foreach ($laboratorio->getProjeto() as $projeto) { ?>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4><?php echo $projeto->getNome(); ?></h4>
                        <p><?php echo substr($projeto->getTexto(), 0, 140); ?></p>
                        <a href="<?php echo site_url() . "/projetos/visualizar/" . $projeto->getId(); ?>" class="btn btn-primary">Ver página</a>
                    </div>
                </div>
            </div>  
        <?php } ?>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">

    </div>
    <!-- /.row -->

    <hr>

    <!-- Membros to Action Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Membros</h2>
        </div>
        <div class="col-md-4">
            <?php foreach ($laboratorio->getMembro() as $key => $membro) { ?>
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-tree fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="<?php echo site_url("/membros/visualizar/" . $membro->getId()); ?>">
                                <?php echo $membro->getNome(); ?>
                            </a>
                        </h4>
                        <p><?php echo substr($membro->getBiografia(), 0, 140) . '...'; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!--        <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-database fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Four</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-bomb fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Five</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-bank fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Six</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>-->
        <!--        <div class="col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Seven</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-space-shuttle fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Eight</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-recycle fa-stack-1x fa-inverse"></i>
                            </span> 
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Service Nine</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo itaque ipsum sit harum.</p>
                        </div>
                    </div>
                </div>-->
    </div>
</div>