# LABManager
##Sobre
Esta software é uma aplicação desenvolvida em *PHP* durante a disciplina de Laboratório de Engenharia de Software. 
O objetivo é criar um Portal que permite o gerenciamento de Laboratórios, com publicação de Notícias, gerenciamento de Membros, Projetos, Publicações, Instalações e Equipamentos.
## Requerimentos
Para rodar a aplicação o servidor necessita ter instalado as seguintes dependências.

**Principais**
 * Php >= 5;
 * MYSql;
 * Apache;

**Extensões PHP**

php-intl, php-pdo, php-mysql, php-mcrypy

##Configurações
Para configurar o banco de dados do sistema é necessário alterar o arquivo com as informações da conexão, `LABManager/Dominio/LABManager/InfraDatabase/ArrayDatabaseConfig.php`. Nele você encontrá um array divido nos seguintes ambientes `production`, `test`, `homolog`. As configurações de banco que serão utilizadas é definida no arquivo `LABManager\bootstrap.php`;
 * No arquivo `bootstrap.php` basta editar `define("MODO_DESENVOLVIMENTO_DOMINIO", "test");`, onde "test" pode receber um dos ambientes acima citados. 
* No arquivo `LABManager/Dominio/LABManager/InfraDatabase/ArrayDatabaseConfig.php`, a configuração é da seguinte maneira:
``` php
// Ambiente de Producao
      $databaseConfig['production']['hostname'] =  'endereco_host';
      $databaseConfig['production']['username'] =  'usuario_do_banco';
      $databaseConfig['production']['password'] =  'senha_do_banco';
      $databaseConfig['production']['database'] =  'BD_PORTAL_NCA';
      $databaseConfig['production']['dbdriver'] =  'pdo_mysql';
      $databaseConfig['production']['charset'] =  'utf8';
```

###Implantação
Após configurado o acesso ao bando de dados, basta importar o arquivo SQL de implementação que está localizado em `LABManager\Doc\BD_PORTAL_NCA.sql`.
Será criado um banco com um laboratório, algumas notícias, projetos e um usuário cadastrado.
###Utilização
