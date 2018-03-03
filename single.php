<?php get_header(); //inclui o header na página ?>
<?php include "Includes/analyticstracking.php"; ?>
<!--Site Content-->
	<aside class="part_site" id="side_left"><?php get_sidebar(); //inclui o sidebar ?></aside>
	<section class="part_site" id="side_right"><?php include 'Views/Single.php'; ?></section>
<!--fim Content-->
<?php get_footer(); ?>