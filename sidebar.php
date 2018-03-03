<div class="esqu" id="menu_bar">
<!--titulo-->
<section class="port_title">
	<header class="esqu">
		<h1 class="title"><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h1>
		<h2 class="slogan"><?php bloginfo('description'); ?></h2>
	</header>
</section>
<!--fim titulo-->
<!--Menu-->
<nav class="menu_estrut">
<!--titulo opt-->
	<header class="title_opt_port">
		<h3 class="title_opt">Menu</h3>
	</header>
	<!--titulo opt fim-->
	<!--opções-->
	<ul>
		<li><a href="<?php echo get_option('home'); ?>">Home</a></li>
    	<?php wp_list_categories('title_li='); ?>
    	<?php wp_list_pages('title_li='); ?>
	</ul>
	<!--fim opções-->
</nav>
<!--fim menu-->
<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar()): ?>
<?php endif; ?>
</div>