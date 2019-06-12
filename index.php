<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<meta name="author" content="Gregory Kaippert do Carmo">
<meta name="author" content="Robson Carmo">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/css.css" type="text/css">
<link rel="shortcut icon" href="img/favicon.ico">
<script src="js/jquery.min.js"></script>
<script src="js/tether.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
</head>

<body>
<div id="img-gif"></div>
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <img src="img/sw.jpg" class="img-responsive center-block">
                <h1 class="txt-entrar">Entrar</h1><h1 class="ins-senha">Insira a senha</h1>
                    <form role="form" action="javascript:;" method="post" id="login-form" name="logar" autocomplete="off">
                        <div class="form-group label-senha">
                            <label for="senha"></label>
                        </div>
                        <div class="form-group campo-email">
                        	<div class="alertas"></div> <!-- alertas do campo email -->
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="alertas-senhas"></div> <!-- alertas do campo senha -->
                        <div class="form-group campo-senha">
                            <label for="senha" class="sr-only">Senha</label>
                            <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                        </div>
                        <input id="btn-voltar" class="btn btn-default btn-lg btn-block voltar" value="Voltar">
                        <input type="submit" id="btn-proximo" class="btn btn-custom btn-lg btn-block proximo" value="Próximo">
                        <input type="submit" id="btn-entrar" class="btn btn-custom btn-lg btn-block entrar" value="Entrar">
                    </form>
                    
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p>Direitos reservados © - <?php echo date('Y') ?></p>
                <p>Desenvolvido por <strong><a href="#" target="_blank">Gregory Kaippert</a></strong></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>