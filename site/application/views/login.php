<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div  style="left: 50px;" class="col-md-5 col-md-offset-3">
            <h1 style="text-align: center;"  class="page-header">Área Administrativa</h1>
        </div>
    </div>
    <!-- /.row -->
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Entrar</div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                <form id="loginform" class="form-horizontal" role="form" method="POST" action="<?php echo site_url('/acesso/autentica'); ?>">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Usuário">                                        
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="senha" type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <button id="btn-login" type="submit" href="#" class="btn btn-success">Entrar  </button>
                        </div>
                    </div>    
                </form>     
            </div>                     
        </div>  
    </div>
</div>
<!-- /.container -->