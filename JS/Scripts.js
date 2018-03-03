/*Projeto Pensamentos Soltos, Devaneios e Outras Coisas - 21/05/2015*/
$(document).ready(function(){ 
	$('.estrut_post').click(function(e){
	titulo_post = $("#tit_post").html();
	text_selec = $.selection();
	mouseX = e.pageX;
    mouseY = e.pageY;
		if(text_selec != ''){
			$("#estrut_comp_trexo").css("left", mouseX - 150);
			$("#estrut_comp_trexo").css("top", mouseY + 10);
			$("#estrut_comp_trexo").css('display', 'block');
			$(".comp_trexo").html('"' + text_selec + '..."');
			$(".trexo_cred").html('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' + 'William Santana - Pensamentos Soltos e Pequenos Devaneios ' + titulo_post);
		}else {
			$("#estrut_comp_trexo").css('display', 'none');
			$(".comp_trexo").html('');
		}
	});
});
