<?php
	if(function_exists('register_sidebar'))
		register_sidebar(array(
			'before_widget' => '<nav class="menu_estrut">',
			'after_widget' => '</nav>',
			'before_title' => '<header class="title_opt_port"><h3 class="title_opt">',
			'after_title' => '</h3></header>'
		));

//suporte a thumbnails
	add_theme_support('post-thumbnails');
	//adicionar the_post_thumbnail(); aonde aparecer a imagem

//infnit scrool
add_theme_support( 'infinite-scroll', array(
    'container' => 'content',
    'footer' => 'page',
) );

//contador
function wpmidia_set_post_views($postID) {
 
    $cookie = strtotime(date('Y-m-d'));
    $pv_url = 'wpmidia_'.md5($_SERVER['REQUEST_URI']);
 
    if( is_single() && !isset($_COOKIE[$pv_url]) ){
 
        $count_key = '_wpmidia_post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 1; //quando o usuário entra, já conta como 1 visita
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, $count);
 
            //salvo num cookie que dura 1 hora.
            setcookie($pv_url, $cookie, time()+3600, COOKIEPATH, COOKIE_DOMAIN, false); // 1 hora
 
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
 
    }
}
//rastrear o cookies
function wpmidia_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpmidia_set_post_views($post_id);
}
add_action('wp_head', 'wpmidia_track_post_views');

//numero de vizualisações
function wpmidia_get_post_views($postID){
    $count_key = '_wpmidia_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if( !empty($count) ){
        //return $count.' Views';
        return 'Visto por ' . $count. ' Pessoas';    
    }else {
		return 'Nenhuma Vizualização';
	}
}

//add coluna
add_filter('manage_posts_columns', 'wpmidia_posts_column_views');
function wpmidia_posts_column_views($defaults){
    $defaults['post_views'] = __('Visualizações');
    return $defaults;
}
 
add_action('manage_posts_custom_column', 'wpmidia_custom_column_views',5,2);
function wpmidia_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        $count = get_post_meta($id, '_wpmidia_post_views_count', true);
        if( !empty($count) ){
            echo $count. ' visualização(ões)';    
        }
    }
}
/** Pagination */
function pagination_funtion() {
// Get total number of pages
global $wp_query;
$total = $wp_query->max_num_pages;
// Only paginate if we have more than one page                   
if ( $total > 1 )  {
    // Get the current page
    if ( !$current_page = get_query_var('paged') )
        $current_page = 1;
                           
        $big = 999999999;
        // Structure of "format" depends on whether we’re using pretty permalinks
        $permalink_structure = get_option('permalink_structure');
        $format = empty( $permalink_structure ) ? '&page=%#%' : 'page/%#%/';
        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
            'format' => $format,
            'current' => $current_page,
            'total' => $total,
            'mid_size' => 2,
            'type' => 'list'
        ));
    }
}
/** END Pagination */

