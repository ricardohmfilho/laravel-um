# Desafio Origo Energia Nov/2020

## Backend

Desenvolvido com Apache/2.4.39, PHP 7.3.7, Laravel 7.29.3, MariaDB 10.3.16 e Composer.

### Instalação

~~~shell
$ git clone https://github.com/ricardohmfilho/laravel-um.git

$ cd laravel-um/backend

$ composer install
~~~

#### arquivo .env

- Renomear o arquivo `.env.example` para `.env` e configurar os campos de conexão do banco de dados: `DB_DATABASE`, `DB_USERNAME` e `DB_PASSWORD`
- No linux, estas duas informações foram reconhecidas quando colocadas entre aspas duplas: `DB_USERNAME="username"` e `DB_PASSWORD="pass"`
- Se alguma alteração nesse arquivo for feita, rodar os comandos `php artisan config:clear` 
e `php artisan cache:clear`

### Migrate

Depois de configurado o banco, rodar o comando de migração para subir a estrutura do banco de dados.

~~~shell
$ php artisan migrate
~~~

### Seed

Agora rode os seeds para preencher os dados nas tabelas.

~~~shell
$ php artisan db:seed
~~~

* Os dados dos `clientes` foram extraídos e tratados por script Python (`/command/extract_data.py`) do PDF enviado, exportados para formato `json`, no arquivo `/backend/database/data/customer_data.json`.

### Diagrama do banco de dados

![Diagrama](laravel-um-diagrama.png)

### Iniciar aplicação

~~~shell
$ php artisan serve
~~~

### Limpeza de cache (se necessário)

~~~shell
$ php artisan cache:clear

$ php artisan config:clear

$ composer dump-autoload
~~~

## Documentação das rotas da API

~~~shell
$ php artisan route:list
~~~

> Obs:

- No Postman, os posts e put de dados, foram feitos na tab `body`, na opção `x-www-form-urlencoded`;
- A url base usada foi a `http://127.0.0.1:8000` criada pelo comando `php artisan serve`.

| Method | URI                                          | Action                                   |
| ------ | -------------------------------------------- | ---------------------------------------- |
| GET    | api/customers                                    | CustomerController@index                     |
| GET    | api/customers/{id}                               | CustomerController@show                      |
| PUT    | api/customers/{id}                               | CustomerController@update                       |
| DELETE | api/customers/{id}                               | CustomerController@destroy                    |
| GET    | api/plans                               | PlanController@index                |
| GET    | api/states                               | StateController@index                |
| GET    | api/cities                               | CityController@index                |

---

## Frontend

#### Informações básicas

Desenvolvido com Angular 10 e Bootstrap 4.

No navegador basta acessar a raíz do projeto `laravel-um` e acessar a pasta `/frontend`. O código do projeto está na pasta `/frontend/code` (exceto `node_modules`).

Lembrando que o servidor do laravel precisa estar ativo.
