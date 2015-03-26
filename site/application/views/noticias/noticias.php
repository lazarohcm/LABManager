<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Notícias</h1>
    </div>
</div>
<div id="custom-search-input">
    <div class="input-group col-md-12">
        <input type="text" class="  search-query form-control" placeholder="Buscar" />
        <span class="input-group-btn">
            <button class="btn btn-danger" type="button">
                <span class=" glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</div>
<?php foreach ($noticias as $noticia) { ?>
    <div class="col-md-12 blogShort">
        <h1><?php echo $noticia->getTitulo(); ?></h1>
        <img src="<?php echo stream_get_contents($noticia->getCapa()); ?>" alt="post img" class="pull-left img-responsive margin10 img-thumbnail img-all-posts">
        <article class="text-justify"><p>
                <?php echo strip_tags(substr($noticia->getTexto(), 0, 1000), '<a>').' ...'; ?>
            </p></article>
        <a class="btn btn-blog pull-right" href="<?php echo site_url('/noticias/read').'/'.$noticia->getId() ?>">Ler Mais</a> 
    </div>
    <?php
}
?>
