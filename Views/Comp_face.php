<script type="text/javascript">
function compartilhar_postfb() {
	//Titulo_postagem = '<?php the_title(); //Titulo Post ?>';
	//descri = document.getElementById("port_cont_post").innerHTML;
	//linkpost = '<?php the_permalink(); ?>';
	//img_pst = '/wp-content/themes/PSDOC/img/pensamento.png';
  FB.ui({
  method: 'share',
  href: '<?php the_permalink(); ?>',
}, function(response){
    if (response && response.post_id) {
          alert(Titulo_postagem + " " + 'publicado com sucesso em seu mural.');
        } else {
          alert('Erro ao compartilhar' + " " + Titulo_postagem + ", " + 'nada foi publicado');
      }
});

/*FB.ui(
      {
       method: 'feed',
       name: Titulo_postagem,
       caption: 'Pensamentos Soltos, Devaneios e Outras Coisas',
       description: (
          descri
       ),
       link: linkpost,
       picture: img_pst
      },
      function(response) {
        if (response && response.post_id) {
          alert(Titulo_postagem + " " + 'publicado com sucesso em seu mural.');
        } else {
          alert('Erro ao compartilhar' + " " + Titulo_postagem + ", " + 'nada foi publicado');
        }
      }
    );
    */
}

//fb vizu
function visu_fb(){
	link_post = "<?php the_permalink(); ?>";
FB.api(
  'me/pensamentossoltos:visualize',
  'post',
  {
    poem: link_post
  },
  function(response) {
    // handle the response
  }
);
}
window.onscroll = visu_fb;
</script>