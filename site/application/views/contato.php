<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css">
<!-- Page Content -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Home</h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url() . "/home"; ?>">Inicio</a>
                </li>
                <li class="active">Contato</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1660.7667714945103!2d-44.3069379!3d-2.5587821!3m2!1i1024!2i768!4f13.1!5e1!3m2!1spt-BR!2s!4v1413670340653" width="600" height="450" frameborder="0" style="border:0"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3>Informações de Contato</h3>
            <p>
                Av. dos Portugueses, 1966, <br>Baganga - CEP 65080-805<br> 
            </p>
            <p><i class="fa fa-phone"></i> 
                <abbr title="Phone">T</abbr>: (98) 3272-8000</p>
            <p><i class="fa fa-envelope-o"></i> 
                <abbr title="Email">E</abbr>: <a href="mailto:nca@ufma.br   ">nca@ufma.br</a>
            </p>
            <p><i class="fa fa-clock-o"></i> 
                <abbr title="Hours">H</abbr>: Segunda - Sexta: 8:00 AM to 18:00 PM</p>
            <ul class="list-unstyled list-inline list-social-icons">
                <li>
                    <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
        <div class="col-md-8">
            <h3>Envie-nos uma mensagem</h3>
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Nome Completo:</label>
                        <input type="text" class="form-control" id="name" required data-validation-required-message="Por favor, informe seu nome">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Número de Telefone:</label>
                        <input type="tel" class="form-control" id="phone" required data-validation-required-message="Por favor, informe seu telefone">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Endereço de Email:</label>
                        <input type="email" class="form-control" id="email" required data-validation-required-message="Por favor, informe seu endereço">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Menssagem:</label>
                        <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Por favor, escreva uma mensagem" maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
            </form>
        </div>

    </div>
    <!-- /.row -->

    <hr>
</div>
<!-- /.container -->