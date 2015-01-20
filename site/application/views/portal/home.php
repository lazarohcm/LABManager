<!-- Page Content -->
<div class="container page-content">
    <!-- Marketing Icons Section -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Bem vindo ao NCA!
            </h1>
            <h2> O Núcleo de Computação Aplicada é composto pelos seguintes laboratórios:</h2>
        </div>
        <?php foreach ($laboratorios as $laboratorio) { ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i><?php echo $laboratorio->getNome(); ?></h4>
                    </div>
                    <div class="panel-body" style="position: relative; height: 174px">
                        <p><?php echo $laboratorio->getDescricao(); ?></p>
                        <a style="position: absolute; bottom: 13px" href="<?php echo site_url()."/laboratorios/visualizar/"; echo strtolower($laboratorio->getNome());?>" class="btn btn-default">Ir para página</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Projetos em andamento</h2>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-inicio-projeto img-hover" src="<?php echo base_url(); ?>assets/img/logo-ncleclipse.png" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-inicio-projeto img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-inicio-projeto img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-inicio-projeto img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-inicio-projeto img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
        <div class="col-md-4 col-sm-6">
            <a href="portfolio-item.html">
                <img class="img-responsive img-inicio-projeto img-hover" src="http://placehold.it/700x450" alt="">
            </a>
        </div>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Parceiros</h2>
        </div>
        <div class="col-md-6">
            <p>O NCA Possui parceria com:</p>
            <ul>
                <li><strong>Petrobras</strong>
                </li>
                <li>XXXXXXXX</li>
                <li>XXXXXXXX</li>
                <li>XXXXXXXX</li>
                <li>XXXXXXXX</li>
                <li>XXXXXXXX</li>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
        </div>
        <div class="col-md-6">
            <img class="img-responsive" src="http://placehold.it/700x450" alt="">
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="well">
        <div class="row">
            <div class="col-md-8">
                <p>Faça parte do NCA, trabalhe com processamento de imagens, sistemas de informações geogŕaficas e muito mais</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-default btn-block" href="#">Cliqie para saber como</a>
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Núcleo de Computação Aplicada 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->
<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 4000 //changes the speed
    })
</script>