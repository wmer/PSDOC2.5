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
    			<a class="title_post" itemprop="url" href="<?php the_permalink(); //link da postagem ?>"><h1 itemprop="name"><?php the_title(); //Titulo Post ?></h1></a>
    		</section>
    	</header>
    	<!--fim header post-->
    	<section dir="ltr" class="Body_post" itemprop='description articleBody'>
    		<?php the_content(); //Conteudo Post limitado, the_content() exibe completo ?>
    	</section>

    </article>
    <?php endwhile; ?>
    <!--fim posts-->
</div>