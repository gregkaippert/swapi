// JavaScript Document
$(function() {
    
  var acao = 'app/login.php';
  $('.campo-senha').hide();
  $('.ins-senha').hide();
  $('.label-senha').hide();
  $('#btn-entrar').hide();
  $('#btn-voltar').hide();
  $('.alertas-senhas').hide();
    
	$('form[name="logar"]').submit(function(){
	var ins = $(this).serialize() + '&acao=' +'logar';
	var email = $('#email').val();
	$.ajax({
		url: acao,
		data: ins,
		type: 'POST',
		success: function(data){
			//console.log(data);
			if(data == '1'){
				$('.alertas').show().html('Insira um endereço de email válido.').delay(4000).fadeOut(1000);
				}
			if(data == '3') {
				$('.alertas').show().html('Essa conta não existe. Insira um email diferente.').delay(4000).fadeOut(1000);
				}
			if(data == '2'){
				$('.campo-email').animate({opacity:0.2,padding:10,marginLeft:350,width:'hide'},500);
				//$('.campo-email').hide();
				$('.txt-entrar').hide();
				$('.ins-senha').show();
				$('.label-senha').show().html('Insira a senha para '+email);
				$('.campo-senha').fadeIn(1000);
				$('#btn-voltar').show().css({ width: "49%", float: "left", "margin-right": "6px" });
				$('#btn-entrar').show().css("width", "49%");
  				$('#btn-proximo').hide();
			}  // if data == 2
			
				$('.voltar').click(function(){ // pressionar o botao voltar
					$('.campo-email').animate({opacity:1.0,padding:0,marginLeft:0,width:'show'},400);
					$('#btn-proximo').show().css("width","100%");
					$('.campo-senha').hide();
					$('.txt-entrar').show();
					$('.ins-senha').hide();
					$('.label-senha').hide();
					$('#btn-voltar').hide();
					$('#btn-entrar').hide();
					}); // voltar click
			} // success
		}); // ajax
		
		}); // submit form
		
		$(".entrar").click(function(){
					var email = $('#email').val();
					var senha = $('#senha').val();
					var entrar = 'email='+email+'&senha='+senha+'&acao='+'entrar';
					$.ajax({
						url: acao,
						data: entrar,
						cache: false,
						type: 'POST',
						success: function(resp){
							//console.log(resp);
							if(resp == '4'){
							$('.alertas-senhas').show().html('Digite a senha da sua conta.').delay(4000).fadeOut(1000);
								}
							if(resp == '5'){
								window.setTimeout(function(){
								$(location).attr('href','render');
								},1000);
								}
							if(resp == '6'){
								$('.alertas-senhas').show().html('Sua senha está incorreta.').delay(4000).fadeOut(1000);
								}
							} // success
						
						}); // ajax
					}); // click entrar
			
}); // function