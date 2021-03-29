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
$ git clone https://github.com/caickbrito/vehicle-manager.git
$ cd vehicle-manager
$ composer install
$ cp .env.example .env
$ npm install && npm run production
$ php artisan key:generate
$ php artisan migrate   #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan serve
$ php artisan db:seed   #para gerar os seeders, dados de teste

=========================================

