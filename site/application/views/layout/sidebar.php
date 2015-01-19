<div class="col-sm-3 col-md-2 sidebar" style='height: 450px;'>
    <ul class="nav nav-sidebar">
        <?php if ($usuario['admin']) { ?>
            <li><a href="<?php echo site_url() . "/dashboard/noticias"; ?>">Notícias</a></li>
            <li><a href="<?php echo site_url() . "/dashboard/laboratorios"; ?>">Laboratórios</a></li>
            <li><a href="<?php echo site_url() . "/dashboard/projetos"; ?>">Projetos</a></li>
            <li><a href="<?php echo site_url() . "/dashboard/laboratorios"; ?>">Publicações</a></li>
            <li><a href="<?php echo site_url() . "/dashboard/membros"; ?>">Membros</a></li>
        <?php } ?>
        <li><a href="<?php echo site_url() . "/dashboard/perfil"; ?>">Perfil</a></li>
    </ul>
    <ul class="nav nav-sidebar">
        <li><a  href="">Materiais</a></li>
        <li><a href="<?php echo site_url() . "/dashboard/laboratorios"; ?>">Instalações</a></li>
        <li><a href="<?php echo site_url() . "/dashboard/laboratorios"; ?>">Spot Map</a></li>
    </ul>
</div>
