<div align="center">
  <img src="img/star-wars.jpg"/> 
</div>

# API STAR WARS - Gregory Kaippert

<ol>
  <li><a href="#Sobre">Sobre o projeto</a></li>
  <li><a href="#Tecnologias">Tecnologias utilizadas</a></li>
  <li><a href="#Config">Configurando a API</a></li>
  <li><a href="#Testes">Efetuando testes</a></li>
  <li><a href="#Funcionalidades">Funcionalidades</a>
    <ol>
      <li><a href="#Insere">Inserindo um planeta</a></li>
      <li><a href="#Lista">Listando todos os planetas</a></li>
      <li><a href="#buscaid">Fazendo busca por ID</a></li>
      <li><a href="#buscanome">Fazendo busca por NOME</a></li>
      <li><a href="#deleta">Deletando um planeta</a></li>
    </ol>
  </li>
  <li><a href="#final">Considerações finais</a>
 
</ol>

### <a name="Sobre">1. Sobre o sistema</a> 

&nbsp;&nbsp;&nbsp;&nbsp; O sistema foi desenvolvido baseado nos requisitos fornecidos, como nome do planeta, clima e terreno e aparições de cada planeta nos filmes que se encontra armazenada na API SWAPI. 

### <a name="Tecnologias">2.Tecnologias utilizadas</a> 
&nbsp;&nbsp;&nbsp;&nbsp;A linguagem a ser usada, foi PHP na versão 7.2, juntamente com SLIM, um framework da linguagem, e banco de dados MYSQL. Na parte do front-end, foi utilizada o framework JQUERY.
O teste da API foi feito através do POSTMAN.
O sistema operacional utlizado foi o Linux Ubuntu 18.04 e IDE Sublime Text. 

### <a name="Config">3.Configurando a API</a>  
&nbsp;&nbsp;&nbsp;&nbsp;Para utilizar a API, precisa apenas da instalação do Apache, PHP e MYSQL. Wamp para Windows, Lamp para Linux e Mamp para Mac. É necessário o arquivo .HTACCESS na pasta raiz para que o projeto funcione corretamente. No caso do Linux, para habilitar o arquivo .HTACCESS, apenas inserir os códigos abaixo no terminal: 

```
sudo nano /etc/apache2/sites-available/000-default.conf
```

Após abrir o arquivo 000-default.conf conforme o comando acima, inserir o codigo abaixo dentro do bloco de código ```<VirtualHost *:80></VirtualHost>```

```
<Directory "/var/www/html/name-your-directory"> # coloque o nome do seu diretorio do Apache
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
</Directory>
```

