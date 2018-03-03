<div class="estrut_pages">
    <!--posts-->
    <?php while(have_posts()) : the_post(); //busca posts ?>
    <!--Script compartilhamento no Facebook-->
    <?php include "Comp_face.php"; ?>
    <!--fim Script compartilhamento no Facebook-->
    <article class="estrut_post" itemprop='blogPost' itemscope='itemscope' itemtype='http://schema.org/BlogPosting'>
        <!--header post-->
        <header class="estrut_title_post">
            <section class="mask_title">
                <a class="title_post" itemprop="url" href="<?php the_permalink(); //link da postagem ?>"><h1 id="tit_post" itemprop="name"><?php the_title(); //Titulo Post ?></h1></a>
            </section>
            <section class="infos_post">
                Postado por <span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><a rel='author' title='author profile' href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>"><?php the_author() //Autor ?></a></span></span> em <span itemprop="datePublished" content="<?php the_date('Y-m-d');?>T<?php the_time('G:i'); ?>"><?php the_time(get_option( 'date_format' )); //Data ?> às <?php the_time(); ?></span>&ensp;&ensp; -- &ensp;&ensp;
                <?php echo wpmidia_get_post_views($post->ID); ?>
                <?php edit_post_link(__( 'Editar Post'), '&ensp;&ensp; -- &ensp;&ensp;'); ?>
            </section>
        </header>
        <!--fim header post-->
        <!--corpo post-->
        <section dir="ltr" class="Body_post" itemprop='description articleBody'>
            <?php the_content(); //Conteudo Post limitado, the_content() exibe completo ?>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- PSD -->
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-6524461249309200"
                        data-ad-slot="9804335707"
                        data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
        </section>
        <!--fim corpo site-->
        <!--botom site-->
        <section class="bottom_post">
            <header class="title_bottom_post">Curta, Comente e Compartilhe:</header>
            <!--Butões sociais-->
            <table class="port_socis"><tr>
            <td class="port_buttoms" id="like_fb"><?php FB(get_permalink(), 'width="250" layout="standard" action="like" show_faces="true" share="false"'); ?></td>
            <td class="port_buttoms" id="tweet_port"><?php TT(get_permalink(), 'data-count="horizontal" data-lang="pt"'); ?></td>
            <td class="port_buttoms" id="recomend_google"><?php GP(get_permalink(), 'data-size="medium"'); ?></td>
            <td class="port_buttoms" id="comp_fb"><?php fb_share(get_permalink(), 'button_count'); ?></td></tr></table>
            <!--fim butões sociais-->
            <section class="estrut_padrao" id="port_comment">
                <?php comments_template(); ?>
            </section>
        </section>
        <!--fim bottom site-->
    </article>
    <?php endwhile; ?>
</div>
<!--Comp Trecho-->
<div id="estrut_comp_trexo">
    <div class="comp_trexo"></div>
    <div class="trexo_cred"></div>
    <div class="port_comp"></div>
</div>
<!--Fim Comp Trecho-->
<!--Anuncio-->
<div class="anuncio">

</div>
<!--Fim Anuncio-->