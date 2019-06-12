<div align="center">
  <img src="img/star-wars.jpg"/> 
</div>

# API STAR WARS

<ol>
  <li><a href="#about">Sobre o projeto</a></li>
  <li><a href="#technology">Tecnologias utilizadas</a></li>
  <li><a href="#config">Configurando a API</a></li>
  <li><a href="#Funcionalidades">Funcionalidades</a>
    <ol>
      <li><a href="#Login">Efetuando Login</a></li>
      <li><a href="#insert">Inserindo um planeta</a></li>
      <li><a href="#read">Listando todos os planetas</a></li>
      <li><a href="#readId">Pesquisar planeta</a></li>
      <li><a href="#update">Atualização de um planeta</a></li>
      <li><a href="#delete">Deletando um planeta</a></li>
    </ol>
  </li>
  <li><a href="#conclusao">Conclusão</a>
 
</ol>

### <a name="about">1. Sobre o sistema</a> 

&nbsp;&nbsp;&nbsp;&nbsp; O sistema foi desenvolvido baseado nos requisitos fornecidos, como nome do planeta, clima e terreno e aparições de cada planeta nos filmes que se encontra armazenada na API SWAPI. 

### <a name="technology">2.Tecnologias utilizadas</a> 
&nbsp;&nbsp;&nbsp;&nbsp;A linguagem a ser usada, foi PHP na versão 7.2, juntamente com SLIM, um framework da linguagem, e banco de dados MYSQL. Na parte do front-end, foi utilizada o framework JQUERY.
O teste da API foi feito através do POSTMAN.
O sistema operacional utlizado foi o Linux Ubuntu 18.04 e IDE Sublime Text. 

### <a name="config">3.Configurando a API</a>  
&nbsp;&nbsp;&nbsp;&nbsp;Para utilizar a API, precisa apenas da instalação do Apache, PHP e MYSQL. ***Wamp para Windows, Lamp para Linux e Mamp para Mac***. É necessário o arquivo .HTACCESS na pasta raiz para que o projeto funcione corretamente. 

>No caso do Linux, para habilitar o arquivo .HTACCESS, apenas inserir os códigos abaixo no terminal:

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

Depois de salvar o arquivo e fechar, é necessário reiniciar o Apache com o seguinte comando: 

```
sudo service apache2 restart
```

Depois de feito toda as etapas anterior e certificar que o ambiente de desenvolvimento está executando com sucesso, próxima e última etapa é alterar a configuração do banco de dados de acordo com seu sistema operacional. O caminho do arquivo para editar é: 

> **S.O Linux**: /var/www/html/planetas/app/config/config.php **OU** /var/wwww/planetas/app/config/config.php

> **S.O Windows**: C:wamp/www/planetas/app/config/config.php

### <a name="Funcionalidades">4.Funcionalidades</a>

&nbsp;&nbsp;&nbsp;&nbsp;As funcionalidades desse sistema é basicamente um CRUD(CREATE, READ, UPDATE AND DELETE), que para um melhor entendimento, significa CRIAR, LER, ATUALIZAR E DELETAR:

#### <a name="Login">I. Efetuando Login:</a>

&nbsp;&nbsp;&nbsp;&nbsp;Você pode usar um login que já está cadastrado no banco de dados por padrão.

```
Login: admin@admin.com
Senha: 12345
```

Foi utilizado uma função própria para criptografar a senha, tornando-a mais segura.

#### <a name="insert">II. Cadastrando um planeta:</a>

&nbsp;&nbsp;&nbsp;&nbsp;Para inserir um registro no banco de dados, é feito um pedido com o método **POST** para a rota ```/inserir/```, que irá validar se possui entrada vazia, caso positivo, informa ao usuário que há campos obrigatórios vazios, caso contrário, grava os dados.

### <a name="read">III. Listando todos os planetas</a>

&nbsp;&nbsp;&nbsp;&nbsp;A listagem é feita com o método **GET** para a rota ```/list/``` que retorna todos os dados sem exceção, como id, nome, clima e terreno. Se não conter planetas cadastrados, retorna uma mensagem informando que não tem planetas cadastrados. 
A listagem também conta com um recurso de paginação.

### <a name="readId">IV. Pesquisar planeta</a>

&nbsp;&nbsp;&nbsp;&nbsp;Cada listagem irá conter um campo do tipo ```<button>``` chamado Filmes que guarda um valor com seu ID para enviar uma requisição para API da SWAPI, que retornará os filmes relacionados com aquele planeta, cujos os id's são iguais.

### <a name="update">V. Atualização de um planeta</a>

&nbsp;&nbsp;&nbsp;&nbsp;Para atualizar um planeta, um requisito é feito com o método **POST** para a rota ```/update/```, que irá exibir uma janela modal para a edição dos dados, não podendo deixar nenhum campo vazio. 

### <a name="delete">VI. Deletando um planeta</a>

&nbsp;&nbsp;&nbsp;&nbsp;Para deletar, basta fazer uma requisição com o método **DELETE** para a rota ```/delete/{id_planet}/```, passando o id como parâmetro. 

### <a name="conclusao">Conclusão</a>

Thought of the day: Maybe not, the force **<sub>will always</sub>**# be with you.
Pensamento do dia: Talvez não, a força **<sub>sempre irá</sub>** estar com você.
