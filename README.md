<h1 align="center">Projeto Laravel - Supera Tecnologia</h1>

<p align="center">O desafio consiste em desenvolver um sistema web para controle de agendamentos de manutenções veicular.</p>


Configurações do banco de dados
============================

<ul>
<li>DB_CONNECTION=mysql
</li>
<li>DB_HOST=127.0.0.1
</li>
<li>DB_PORT=3306
</li>
<li>DB_DATABASE=vehicle-maintenance
</li>
<li>DB_USERNAME=root
</li>
<li>DB_PASSWORD=
</li>
</ul>


Instalação
=================
<ul>
<li>$ cd vehicle-manager</li>
<li>$ composer install/update</li>
<li>$ composer dumpautoload</li>
<li>$ cp .env.example .env</li>
<li>$ npm install && npm run production</li>
<li>$ php artisan key:generate</li>
<li>$php artisan migrate   #antes de rodar este comando verifique sua configuracao com banco em .env</li>
<li>$ php artisan serve</li>
<li>$ php artisan db:seed   #para gerar os seeders, dados de teste, as senhas dos usuários gerados é: password</li>
</ul>
=========================================

