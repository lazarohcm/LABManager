<div class="col-md-3">
    <?php if ($usuario['admin']) { ?>
    <ul class="list-group dashboard-options">
        <li class="list-group-item"><strong><a href="<?php echo site_url() . "/dashboard/noticias"; ?>">Notícias</a></strong></li>
        <li class="list-group-item"><strong><a href="<?php echo site_url() . "/dashboard/laboratorios"; ?>">Laboratórios</a></strong></li>
        <li class="list-group-item"><strong><a href="<?php echo site_url() . "/dashboard/projetos"; ?>">Projetos</a></strong></li>
        <li class="list-group-item"><strong><a href="<?php echo site_url() . "/dashboard/publicacoes"; ?>">Publicações</a></strong></li>
        <li class="list-group-item"><strong><a href="<?php echo site_url() . "/dashboard/membros"; ?>">Membros</a></strong></li>
        <?php } ?>
        <li class="list-group-item"><strong><a href="<?php echo site_url() . "/dashboard/perfil"; ?>">Perfil</a></strong></li>
        <li class="list-group-item"><br><strong><a  href="">Materiais</a></strong></li>
        <li class="list-group-item"><strong><a href="<?php echo site_url() . "/dashboard/laboratorios"; ?>">Instalações</a></strong></li>
        <li class="list-group-item"><strong><a href="<?php echo site_url() . "/dashboard/laboratorios"; ?>">Spot Map</a></strong></li>
    </ul>
</div>