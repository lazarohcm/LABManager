<?php if ($erro != NULL) { ?>
    <script>
        var msg = '<?php echo $erro; ?>';
        var data = {sucesso: false, msg:msg};
        initNotification(data);
    </script>
<?php } ?>

<div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-4 text-center">
        <h1 class="page-header">Área Administrativa</h1>
    </div>
    <!-- /.row -->
    <div class=" col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Entrar</div>
            </div>     

            <div class="panel-body" >
                <br>
                <form id="loginform" class="form-horizontal" role="form" method="POST" action="<?php echo site_url('/acesso/autentica'); ?>">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Usuário">                                        
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="senha" type="password" class="form-control" name="senha" placeholder="Senha">
                    </div>
                    <br>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12">
                            <button id="btn-login" type="submit" class="btn btn-success">Entrar  </button>
                        </div>
                    </div>    
                </form>     
            </div>                     
        </div>  
    </div>
</div>
