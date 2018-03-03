<?php 
	require "vendor/autoload.php";
	require "Includes/facebook_config.php";

?>
<!-- Marcação de microdados adicionada pelo Assistente de marcação para dados estruturados do Google. -->
<!doctype html>
<html xmlns:fb="http://ogp.me/ns/fb#" <?php language_attributes(); //Tornar o template disponível para tradução ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# pensamentossoltos: http://ogp.me/ns/fb/pensamentossoltos#">
<title>
<?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars(); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
?>
</title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; <?php bloginfo('charset'); ?>" />
<meta name="keywords" content="animes, séries, mangás, filmes, musica, pensamentos, devaneios, soltos, pequenos, pensamentos soltos, pensamentos pequenos, devaneios soltos, devaneios pequenos, pensamentos soltos e devaneios, pensamentos soltos e pequenos devaneios, meus pensamentos, meus devaneios, loucuras, minhas loucuras, poemas, poesias, dor, sofrimento, solidão, saudade, amizade, amor, alegria, paixão, poemas de amor, poemas de amizade, poemas de sildão, poemas de tristeza, poemas de depressão, poesias de amor, poesias de amizade, poesias de solidão, poesias de tristeza, poesias de depressão">
<meta name="article:author" content="https://www.facebook.com/william.silvadesantana">
<!--facebook-->
<meta property="fb:app_id" content=""/>
<meta property="fb:admins" content="" />
<meta property="og:type"   content="pensamentossoltos:poem" />
<meta property="og:title"  content="<?php
        if ( is_single() ) { single_post_title(); }
        elseif ( is_home() || is_front_page() ) { bloginfo('name'); get_page_number(); }
        elseif ( is_page() ) { single_post_title(''); }
        elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars(); get_page_number(); }
        elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
        else { bloginfo('name'); wp_title('|'); get_page_number(); }
?>" /> 
<meta property="og:image" content="/themes/PSDOC2.5/img/pensamento.png"/>
<!--fim facebook-->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="all" type="text/css" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />﻿
<link rel="shortcut icon" href="/themes/PSDOC2.5/img/Logos/Favicon.jpg" type="image/x-icon" />
<?php wp_head(); //diz que é o header ?>
</head>
<body onload="">
<?php include "Includes/conecta_face.php"; ?>
<fb:recommendations-bar href="http://pensamentossoltosedevaneios.esy.es/"></fb:recommendations-bar>
<!--Inicio Site-->
<!--inicio corpo-->
<div class="estrut_site">
