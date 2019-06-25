	
	$('.alert').hide();

	$('form[name=cadastrar]').submit(function(e){
		e.preventDefault();
		//var dados = $(this).serialize() + '&acao=1';
		var dados = $(this).serialize();
		//console.log(dados);
		$.ajax({
			url: '/planetas/insert/',
			data: dados,
			dataType: 'json',
			type: 'POST',
			success: function(res){
				console.log(res);
				if(res.code == 1)
				{
					$('.alert').removeClass("alert-success");
					$('.alert').addClass("alert-danger");
					$('.aviso').show().html('Campo obrigatório vazio.' + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
				}
				else if(res.code == 2)
				{
					$('.alert').removeClass("alert-danger");
					$('.alert').addClass("alert-success");
					$('.aviso').show().html('Planeta ' + $('input[name=nome]').val() + ' cadastrado com sucesso.' + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
					setTimeout(function() {
					    location.reload();
					}, 3000);
				}
				else if(res.code == 3)
				{
					$('.alert').removeClass("alert-success");
					$('.alert').addClass("alert-danger");
					$('.aviso').show().html('Ocorreu um erro ao cadastrar, tente novamente.' + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
				}
			}
		});
	});

	listUser();
	function listUser(){

		/*
		* dar um margin bottom para a div de paginacao
		* para nao fica colada no final da pagina
		*/
		$('.paginacao').css({"margin-bottom":"30px", "text-align":"center"});

		$.ajax({
			url: '/planetas/list/',
			//data: dados,
			type: 'GET',
			success: function(res)
			{
				/*
				* Aqui irá exibir a paginacao das listas de planetas
				*/
				//console.log(res);
				var dados = jQuery.parseJSON(res);
		    	//console.log(dados);
		        var tamanhoPagina = 6;
		        var pagina = 0;

		        function paginar() {
		            $('table > tbody > tr').remove();
		            var tbody = $('table > tbody');
		            for (var i = pagina * tamanhoPagina; i < dados.length && i < (pagina + 1) *  tamanhoPagina; i++) {
		                //console.log(dados[i].id);
		                tbody.append(
		                    $('<tr>')
		                        .append($('<td>').append(dados[i].nome))
		                        .append($('<td>').append(dados[i].clima))
		                        .append($('<td>').append(dados[i].terreno))
		                        .append($('<td>').append('<button type="submit" name="alterar" class="btn btn-info float-left update" value="'+dados[i].nome+'" id="'+dados[i].id+'" clima="'+dados[i].clima+'" terreno="'+dados[i].terreno+'">Alterar</button><button type="submit" style="margin-left:5px" class="btn btn-secondary excluir" value="'+dados[i].id+'">Excluir</button><button type="submit" style="margin-left:5px" class="btn btn-success filmes-btn" value="'+dados[i].id+'" planet="'+dados[i].nome+'">Filmes</button>'))
		                )
		            }
		            
		            /* 
					* aqui irá ficar as funcoes para atualizar, exibir os filmes
					* e excluir
		            */

		            // exibe os filmes na janela modal
					$('.filmes-btn').click(function(){
						//console.log('filmes ok');
						var plan = $(this).attr('planet');
						$('#modal').modal('show');
						$('.upd_form').hide();
						$('.filmes').html('<i class="fa fa-circle-o-notch fa-spin"></i>').show();
						$('.title_user').html('');
						// exibe icon de carregamento
			        	$('form[name=upd_form]').hide();
			        	var id_filme = $(this).attr('value');
			        	$.ajax({
			        		url: '/planetas/films/'+id_filme,
			        		type: 'GET',
			        		dataType: 'json',
			        		success: function(res){
			        			//console.log(plan);
			        			if(res.code == 404){
			        				$('.filmes').text('Planeta sem filmes.');
			        			}
			        			else {

			        				var filme = 'Planeta: ' + plan; 
				        			filme += '<ol>';
				        				
			        				$.each(res, function(index, value){
				        				//console.log(value);
				        				
				        				filme += '<li>'+value.title+'</li>';
				        				
				        			});

				        			filme += '</ol>';
				        			$('.filmes').html(filme);
			        				
			        			}
			        		},
			        		error: function(resu){
			        			console.log('error');
			        		}
			        	});
					});

					$('.update').click(function(e){
						//console.log('ok');
						$('#modal').modal('show');
						$('.filmes').hide();
						$('.upd_form').html('upd form').show(); // exibe o formulario da modal
						$('form[name=upd_form]').show();
						var id = $(this).attr('id');
						var nome = $(this).attr('value');
						var clima = $(this).attr('clima');
						var terreno = $(this).attr('terreno');
						$('.title_user').html(nome);
						$('input[name=nome_upd]').val(nome);
						$('input[name=clima_upd]').val(clima);
						$('input[name=terreno_upd]').val(terreno);
						$('input[name=id_upd]').val(id);

						$('form[name=upd_form]').submit(function(e){
							e.preventDefault();
							//var dados = $(this).serialize() + '&acao=3';
							var dados = $(this).serialize();
							$.ajax({
								url: '/planetas/update/',
								data: dados,
								dataType: 'json',
								type: 'POST',
								success: function(res)
								{
									//console.log(res);
									if(res.code == 1)
									{
										$('.alert').removeClass("alert-success");
										$('.alert').addClass("alert-danger");
										$('.modal-footer').css("justify-content", "space-between");
										$('.aviso_modal').show().html('Campo obrigatório vazio.' + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
									}
									else if(res.code == 2)
									{
										$('.alert').removeClass("alert-danger");
										$('.alert').addClass("alert-success");
										$('.modal-footer').css("justify-content", "space-between");
										$('.aviso_modal').show().html('Planeta ' + $('input[name=nome_upd]').val() + ' atualizado com sucesso.' + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>').delay(3000);
										setTimeout(function() {
										   $('#modal').modal('hide');
										   location.reload();
										}, 2000);
										
									}
									else if(res.code == 3)
									{
										$('.alert').removeClass("alert-success");
										$('.alert').addClass("alert-danger");
										$('.modal-footer').css("justify-content", "space-between");
										$('.aviso_modal').show().html('Nenhuma alteração foi feita, tente novamente.' + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
									}
								}
							});
						});

						//console.log(id + ' - ' + nome + ' - ' + email);
					});

					$('.excluir').click(function(e){
						if(confirm('Tem certeza que deseja excluir esse planeta ?'))
						{
							//var dados = 'id=' + $(this).val() + '&acao=4';
							var id_filme = $(this).attr('value');
							//console.log(dados);
							$.ajax({
								url: '/planetas/delete/'+id_filme,
								data: dados,
								dataType: 'json',
								type: 'DELETE',
								success: function(res)
								{
									//console.log(res);
									if(res.code == 1)
									{	
											location.reload();
									}
									else
									{
										$('.alert').removeClass("alert-success");
										$('.alert').addClass("alert-danger");
										$('.aviso').show().html('Erro ao excluir planeta.' + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
									}
								}
							});

						}
					});
					// fim das funcoes de atualizar, exibir filmes e excluir

		            $('#numeracao').text('Página ' + (pagina + 1) + ' de ' + Math.ceil(dados.length / tamanhoPagina));
		        }

		        // exibe o total de planetas cadastrados
		        $('.total').text('Total: '+dados.length);

		        if(dados.length == 0){ // oculta a paginacao se não tiver dados
		        	$('.empty').text('Sem planetas cadastrados.');
		        	$('.paginacao').css({"display":"none"});
		        }
		        
		        function ajustarBotoes() {
		        	$('#primeira').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
					$('#anterior').prop('disabled', dados.length <= tamanhoPagina || pagina == 0);
		            $('#proximo').prop('disabled', dados.length <= tamanhoPagina || pagina >= Math.ceil(dados.length / tamanhoPagina) - 1);
		            $('#ultima').prop('disabled', dados.length <= tamanhoPagina || pagina >= Math.ceil(dados.length / tamanhoPagina) - 1);
		        }

		        $(function() {
		            $('#proximo').click(function() {
		            	if (pagina < dados.length / tamanhoPagina - 1) {
		                    pagina++;
		                    paginar();
		                    ajustarBotoes();		           
		                }
		            });
		            $('#anterior').click(function() {
		                if (pagina > 0) {
		                    pagina--;
		                    paginar();
		                    ajustarBotoes();
		                }
		            });
		            $('#primeira').click(function() {
		            	if (pagina > 0) {
		                    pagina = 0;
		                    paginar();
		                    ajustarBotoes();
		                }
		            });
		            $('#ultima').click(function() {
		            	if (pagina < dados.length / tamanhoPagina - 1) {
		            		//console.log(Math.ceil(dados.length / tamanhoPagina - 1));
		                    pagina = Math.ceil(dados.length / tamanhoPagina - 1);
		                    paginar();
		                    ajustarBotoes();
		                }
		            });
		            paginar();
		            ajustarBotoes();
		        });
		        // aqui termina a paginacao dos planetas
			}
		});
	}
	