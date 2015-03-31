<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Twitter API -->
<script>!function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');</script>

<div class="col-lg-12">
    <h1 class="page-header"><?php echo $noticia->getTitulo(); ?></h1>
    <p class="blog-post-date">
        <?php $data = str_replace('/', ' de ', $noticia->getData()->format('d/F/Y')); ?>
        <?php echo $data; ?>
    </p>

    <div class="col-lg-10  col-lg-offset-1">
        <img class="img-responsive capa-blog" src="
        <?php $noticia->getCapa() != NULL ? print_r(stream_get_contents($noticia->getCapa())) : print_r("http://placehold.it/700x300/81326D/ffffff&text=Capa do Post") ?>
             " alt="">
        <hr>
        <article class="text-justify"><?php echo $noticia->getTexto(); ?></article>

        <div class="social-buttons text-center">
            <?php 
                $url = site_url() . "/dashboard/noticias/read/" . $noticia->getId();
                $titulo = $noticia->getTitulo();
            ?>
            <!--  Facebook button  -->
            <div class="fb-like" data-href="<?php echo $url; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
            <!--                          GPlus button 
                                    <div class="g-plusone" data-action="share" data-annotation="vertical-bubble" data-height="60" style="margin-top: 10px"></div>-->
            <!--  Twitter button -->
            <a class="twitter-share-button"
               href="https://twitter.com/share"
               data-url="<?php echo $url; ?>"
               data-text="<?php echo $titulo; ?>"
               data-related="Núcleo de Computação Aplicada">
                Tweet
            </a>

        </div>
        
    </div>
</div>

