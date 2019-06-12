<html>
	<head>
		<title>SWAPI</title>
		<link rel="stylesheet" href="css/bootstrap.home.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="shortcut icon" href="img/favicon.ico">
	</head>

	<body>
	<!-- modal -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="modal">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title title_user"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body form_upd">
	        
	      	<!-- atualizar user -->
	      	<form name="upd_form" method="post">
			  			
			  			<div class="input-group">	
			  				<div class="input-group-prepend">
					    		<span class="input-group-text" id="">Planetas</span>
						  	</div>
						  		<input type="text" class="form-control" name="nome_upd">
						  	<div class="input-group-prepend">
						    	<span class="input-group-text" id="">Clima</span>
						  	</div>
						  		<input type="text" class="form-control" name="clima_upd" placeholder="">
						  	<div class="input-group-prepend">
					    		<span class="input-group-text" id="">Terreno</span>
						  	</div>
						  		<input type="text" class="form-control" name="terreno_upd">
						  	<div class="input-group-prepend">
						    	<input type="submit" name="submit_upd" value="Salvar mudanças" class="btn btn-secondary">
						    	<input type="hidden" name="id_upd">
						  	</div>
						</div>

			  		</form>
		  		<!-- atualizar user -->
		</div>

		<div class="modal-body filmes"></div> <!-- resultado dos filmes -->

	      <div class="modal-footer">
	      	<div class="alert alert-dismissible fade show aviso_modal" role="alert"></div>
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	        <!--<button type="button" class="btn btn-primary">Salvar mudanças</button>-->
	      </div>
	    </div>
	  </div>
	</div>
	<!-- modal -->

	<div class="container">
	
		<div class="row bg-light">
			<div class="col-sm-4">
				<img src="img/sw.jpg" width="250" height="150">
			</div>
			<div class="col-sm-8">
				<h1 class="mt-5">SWAPI</h1>
				<div style="float: right; margin: 22px 0px 0px 0px;">Bem-vindo <?php echo $_SESSION['nome']; ?>! <a href="logoff">Fazer Logoff</a></div>
			</div>
		</div>
		
		<hr>

		<!-- Cadastrar User -->
		<div class="row">
			<div class="col-sm-2"></div>
		  	
		  	<div class="col-sm-8">
		  		<h2>Cadastrar</h2>
		  		
		  		<form name="cadastrar" method="post">
		  			
		  			<div class="input-group">	
		  				<div class="input-group-prepend">
				    		<span class="input-group-text" id="">Nome</span>
					  	</div>
					  		<input type="text" class="form-control" name="nome">
					  	<div class="input-group-prepend">
					    	<span class="input-group-text" id="">Clima</span>
					  	</div>
					  		<input type="text" class="form-control" name="clima" placeholder="">
					  	<div class="input-group-prepend">
				    		<span class="input-group-text" id="">Terreno</span>
					  	</div>
					  		<input type="text" class="form-control" name="terreno">
					  	<div class="input-group-prepend">
					    	<input type="submit" name="inserir" value="Inserir" class="btn btn-secondary">
					  	</div>
					</div>

		  		</form>
				
				<div class="alert alert-dismissible fade show aviso" role="alert"></div>
				
		  	</div>
		  	
		  	<div class="col-sm-2"></div>
		</div>

		<!-- Listar User -->
		<div class="row mt-5">
			<div class="col-sm-2">
				<h1>Listar</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-9">
				<table class="table table-striped table-hover listUser">
					<thead class="thead-dark">
						<tr>
							<th>Planetas</th>
							<th>Clima</th>
							<th>Terreno</th>
							<th width="272">Actions</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<span class="empty"></span>
				<!-- botoes da paginacao -->
				<div class="row">
					<div class="col-sm-2 total"></div> <!-- exibe o total de planetas -->
					<div class="paginacao col-sm-8">
						<button id="anterior" disabled class="btn btn-light">&lsaquo; Anterior</button>
						    <span id="numeracao"></span>
						<button id="proximo" disabled class="btn btn-light">Próximo &rsaquo;</button>
					</div>
				</div>
				<!-- fim dos botoes da paginacao -->
			</div>
			<div class="col-sm-2"></div>
		</div>
	
	</div>	

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="js/user.js"></script>

	</body>

</html>