// Tornar o template disponível para tradução
// A tradução pode ser feita em /languages/
load_theme_textdomain( 'your-theme', TEMPLATEPATH . '/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
   require_once($locale_file);
 
// Puxar o número de página
function get_page_number() {
          if ( get_query_var('paged') ) {
              print ' | ' . __( 'Page ' , 'Pensamentos_Soltos') . get_query_var('paged');
         }
 }
// end get_page_number

//adicionar aquivos js
function add_custom_scripts(){
/**
	         * wp_enqueue_style( $nome_unico, $arquivo, $dependencia, $versao, $media_usada);
	         * $nome_unico => recebe um nome único
	         * $arquivo => caminho completo até o arquivo css
	         * $dependencia => Informa se para funcionar, ele depende de outro arquivo (opcional)
	         * $versao => versão do estilo (opcional)
	         * $media_usada => A media que será usado, pode ser screen, print. Por padrão é usado all (opcional)
	         */
	         
	        /**
	         * Nesse caso, vamos só informa nome único, e o caminho do arquivo
	         */
	        wp_enqueue_style('bootstrap', '/wp-content/themes/PSDOC2.5/CSS/bootstrap.min.css');
            wp_enqueue_style('bootstrap-responsive', '/wp-content/themes/PSDOC2.5/CSS/bootstrap-responsive.min.css');
	         
	         /**
	         * wp_enqueue_script($nome_script, $arquivo_script, $dependencia, $versao, $adicionar_no_rodape);
	         * $nome_script => nome único atributo ao script
	         * $arquivo_script => caminho completo até o script
	         * $dependencia => Informa se para funcionar, ele depende de outro arquivo (Opcional)
	         * $versao => Versão do script (opcional)
	         * $adicionar_no_rodape => se deseja adicionar no footer , por padrão é falso (opcional)
	         *
	         */
            wp_enqueue_script('bootstrap-js', '/wp-content/themes/PSDOC2.5/JS/jquery-1.11.3.min.js');              
            wp_enqueue_script('jquery_selection', '/wp-content/themes/PSDOC2.5/JS/jquery.selection.js');
            wp_enqueue_script('bootstrap-js', '/wp-content/themes/PSDOC2.5/JS/bootstrap.min.js');
            wp_enqueue_script('Scripts', '/wp-content/themes/PSDOC2.5/JS/Scripts.js');
}
add_action('wp_enqueue_scripts', 'add_custom_scripts');
//sociais
//Facebook
function FB($link, $args){
	if($args == 'default'){
		echo '<fb:like href="' . $link . '" width="250" layout="standard" action="like" show_faces="true" share="false"></fb:like>';
	}else {
		echo '<fb:like href="' . $link . '" ' .  $args . '></fb:like>';
	}
}
//Twitter
function TT($link, $args){
	$script = '<script>!function(d,s,id){ var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");</script>';
	if($args == 'default'){
		echo '<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-url="' . $link . '" data-lang="pt">Tweetar</a>' . $script;
	}else {
		echo '<a href="https://twitter.com/share" class="twitter-share-button" data-url="' . $link . '"' . $args . '>Tweetar</a>' . $script;
	}
}
//Google+
function GP($link, $args) {
	$script = '<script type="text/javascript">
  		window.___gcfg = {lang: "pt-BR"};

  		(function() {
    	var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
    	po.src = "https://apis.google.com/js/platform.js";
    	var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
  		})();
		</script>';
	if($args == 'default'){
			echo '<div class="g-plusone" data-annotation="inline" data-href="' . $link . '" data-width="150"></div>' . $script;
		}else {
			echo '<div class="g-plusone" data-href="' . $link . '" ' . $args . '></div>' . $script;
	}
}
//Coment Disqus
function comment($name, $titulo, $link){
		echo '<div id="disqus_thread"></div>
   	 	<script type="text/javascript">
        var disqus_shortname = "' . $name . '"; 
        var disqus_title = "' . $titulo . '"; 
    	var disqus_url = "' . $link . '"; 

        (function() {
            var dsq = document.createElement("script"); dsq.type = "text/javascript"; dsq.async = true;
            dsq.src = "//" + disqus_shortname + ".disqus.com/embed.js";
            (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(dsq);
        })();
    	</script>
    	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    	<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>';
}
//fb viwes
function fb_views($link) {
		if ($user_id) {
  		try {
    		$response = $facebook->api(
  			'me/pensamentossoltos:visualize',
  			'POST',
  			array(
			'poem' => $link
 			 )
		);
			$id_postFB = $ret_obj['id'];
			echo $id_postFB;
  			} catch (FacebookApiException $e) {
			$eroor_TypeFB = error_log($e->getType());
			$error_MessageFB = error_log($e->getMessage());
    		$user_id = null;
			echo 'erro:' . $eroor_TypeFB . ' mensagem:' . $error_MessageFB;
		}
}
}
//share facebook
function fb_share($link, $layout){
    echo '<div class="fb-share-button" data-href="' . $link . '" data-layout="' . $layout . '"></div>';
}