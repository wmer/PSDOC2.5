<div class="estrut_pages">
     <!--autor info-->
<?php  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
<section class="info_author" itemprop="author" itemscope itemtype="http://schema.org/Person">
    <div class="profile_body">
    <div class="sobre_info" itemprop="name"><?php echo $curauth->nickname; ?></div></br>
    <span class="site_info">Facebook: <a rel='author' title='author profile' href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></span>
    <div class="port_profile">
    <div class="profile" id="left_profile">Profile:</div>
    <div class="profile" id="right_profile"><?php echo $curauth->user_description; ?></div>
    </div>
    <span class="posts_admin">Posts de <span itemprop="name"><?php echo $curauth->nickname; ?></span>:</span>
    </div>
</section>
<!--fim ator info-->
    <!--posts-->
    <?php if(have_posts()) : while(have_posts()) : the_post(); //busca posts ?>
    <article class="estrut_post" itemprop='blogPost' itemscope='itemscope' itemtype='http://schema.org/BlogPosting'>
        <!--header post-->
        <header class="estrut_title_post">
            <section class="mask_title">
                <a class="title_post" itemprop="url" href="<?php the_permalink(); //link da postagem ?>"><h1 itemprop="name"><?php the_title(); //Titulo Post ?></h1></a>
            </section>
            <section class="infos_post">
                Postado por <span itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><a rel='author' title='author profile' href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>"><?php the_author() //Autor ?></a></span></span> em <span itemprop="datePublished" content="<?php the_date('Y-m-d');?>T<?php the_time('G:i'); ?>"><?php the_time(get_option( 'date_format' )); //Data ?> às <?php the_time(); ?></span>&ensp;&ensp; -- &ensp;&ensp;
                <?php echo wpmidia_get_post_views($post->ID); ?>
                <?php edit_post_link(__( 'Editar Post'), '&ensp;&ensp; -- &ensp;&ensp;'); ?>
            </section>
        </header>
        <!--fim header post-->
        <section dir="ltr" class="Body_post" itemprop='description articleBody'>
            <?php the_excerpt(); //Conteudo Post limitado, the_content() exibe completo ?>
            <a title="Continuar Lendo" href="<?php the_permalink(); ?>" style="color: #FF0004">Continuar Lendo...</a>
        </section>

    </article>
    <?php endwhile; else: ?>
        <!--Caso não encontre nenhum post-->
        <p class="Posts_NE">Nenhum Post Encontrado!</p>
    <?php endif; ?>
    <!--fim posts-->
    <!--paginação-->
    <?php if (function_exists('pagination_funtion')) pagination_funtion(); ?>
    <!--fim paginação-->
</div>