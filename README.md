# Desafio Origo Energia Nov/2020

#### Informações básicas

- Desenvolvido com Apache/2.4.39, PHP 7.3.7, Laravel 7.29.3, MariaDB 10.3.16 e Composer

Seguir os passos para instalação:

### Criar projeto

\$ git clone https://github.com/ricardohmfilho/laravel-um.git

\$ cd laravel-um/backend

\$ composer install

#### arquivo .env

- Criar database `laravel_um`, e se necessário alterar os dados de conexão no arquivo
- No linux, estas duas informações foram reconhecidas quando colocadas entre aspas duplas: `DB_USERNAME="username"` e `DB_PASSWORD="pass"`
- Se alguma alteração nesse arquivo for feita, rodar os comandos `php artisan config:clear` 
e `php artisan cache:clear`

### Migrate

\$ php artisan migrate

### Seed

\$ php artisan db:seed

* Os dados dos `clientes` foram extraídos e tratados por script Python (`/command/extract_data.py`) do PDF enviado, exportados para formato `json`, no arquivo `/backend/database/data/customer_data.json`.

### Diagrama do banco de dados

![Diagrama](laravel-um-diagrama.png)

### Iniciar aplicação

\$ php artisan serve

### Limpeza de cache (se necessário)

\$ php artisan cache:clear

\$ php artisan config:clear

\$ composer dump-autoload

## Documentação das rotas da API

\$ php artisan route:list

> Obs:

- Os posts e put de dados, foram feitos na tab `body`, na opção `x-www-form-urlencoded`;
- A url base usada foi a `http://127.0.0.1:8000` criada pelo comando `php artisan serve`.

| Method | URI                                          | Action                                   |
| ------ | -------------------------------------------- | ---------------------------------------- |
| GET    | api/customers                                    | CustomerController@index                     |
| GET    | api/customers/{id}                               | CustomerController@show                      |
| PUT    | api/customers/{id}                               | CustomerController@update                       |
| DELETE | api/customers/{id}                               | CustomerController@destroy                    |
| GET    | api/plans                               | CustomerController@index                |
| GET    | api/states                               | CustomerController@index                |
| GET    | api/cities                               | CustomerController@index                |
