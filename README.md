# App Controle de Tarefas

> Este projeto é um app para Controle de Tarefas, foi criado apenas para fins de estudos, algumas funcionalidades podem não terem sido implementadas.
### Sobre o projeto
Este projeto foi criado para fins acadêmicos, portanto não deve ser utilizado de fato para uso prático. No projeto você vai encontar muitos comentários que uso para tirar eventuais dúvidas que possam vir a ocorrer no futuro.
<br>
Criei o projeto à partir das aulas do curso Desenvolvimento Web Avançado 2022 com PHP, Laravel e Vue.JS, o curso é desenvolvido com PHP 7 e Laravel 7 também, mas eu utilizei o PHP 8 e Laravel 8, por isso meu código ficou diferente do código das aulas em alguns momentos, além de que implementei algumas funcionalidades de forma diferente do formato abordado. Curso disponível em https://www.udemy.com/course/curso-completo-do-desenvolvedor-laravel/
<br>

## Aprendizado
Durante o desenvolvimento deste projeto pude aprofundar meus conhecimentos no framework Laravel. Dentre os conhecimentos:
* Inicialização do projeto laravel com laravel/ui:
    * composer create-project --prefer-dist laravel/laravel app_controle_tarefas "8.5.9";
* Primeiros comandos na inicialização do projeto laravel:
    * compose require laravel/ui;
    * php artisan ui bootstrap --auth;
    * npm intall;
    * npm run dev;
* Criação do banco de dados mysql utilizando usando imagem do docker:
  * docker run -e MYSQL_ROOT_PASSWORD=root --name ct -d -p 3306:3306 mysql; -> ct é nome do banco de dados.
* Acessar o banco de dados via MySQL Workbench:
  * create database ct;
* Configurar as conexões no arquivo .env:
  * DB_CONNECTION=mysql
  * DB_PORT=3306
  * DB_HOST=127.0.0.1
  * DB_DATABASE=ct
  * DB_USERNAME=root
  * DB_PASSWORD=root
* Executar migrations:
  * php artisan migrate. -> criando as tabelas padrões do laravel/ui
  <br>

[⬆ Voltar ao topo](#App)<br>